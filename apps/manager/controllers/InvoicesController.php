<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Client;
use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\InvoiceDetail;
use General\Core\Manager\Models\Product;
use General\Core\Manager\Models\ProductQuantity;
use General\Core\Util\FilterInjector;


/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 *
 */
class InvoicesController extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List Invoices'));
    /* page number to be initially displayed. */
    $page = 1;
    /* maximum number of data to be displaied on single page. */
    $limit = 100;
    /* initialize data to be passed to paginator. */
    $posts = isset($_REQUEST) ? $_REQUEST : [];
    $posts['order'] = 'created';
    $posts['direction'] = 'DESC';

    if ($this->request->hasQuery('limit')) {
      $limit = $this->request->getQuery('limit', 'int');
    }
    if ($this->request->hasQuery('page')) {
      $page = $this->request->getQuery('page', 'int');
    }
    $paginator = $this->getPagination('Invoice', $page, $limit, $posts);
    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }

  public function newAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New Invoice'));
  }

  public function createAction()
  {
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
      $identity = $this->auth->getIdentity();
      //
      $invoice = new Invoice();
      $invoice->assign($post);
      $client_id = $post['client_id'];
      if (is_numeric($client_id)) {
        $invoice->client_id = $client_id;
      } else {
        $client = new Client();
        $client->user_id = $post['user_id'];
        $client->name = $client_id;
        $client->email = 'shopping@client.com';
        if ($client->create()) {
          $invoice->client_id = $client->id;
        }
      }
      //
      $product_ids = [];
      $in_detail   = [];
      $pd = $post['pd'];
      foreach ($pd as $item) {
        $this->subStock($identity['id'], $item['product'], $item['warehouse'], $item['quantity']);
        //
        $invoie_detail = new InvoiceDetail();
        $invoie_detail->client_id    = $invoice->client_id;
        $invoie_detail->product_id   = $item['product'];
        $invoie_detail->warehouse_id = $item['warehouse'];
        $invoie_detail->price    = $item['price'];
        $invoie_detail->quantity = $item['quantity'];
        array_push($in_detail, $invoie_detail);
        //
        array_push($product_ids, $item['product']);
      }
      //
      if (!$this->request->hasPost('disabled')) {
        $invoice->disabled = 0;
      }
      //
      $invoice->invoicedetail = $in_detail;

      $product_ids = implode(',', array_unique($product_ids));
      $this->sumProducts($this->di, $identity['id'], $product_ids);

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Invoice', $invoice)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'invoices:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'invoices',
          'action' => 'index',
        ]);
        return;
      }

      $this->view->setVar('posts', $post);

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$invoice->create()) {
        $msgstack = '';
        foreach ($invoice->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'invoices',
          'action' => 'new'
        ]);
        return;
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Invoice was created successfully.'));
      $this->response->redirect('manager/invoices/show/' . $invoice->id);
      return;
    }
  }


  public function editAction($id)
  {
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
    $this->setPageHeading($this->l10n->_('Edit Invoice'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $invoice = Invoice::findFirst($this->qi->inject('Invoice', $cond));

    $invoice_detail = $invoice->getRelated('invoicedetail');

    $this->view->setVar('invoice', $invoice);
    $this->view->setVar('invoice_detail', $invoice_detail);
  }


  public function saveAction()
  {
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
      $identity = $this->auth->getIdentity();
      $post = $this->request->getPost();
      $cond = [
        'conditions' => 'id=:id:',
        'bind' => ['id' => $post['invoice_id']],
      ];
      $invoice = Invoice::findFirst($this->qi->inject('Invoice', $cond));
      $invoice->assign($post);
      if (!$this->request->hasPost('disabled')) {
        $invoice->disabled = 0;
      }
      //
      $epds = $post['epd'];    // edit existing invoice_detail
      if ($epds != null) {
        foreach ($epds as $item) {
          $invoice_detail = InvoiceDetail::findFirst($item['id']);
          $invoice_detail->price = $item['price'];
          //
          $cond = [
            'conditions' => 'user_id=:user_id: AND product_id=:product_id: AND warehouse_id=:warehouse_id:',
            'bind' => [
              'user_id'      => $identity['id'],
              'product_id'   => $item['product'],
              'warehouse_id' => $item['warehouse']
            ]
          ];
          $proQty = ProductQuantity::findFirst($cond);
          if ($item['quantity'] > $invoice_detail->quantity && $proQty->product_id === $invoice_detail->product_id && $proQty->warehouse_id === $invoice_detail->warehouse_id) {
            $diff = $item['quantity'] - $invoice_detail->quantity; // qty will be pulled out from stock
            $proQty->quantity = $proQty->quantity - $diff;
            $proQty->update();
            //
            $invoice_detail->quantity = $item['quantity'];
            $invoice_detail->update();
            //
            $this->sumProducts($this->di, $identity['id'], $proQty->product_id);
          } else {
            if ($item['quantity'] < $invoice_detail->quantity && $proQty->product_id === $invoice_detail->product_id && $proQty->warehouse_id === $invoice_detail->warehouse_id) {
              $diff = $invoice_detail->quantity - $item['quantity']; // put back in stock
              $proQty->quantity = $proQty->quantity +  $diff;
              $proQty->update();
              //
              $invoice_detail->quantity = $item['quantity'];
              $invoice_detail->update();
              //
              $this->sumProducts($this->di, $identity['id'], $proQty->product_id);
            } else {
              $invoice_detail->update();
            }
          }

        }
      }
      $apds = $post['apd'];   // add new invoice_detail
      if ($apds != null) {
        foreach ($apds as $item) {
          $cond = [
            'conditions' => 'client_id=:client_id: AND invoice_id=:invoice_id: AND product_id=:product_id: AND warehouse_id=:warehouse_id:',
            'bind' => [
              'client_id'    => $post['client_id'],
              'invoice_id'   => $invoice->id,
              'product_id'   => $item['product'],
              'warehouse_id' => $item['warehouse'],
            ]
          ];
          $invoice_detail = InvoiceDetail::findFirst($cond);
          if ($invoice_detail) {
            $invoice_detail->quantity = $invoice_detail->quantity + $item['quantity'];
            $invoice_detail->update();
            $this->subStock($identity['id'], $item['product'], $item['warehouse'], $item['quantity']);
            $this->sumProducts($this->di, $identity['id'], $invoice_detail->product_id);
          } else {
            $new_invoice_detail = new InvoiceDetail();
            $new_invoice_detail->client_id = $post['client_id'];
            $new_invoice_detail->invoice_id = $invoice->id;
            $new_invoice_detail->product_id = $item['product'];
            $new_invoice_detail->warehouse_id = $item['warehouse'];
            $new_invoice_detail->price = $item['price'];
            $new_invoice_detail->quantity = $item['quantity'];
            $new_invoice_detail->create();
            $this->subStock($identity['id'], $item['product'], $item['warehouse'], $item['quantity']);
            $this->sumProducts($this->di, $identity['id'], $new_invoice_detail->product_id);
          }
        }
      }
      $dpds = $post['dpd'];   // delete invoice_detail
      if ($dpds != null) {
        foreach ($dpds as $item) {
          $cond = [
            'conditions' => 'id=:id: AND client_id=:client_id: AND invoice_id=:invoice_id: AND product_id=:product_id: AND warehouse_id=:warehouse_id:',
            'bind' => [
              'id'           => $item['id'],
              'client_id'    => $post['client_id'],
              'invoice_id'   => $invoice->id,
              'product_id'   => $item['product'],
              'warehouse_id' => $item['warehouse'],
            ]
          ];
          $invoice_detail = InvoiceDetail::findFirst($cond);
          if ($invoice_detail) {
            $this->addStock($identity['id'], $item['product'], $item['warehouse'], $invoice_detail->quantity);
            $invoice_detail->delete();
            $this->sumProducts($this->di, $identity['id'], $invoice_detail->product_id);
          }
        }
      }

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Invoice', $invoice)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'invoices:edit');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'invoices',
          'action' => 'index',
        ]);
        return;
      }

      $this->view->setVar('posts', $post);

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$invoice->save()) {
        $msgstack = '';
        foreach ($invoice->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'invoices',
          'action' => 'edit',
          'params' => [$post['invoice_id']]
        ]);
        return;
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Invoice was edited successfully.'));
      $this->response->redirect('manager/invoices/show/' . $invoice->id);
      return;
    }
  }


  private function addStock($user_id, $product_id, $warehouse_id, $quantity) {
    $cond = [
      'conditions' => 'user_id=:user_id: AND product_id=:product_id: AND warehouse_id=:warehouse_id:',
      'bind' => [
        'user_id'     => $user_id,
        'product_id'  => $product_id,
        'warehouse_id'=> $warehouse_id,
      ]
    ];
    $proQty = ProductQuantity::findFirst($cond);
    $curQty = $proQty->quantity;
    $proQty->quantity = $curQty + $quantity;
    $proQty->update();
  }


  private function subStock($user_id, $product_id, $warehouse_id, $quantity) {
    $cond = [
      'conditions' => 'user_id=:user_id: AND product_id=:product_id: AND warehouse_id=:warehouse_id:',
      'bind' => [
        'user_id'     => $user_id,
        'product_id'  => $product_id,
        'warehouse_id'=> $warehouse_id,
      ]
    ];
    $proQty = ProductQuantity::findFirst($cond);
    $curQty = $proQty->quantity;
    $proQty->quantity = $curQty - $quantity;
    $proQty->update();
  }


  private function sumProducts($di, $user_id, $product_ids) {
    $sumProducts = FilterInjector::sumProducts($di, $product_ids);
    foreach($sumProducts as $sp) {
      $cond = [
        'conditions' => 'id=:product_id: AND user_id=:user_id:',
        'bind' => [
          'product_id' => $sp->product_id,
          'user_id'    => $user_id,
        ]
      ];
      $product  = Product::findFirst($cond);
      $product->quantity = $sp->quantity ;
      $product->update();
    }
  }


  private function savePath($id)
  {
    $savedir  = 'user'.DS.sprintf("%07d", $this->view->getVar('identity')['id']).DS.
      'invoice'.DS.sprintf("%07d", $id);
    $savepath = SKR_UPLOAD_DIR.DS.$savedir;
    return $savepath;
  }


  public function imageAction($id) {
    $this->view->disable();
    $data = '';
    $mimeType = 'application/octet-stream';
    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $invoice = Invoice::findFirst($this->qi->inject('Invoice', $cond));
    if ($invoice) {
      $imagePath = $this->savePath($id).DS.$invoice->image;//echo $imagePath;exit;
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
    $this->response->setHeader('Cache-Control', 'max-age=0, private, must-revalidate, post-check=0, pre-check=0');
    $this->response->setContentType($mimeType);
    $this->response->setContent($data);
    $this->response->send();
  }


  public function showAction($id)
  {
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
    $this->setPageHeading($this->l10n->_('Detail of Invoice'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $invoice = Invoice::findFirst($this->qi->inject('Invoice', $cond));

    $invoice_details = $invoice->getRelated('invoicedetail');

    /* put error in session and will be forwarded, if result is empty. */
    if (!$invoice) {
      $this->flash->error($this->l10n->_('Specified Invoice cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'invoices',
        'action' => 'index',
      ]);
      return;
    }

    /* set parameters to display page. */
    $this->view->setVar('invoice', $invoice);
    $this->view->setVar('invoice_details', $invoice_details);
  }


  /**
   * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
   */
  public function getProductAction()
  {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $data = $this->request->getPost();


        if (is_numeric($data['client_id'])) {
          $client = Client::findFirst($data['client_id']);
          $response['ctype'] = $client->type;
        } else {
          $response['ctype'] = 0;
        }

        $products = FilterInjector::getProductsByKeyword($this->di, $data['keyword']);
        if ($products->count() > 0) {
          $response['data'] = $products->toArray();
          $response['success'] = 1;
        }
      }
    }
    $this->response->resetHeaders();
    $this->response->setContentType('application/json', 'UTF-8');
    $this->response->setContent(json_encode($response,JSON_NUMERIC_CHECK));
    return $this->response->send();
  }


  public function printAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $data = $this->request->getPost();

        $invoice = Invoice::findFirst($data['id']);
        if ($invoice) {
          $invoice_detail = $invoice->getRelated('invoicedetail');
          if ($invoice_detail->count() > 0) {
            $response['id'] = $invoice->id;
            $response['client'] = $invoice->client->name;
            $response['total']  = $invoice->total_price;
            $detail = [];
            $qty = 0;
            $sum = 0;
            foreach($invoice_detail as $item) {
              array_push($detail, [
                'product'  => $item->product->name,
                'price'    => $item->price,
                'quantity' => $item->quantity,
                'total'    => ($item->price * $item->quantity),
              ]);
              $qty += $item->quantity;
              $sum += $item->price * $item->quantity;
            }
            $response['detail'] = $detail;
            $response['qty'] = $qty;
            $response['sum'] = $sum;
            $response['date'] = date('Y/m/d H:i');
            $response['remarks'] = $invoice->remarks;
            $response['success'] = 1;
          }
        }
      }
    }
    $this->response->resetHeaders();
    $this->response->setContentType('application/json', 'UTF-8');
    $this->response->setContent(json_encode($response,JSON_NUMERIC_CHECK));
    return $this->response->send();
  }


  public function deliveryAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $data = $this->request->getPost();

        $invoice = Invoice::findFirst($data['id']);
        if ($invoice) {
          $invoice->deliver = 2;
          $invoice->update();

          $response['success'] = 1;
        }

      }
    }
    $this->response->resetHeaders();
    $this->response->setContentType('application/json', 'UTF-8');
    $this->response->setContent(json_encode($response,JSON_NUMERIC_CHECK));
    return $this->response->send();
  }


  public function statusAction() {
    $response = ['success' => 0];
    $this->view->disable();
    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $data = $this->request->getPost();

        $invoice = Invoice::findFirst($data['id']);
        if ($invoice) {
          $invoice->status = 1;
          $invoice->update();

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
    $cond = [
      'conditions' => 'disabled=:disabled: AND type<>:type:',
      'bind' => [
        'disabled' => 0,
        'type' => 2,
      ],
      'order' => 'type desc, name'
    ];
    $clients = Client::find($this->qi->inject('Client', $cond));
    $dClients = [];
    if ($clients) {
      foreach ($clients as $cl) {
        array_push($dClients, ['id'=>$cl->id, 'name'=>$cl->name, 'type'=>$cl->type]);
      }
    }
    $this->view->setVar('eclients', $clients);
    $this->view->setVar('clients', json_encode($dClients));
    $this->view->setVar('status', $this->enum->invoiceStatus());
    $this->view->setVar('deliver', $this->enum->invoiceDeliver());

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

