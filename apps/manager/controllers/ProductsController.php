<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Common;
use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\Product;
use General\Core\Manager\Models\ProductIn;
use General\Core\Manager\Models\ProductPrice;
use General\Core\Manager\Models\ProductQuantity;
use General\Core\Manager\Models\Warehouse;
use General\Core\Util\Enums;
use General\Core\Util\FilterInjector;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class ProductsController  extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List Products'));
    /* page number to be initially displayed. */
    $page = 1;
    /* maximum number of data to be displaied on single page. */
    $limit = 1000;
    /* initialize data to be passed to paginator. */
    $posts = isset($_REQUEST) ? $_REQUEST : [];

    if ($this->request->hasQuery('limit')) {
      $limit = $this->request->getQuery('limit', 'int');
    }
    if ($this->request->hasQuery('page')) {
      $page = $this->request->getQuery('page', 'int');
    }
    $paginator = $this->getPagination('Product', $page, $limit, $posts);
    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }


  public function newAction() {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New Product'));
  }


  public function createAction() {
    /* return 404 status if request method is not POST. */
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'errors',
        'action' => 'error404',
      ]);
      return;
    }

    if ($this->security->checkToken('csrf')) {
      $post = $this->request->getPost();
      $product = new Product();
      $product->assign($post);
      $identity = $this->auth->getIdentity();
      $product->user_id = $identity['id'];
      if (!$this->request->hasPost('disabled')) {
        $product->disabled = 0;
      }

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Product', $product)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'products:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'products',
          'action' => 'index',
        ]);
        return;
      }

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$product->create()) {
        $msgstack = '';
        foreach ($product->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'products',
          'action' => 'new'
        ]);
        return;
      } else {
        if ($this->request->hasFiles()) {
          foreach($this->request->getUploadedFiles() as $file) {
            $realname = $file->getName();
            $extension = $file->getExtension();
            $key = $file->getKey();

            if (!empty($extension)) {
              $savepath = $this->savePath($product->id);
              $newname  = $savepath.DS.$realname;
              if (!is_dir($savepath)) {
                mkdir($savepath, 0775, true);
              }
              if ($file->moveTo($newname)) {
                //
                $cond = [
                  'conditions' => 'id=:id:',
                  'bind' => ['id' => $product->id],
                ];
                $product = Product::findFirst($this->qi->inject('Product', $cond));
                $product->{$key} = $realname;
                $product->update();
              } else {
                $this->flash->error('image could not save properly.');
              }
            }
          }
        }
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Product was edited successfully.'));
      $this->response->redirect('manager/products/show/' . $product->id);
      return;
    }
  }


  public function editAction($id) {
    /* return 404 status if invalid argument was passed. */
    if (empty($id)) {
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'errors',
        'action' => 'error404',
      ]);
      return;
    }

    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Edit Product'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $product = Product::findFirst($this->qi->inject('Product', $cond));

    $this->view->setVar('product', $product);
  }


  public function saveAction() {
    /* return 404 status if request method is not POST. */
    if (!$this->request->isPost()) {
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'errors',
        'action' => 'error404',
      ]);
      return;
    }

    if ($this->security->checkToken('csrf')) {
      $post = $this->request->getPost();
      $cond = [
        'conditions' => 'id=:id:',
        'bind' => ['id' => $post['product_id']],
      ];
      $product = Product::findFirst($this->qi->inject('Product', $cond));
      $oldPrice = $product->price;
      $oldWholeSalePrice = $product->wholesale_price;
      $oldDate  = $product->updated;
      if ($post['price'] != $oldPrice || $post['wholesale_price'] != $oldWholeSalePrice) {
        $pp = new ProductPrice();
        $pp->product_id = $product->id;
        $pp->price   = $oldPrice;
        $pp->wholesale_price = $oldWholeSalePrice;
        $pp->created = $oldDate;
        $pp->create();
      }

      $product->assign($post);
      if (!$this->request->hasPost('disabled')) {
        $product->disabled = 0;
      }

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Product', $product)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'products:edit');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'products',
          'action' => 'index',
        ]);
        return;
      }

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$product->save()) {
        $msgstack = '';
        foreach ($product->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'products',
          'action' => 'edit',
          'params' => [$post['product_id']]
        ]);
        return;
      } else {
        //
        if ($this->request->hasFiles()) {
          foreach($this->request->getUploadedFiles() as $file) {
            $realname = $file->getName();
            $extension = $file->getExtension();
            $key = $file->getKey();

            if (!empty($extension)) {
              $savepath = $this->savePath($product->id);
              $newname  = $savepath.DS.$realname;
              if (!is_dir($savepath)) {
                mkdir($savepath, 0775, true);
              } else {
                $oldImage = $savepath.DS.$product->image;
                unlink($oldImage);
              }
              if ($file->moveTo($newname)) {
                //
                $cond = [
                  'conditions' => 'id=:id:',
                  'bind' => ['id' => $product->id],
                ];
                $product = Product::findFirst($this->qi->inject('Product', $cond));
                $product->{$key} = $realname;
                $product->update();
              } else {
                $this->flash->error('image could not save properly.');
              }
            }
          }
        }
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Product was edited successfully.'));
      $this->response->redirect('manager/products/show/' . $product->id);
      return;
    }
  }


  public function showAction($id) {
    /* return 404 status if invalid argument was passed. */
    if (empty($id)) {
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'errors',
        'action' => 'error404',
      ]);
      return;
    }

    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Detail of Product'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $product = Product::findFirst($this->qi->inject('Product', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$product) {
      $this->flash->error($this->l10n->_('Specified Product cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'products',
        'action' => 'index',
      ]);
      return;
    }

    $productPrice = $product->getRelated('productprice');
    $price_dt = [];
    $price_wholesale_dt = [];
    $price_lb = [];
    foreach ($productPrice as $item) {
      array_push($price_dt, $item->price);
      array_push($price_wholesale_dt, $item->wholesale_price);
      array_push($price_lb, substr($item->created,0,10));
    }
    array_push($price_dt, $product->price);
    array_push($price_wholesale_dt, $product->wholesale_price);
    array_push($price_lb, date('Y-m-d'));
    $this->view->setVar('price_dt', implode(',', $price_dt));
    $this->view->setVar('price_wholesale_dt', implode(',', $price_wholesale_dt));
    $this->view->setVar('price_lb', '"'.implode('","', $price_lb).'"');

    /* set parameters to display page. */
    $this->view->setVar('product', $product);
  }


  public function copyAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $id = $this->request->getPost('id', 'int');
        $cond = [
          'conditions' => 'id=:id:',
          'bind' => ['id' => $id],
        ];
        $product = Product::findFirst($this->qi->inject('Product', $cond));
        if ($product) {
          $data = $product->toArray();
          $clone = new Product();
          $clone->assign($data);
          $clone->id = null;
          $clone->quantity = 0;
          if($clone->create()) {
            $response['success'] = 1;
          }
        }
      }
    }
    $this->response->setContent(json_encode($response));
    return $this->response;
  }


  public function addStockAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $identity = $this->auth->getIdentity();
        $data      = $this->request->getPost();
        /* @var ProductIn $productin */
        $productin = new ProductIn();
        $productin->product_id     = $data['id'];
        $productin->warehouse_id   = (int) $data['warehouse'];
        $productin->market_price   = (float) $data['market_price'];
        $productin->purchase_price = (float) $data['purchase_price'];
        $productin->saleprice      = (float) $data['saleprice'];
        $productin->quantity       = (int) $data['quantity'];
        $productin->remarks        = (string) $data['remarks'];
        if ($productin->create()) {
          //
          $cond = [
            'conditions' => 'product_id=:product_id: AND warehouse_id=:warehouse_id:',
            'bind' => [
              'product_id' => $data['id'],
              'warehouse_id' => (int) $data['warehouse']
            ]
          ];
          /* @var ProductQuantity $productquantity */
          $productquantity = ProductQuantity::findFirst($cond);
          if (!$productquantity) {
            $pq = new ProductQuantity();
            $pq->user_id      = $identity['id'];
            $pq->product_id   = $data['id'];
            $pq->warehouse_id = $data['warehouse'];
            $pq->quantity = (int) $data['quantity'];
            $pq->create();
          } else {
            $upQuantityWarehouse = $productquantity->quantity + (int) $data['quantity'];
            $productquantity->quantity = $upQuantityWarehouse;
            $productquantity->update();
          }
          //
          $cond = [
            'column' => 'quantity',
            'conditions' => 'user_id=:user_id: AND product_id=:product_id:',
            'bind' => [
              'user_id' => $identity['id'],
              'product_id' => $data['id'],
            ],
          ];
          $upQuantity = ProductQuantity::sum($cond);  // update product quantity
          //
          $cond = [
            'conditions' => 'id=:id:',
            'bind' => ['id' => $data['id']],
          ];
          /* @var Product $product  */
          $product = Product::findFirst($this->qi->inject('Product', $cond));
          $product->quantity = $upQuantity;
          if ($data['apply'] == 1) {
            $product->price = $data['saleprice'];
          }
          $product->update();
          //
          $quantity = $this->getQuantityAtWarehouse($data['id']);
          foreach ($quantity as $q) {
            $tkey = 'wh-'.$q->warehouse_id;
            $response[$tkey] = $q->quantity;
          }
          //
          $response['saleprice'] = $data['saleprice'];
          $response['quantity'] = $upQuantity;
          $response['success'] = 1;
        }
      }
    }
    $this->response->setContent(json_encode($response));
    return $this->response;
  }


  public function subStockAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $identity = $this->auth->getIdentity();
        $data      = $this->request->getPost();
        /* @var ProductIn $productin */
        $productin = new ProductIn();
        $productin->product_id   = $data['id'];
        $productin->warehouse_id = (int) $data['warehouse'];
        $productin->quantity     = (int) -($data['quantity']);
        $productin->remarks      = $data['remarks'];
        if ($productin->create()) {
          //
          $cond = [
            'conditions' => 'product_id=:product_id: AND warehouse_id=:warehouse_id:',
            'bind' => [
              'product_id' => $data['id'],
              'warehouse_id' => (int) $data['warehouse']
            ]
          ];
          /* @var ProductQuantity $productquantity */
          $productquantity = ProductQuantity::findFirst($cond);
          if (!$productquantity) {
            $pq = new ProductQuantity();
            $pq->user_id      = $identity['id'];
            $pq->product_id   = $data['id'];
            $pq->warehouse_id = $data['warehouse'];
            $pq->quantity = (int) $data['quantity'];
            $pq->create();
          } else {
            $upQuantityWarehouse = $productquantity->quantity - (int) $data['quantity'];
            $productquantity->quantity = $upQuantityWarehouse;
            $productquantity->update();
          }
          //
          $cond = [
            'column' => 'quantity',
            'conditions' => 'user_id=:user_id: AND product_id=:product_id:',
            'bind' => [
              'user_id' => $identity['id'],
              'product_id' => $data['id'],
            ],
          ];
          $upQuantity = ProductQuantity::sum($cond);  // update product quantity
          //
          $cond = [
            'conditions' => 'id=:id:',
            'bind' => ['id' => $data['id']],
          ];
          /* @var Product $product  */
          $product = Product::findFirst($this->qi->inject('Product', $cond));
          $product->quantity = $upQuantity;
          $product->update();
          //
          $quantity = $this->getQuantityAtWarehouse($data['id']);
          foreach ($quantity as $q) {
            $tkey = 'wh-'.$q->warehouse_id;
            $response[$tkey] = $q->quantity;
          }
          //
          $response['quantity'] = $upQuantity;
          $response['success'] = 1;
        }
      }
    }
    $this->response->setContent(json_encode($response));
    return $this->response;
  }


  public function moveStockAction () {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $identity = $this->auth->getIdentity();
        $data      = $this->request->getPost();
        //
        $condFrom = [
          'conditions' => 'product_id=:product_id: AND warehouse_id=:warehouse_id:',
          'bind' => [
            'product_id' => $data['id'],
            'warehouse_id' => (int) $data['from_warehouse_id']
          ]
        ];
        /* @var ProductQuantity $productquantityFrom */
        $productquantityFrom = ProductQuantity::findFirst($condFrom);
        if (!$productquantityFrom) {
          $proqty = new ProductQuantity();
          $proqty->user_id = $identity['id'];
          $proqty->product_id = $data['id'];
          $proqty->warehouse_id = $data['from_warehouse_id'];
          $proqty->quantity = 0;
          $proqty->create();
        }
        //
        /* @var ProductQuantity $productquantityTo */
        $condTo = [
          'conditions' => 'product_id=:product_id: AND warehouse_id=:warehouse_id:',
          'bind' => [
            'product_id' => $data['id'],
            'warehouse_id' => (int) $data['to_warehouse_id']
          ]
        ];
        $productquantityTo = ProductQuantity::findFirst($condTo);
        if (!$productquantityTo) {
          $proqty = new ProductQuantity();
          $proqty->user_id = $identity['id'];
          $proqty->product_id = $data['id'];
          $proqty->warehouse_id = $data['to_warehouse_id'];
          $proqty->quantity = 0;
          $proqty->create();
        }
        // move from A to B
        $moveQty = $data['quantity'];
        $productquantityFrom = ProductQuantity::findFirst($condFrom);
        $productquantityFrom->quantity = $productquantityFrom->quantity - $moveQty;
        $productquantityFrom->update();
        $productquantityTo   = ProductQuantity::findFirst($condTo);
        $productquantityTo->quantity   = $productquantityTo->quantity + $moveQty;
        $productquantityTo->update();
        //
        $cond = [
          'column' => 'quantity',
          'conditions' => 'user_id=:user_id: AND product_id=:product_id:',
          'bind' => [
            'user_id' => $identity['id'],
            'product_id' => $data['id'],
          ],
        ];
        $upQuantity = ProductQuantity::sum($cond);  // update product quantity
        //
        $cond = [
          'conditions' => 'id=:id:',
          'bind' => ['id' => $data['id']],
        ];
        /* @var Product $product  */
        $product = Product::findFirst($this->qi->inject('Product', $cond));
        $product->quantity = $upQuantity;
        $product->update();
        //
        $quantity = $this->getQuantityAtWarehouse($data['id']);
        foreach ($quantity as $q) {
          $tkey = 'wh-'.$q->warehouse_id;
          $response[$tkey] = $q->quantity;
        }
        //
        $response['quantity'] = $upQuantity;
        $response['success'] = 1;
      }
    }
    $this->response->setContent(json_encode($response));
    return $this->response;
  }


  public function chartAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $data = $this->request->getPost();
        $from = $data['from'];
        $to   = $data['to'];
        $cond = [
          'conditions' => 'product_id=:product_id: AND (created  BETWEEN :from: AND :to:) AND quantity>0',
          'bind' => [
            'product_id'  => $data['id'],
            'from'        => $from . ' 00:00:00',
            'to'          => $to . ' 23:59:59',
          ]
        ];
        $response['aaa'] = $cond;
        /* @var ProductIn $pins */
        $productins = ProductIn::find($cond);
        if ($productins->count() > 0) {
          $labels   = [];
          $market_price   = [];
          $purchase_price = [];
          $saleprice      = [];
          foreach($productins as $pins) {
            $date = explode(" ", $pins->created);
            array_push($labels, [$date[0], $pins->quantity, number_format($pins->saleprice) . ' ₫', $pins->remarks]);
            array_push($market_price, $pins->market_price);
            array_push($purchase_price, $pins->purchase_price);
            array_push($saleprice, ceil($pins->saleprice / Common::G_EXCHANGE));
          }
          $response['labels']   = json_encode($labels);
          $response['market_price']   = json_encode($market_price);
          $response['purchase_price'] = json_encode($purchase_price);
          $response['saleprice']      = json_encode($saleprice);
          $response['success'] = 1;
        }
      }
    }
    $this->response->resetHeaders();
    $this->response->setContentType('application/json', 'UTF-8');
    $this->response->setContent(json_encode($response,JSON_NUMERIC_CHECK));
    return $this->response->send();
  }


  public function updatePurchasePriceAction()
  {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $this->updatePurchasePrice();
        $response['success'] = 1;
      }
    }
    $this->response->resetHeaders();
    $this->response->setContentType('application/json', 'UTF-8');
    $this->response->setContent(json_encode($response,JSON_NUMERIC_CHECK));
    return $this->response->send();
  }


  public function exportAction($id=null) {
    $this->view->disable();
    if ($id == null) {
      return false;
    }

    ob_start();
    $data = $this->getClientWasBoughtProduct($id);
    if ($data) {
      $objPHPExcel = new \PHPExcel();
      // Set document properties
      $objPHPExcel->getProperties()
        ->setCreator("Sakura Shop")
        ->setDescription("DS Order Khach Hang");
      // Set default font
      $objPHPExcel->getDefaultStyle()->getFont()
        ->setName('Arial')
        ->setSize(12);
      // set Title
      $objPHPExcel->getActiveSheet()->setTitle('Order List');
      // set data
      $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'No.')
        ->setCellValue('B1', 'HDon')
        ->setCellValue('C1', 'KH')
        ->setCellValue('D1', 'SPham')
        ->setCellValue('E1', 'DGia')
        ->setCellValue('F1', 'SLg')
        ->setCellValue('G1', 'Ttien')
        ->setCellValue('H1', 'Date')
      ;

      $fname = 'Product-Invoice-List-' . time() . '.xlsx';

      // temp file name to save before output
      $temp_file = tempnam(sys_get_temp_dir(), 'phpexcel');

      //
      $i = 2;
      foreach ($data as $item) {
        $objPHPExcel->getActiveSheet()
          ->setCellValue('A' . $i, $i-1)
          ->setCellValue('B' . $i, $item->id)
          ->setCellValue('C' . $i, $item->client_name)
          ->setCellValue('D' . $i, $item->product_name)
          ->setCellValue('E' . $i, $item->price)
          ->setCellValue('F' . $i, $item->quantity)
          ->setCellValue('G' . $i, ($item->price*$item->quantity))
          ->setCellValue('H' . $i, $item->created)
        ;
        $i++;
      }

      $objPHPExcel->getActiveSheet()->getStyle('A1:H1')
        ->applyFromArray([
          'font' => [
            'bold' => true
          ],
          'alignment' => [
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER
          ]
        ]);
      $objPHPExcel->getActiveSheet()->getStyle('E2:G200')->getNumberFormat()
        ->setFormatCode('#,###');

      foreach (range('A', 'H') as $columnId) {
        $objPHPExcel->getActiveSheet()->getColumnDimension($columnId)->setAutoSize(true);
      }

      $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      $objWriter->save($temp_file);

    } else {
      return false;
    }

    $this->response->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $this->response->setHeader('Content-Disposition', 'attachment; filename="'.$fname.'"');
    $this->response->setHeader('Cache-Control', 'max-age=0, private, must-revalidate');
    $this->response->setContent(file_get_contents($temp_file));
    //
    for ($i = 0; $i < ob_get_level(); $i++) {
      ob_end_flush();
    }
    ob_implicit_flush(1);
    ob_clean();
    // delete temp file
    unlink($temp_file);
    return $this->response;
  }


  public function imageAction($id) {
    $this->view->disable();
    $data = '';
    $mimeType = 'application/octet-stream';
    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $product = Product::findFirst($this->qi->inject('Product', $cond));
    if ($product) {
      $imagePath = $this->savePath($id).DS.$product->image; //echo $imagePath;exit;
      if (file_exists($imagePath)) {
        if (false !== ($finfo = finfo_open(FILEINFO_MIME))) {
          /** @var mixed $allowed */
          $allowed = $this->di->get('config')->get('uploadable')->get('allowed_exts')->toArray();
          $mime = finfo_file($finfo, $imagePath);
          $ext  = pathinfo($imagePath, PATHINFO_EXTENSION);
          if (in_array($ext, $allowed)) {
            $mimeType = preg_replace('/;(.*)$/', '', $mime);
          }
          finfo_close($finfo);
        }
        $data = file_get_contents($imagePath);
      }
    }
    $this->response->resetHeaders();
    $this->response->setHeader('Cache-Control', 'private, max-age=0, must-revalidate, post-check=0, pre-check=0');
    $this->response->setContentType($mimeType);
    $this->response->setContent($data);
    $this->response->send();
    return;
  }


  private function savePath($id)
  {
    $savedir  = 'user'.DS.sprintf("%07d", $this->view->getVar('identity')['id']).DS.
      'product'.DS.sprintf("%07d", $id);
    $savepath = SKR_UPLOAD_DIR.DS.$savedir;
    return $savepath;
  }


  public function getproductAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {

        $products = FilterInjector::getProducts($this->di, $this->request->getPost('keyword'));
        if ($products->count() > 0) {
          $response['product'] = $products->toArray();
          $response['success'] = 1;
        }

      }
    }
    $this->response->resetHeaders();
    $this->response->setContentType('application/json', 'UTF-8');
    $this->response->setContent(json_encode($response,JSON_NUMERIC_CHECK));
    return $this->response->send();
  }


  public function beforeExecuteRoute($dispatcher)
  {
    $identity = $this->auth->getIdentity();
    $warehouses = Warehouse::find([
      'conditions' => 'user_id=:user_id:',
      [
       'binds' => [
         'user_id' => $identity['id']
       ]
      ]
    ]);
    $this->view->setVar('warehouses', $warehouses);

    $this->view->setVar('categories', $this->enum->getCategories());
    $this->view->setVar('brands', $this->enum->getBrands());

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

