<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Client;
use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\InvoiceDetail;
use General\Core\Manager\Models\OtherCost;
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
    $posts['order'] = 1;
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
        $cond = [
          'conditions' => 'user_id=:user_id: AND product_id=:product_id: AND warehouse_id=:warehouse_id:',
          'bind' => [
            'user_id'     => $identity['id'],
            'product_id'  => $item['product'],
            'warehouse_id'=> $item['warehouse']
          ]
        ];
        $proQty = ProductQuantity::findFirst($cond);
        $curQty = $proQty->quantity;
        $proQty->quantity = $curQty - $item['quantity'];
        $proQty->update();
        //
        $invoie_detail = new InvoiceDetail();
        $invoie_detail->client_id    = $client_id;
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
      $sumProducts = FilterInjector::sumProducts($this->di, $product_ids);
      foreach($sumProducts as $sp) {
        $cond = [
          'conditions' => 'id=:product_id: AND user_id=:user_id:',
          'bind' => [
            'product_id' => $sp->product_id,
            'user_id'    => $identity['id'],
          ]
        ];
        $product  = Product::findFirst($cond);
        $product->quantity = $sp->quantity ;
        $product->update();
      }

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

    $invoice_detail = $invoice->getRelated('invoicedetail');

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
    $this->view->setVar('products', $invoice_detail);
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


  public function beforeExecuteRoute($dispatcher)
  {
    $cond = [
      'conditions' => 'disabled=:disabled:',
      'bind' => ['disabled' => 0],
    ];
    $clients = Client::find($this->qi->inject('Client', $cond));
    $dClients = [];
    if ($clients) {
      foreach ($clients as $cl) {
        array_push($dClients, ['id'=>$cl->id, 'name'=>$cl->name]);
      }
    }
    $this->view->setVar('eclients', $clients);
    $this->view->setVar('clients', json_encode($dClients));
    $this->view->setVar('status', $this->enum->invoiceStatus());

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

