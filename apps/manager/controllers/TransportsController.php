<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Client;
use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\OtherCost;
use General\Core\Manager\Models\Transport;
use General\Core\Manager\Models\TransportInvoice;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class TransportsController extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List Transport'));

    /* page number to be initially displayed. */
    $page = 1;
    /* maximum number of data to be displaied on single page. */
    $limit = 10;
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
    $paginator = $this->getPagination('Transport', $page, $limit, $posts);

    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }


  public function newAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New Transport'));

    $invoices = $this->getInvoiceList();
    $this->view->setVar('list_invoices', $invoices);

    $this->view->setVar('count', 1);
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
      $transport = new Transport();
      $transport->assign($post);
      if (!$this->request->hasPost('disabled')) {
        $transport->disabled = 0;
      }

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Transport', $transport)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'transports:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'transports',
          'action' => 'index',
        ]);
        return;
      }

      $total_others = 0;
      $count = 1;
      if ($this->request->hasPost('others')) {
        $others = $post['others'];
        $count = count($others) - 1;
        $othercost = [];
        foreach($others as $item) {
          if (!empty($item['name'])) {
            $oc = new OtherCost();
            $oc->name = $item['name'];
            $oc->price = $item['price'];
            $oc->remarks = $item['remarks'];
            array_push($othercost, $oc);
            $total_others += $item['price'];
          }
        }
        $transport->othercost = $othercost;
      }
      $transport->total_others = $total_others;

      $this->view->setVar('posts', $post);
      $this->view->setVar('count', $count);

      $total = 0;
      $transportInvoice = [];
      if ($this->request->hasPost('invoice')) {
        $invoices = $post['invoice'];   // from invoice[]
        foreach ($invoices as $iv_id) {
          $transInvoice = new TransportInvoice();
          $transInvoice->invoice_id = $iv_id;
          //
          $cond = [
            'conditions' => 'id=:id: AND disabled=0',
            'bind' => ['id' => $iv_id],
          ];
          $invoice = Invoice::findFirst($this->qi->inject('Invoice', $cond));
          $total += $invoice->total_price;
          array_push($transportInvoice, $transInvoice);
        }
      }
      $transport->transportinvoice = $transportInvoice;
      $transport->total = $total;

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$transport->create()) {

        $selected_invoice_ids = $post['choseInvoices'];
        $selected_invoices = Invoice::find([
          'id IN ({selected_ids:array})',
          'bind' => [
              'selected_ids' => array_values(explode(',', $selected_invoice_ids))
          ]
        ]);
        $list_invoices = $this->getInvoiceList();
        //
        $this->view->setVar('selected_invoice_ids', $selected_invoice_ids);
        $this->view->setVar('selected_invoices', $selected_invoices);
        //
        $this->view->setVar('list_invoices', $list_invoices);

        $msgstack = '';
        foreach ($transport->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'transports',
          'action' => 'new'
        ]);
        return;
      }

      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Transport was created successfully.'));
      $this->response->redirect('manager/transports/show/' . $transport->id);
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
    $this->setPageHeading($this->l10n->_('Edit Transport'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $transport = Transport::findFirst($this->qi->inject('transport', $cond));

    $selected_invoice_ids = [];
    $selected_invoices    = [];
    /* @var \General\Core\Manager\Models\TransportInvoice $transportInvoice */
    $transportInvoice = $transport->getRelated('transportinvoice');
    if ($transportInvoice) {
      foreach ($transportInvoice as $ti) {
        array_push($selected_invoice_ids, $ti->invoice_id);
      }
      if ($selected_invoice_ids != null) {
        $selected_invoices = Invoice::find([
          'id IN ({selected_ids:array})',
          'bind' => [
            'selected_ids' => array_values($selected_invoice_ids)
          ]
        ]);
      }
    }
    $list_invoices = $this->getInvoiceList2($transport->id);

    $this->view->setVar('transport', $transport);
    $this->view->setVar('selected_invoice_ids', implode(',', $selected_invoice_ids));
    $this->view->setVar('selected_invoices', $selected_invoices);
    $this->view->setVar('list_invoices', $list_invoices);
    $this->view->setVar('mode', 'edit');

    $data_oc = [];
    $othercost = $transport->getRelated('othercost');
    $i = 0;
    if ($othercost->count() > 0) {
      foreach($othercost as $oc) {
        $data_oc['others'][$i]['id'] = $oc->id;
        $data_oc['others'][$i]['name'] = $oc->name;
        $data_oc['others'][$i]['price'] = $oc->price;
        $data_oc['others'][$i]['remarks'] = $oc->remarks;
        $i++;
      }
    }

//    $this->view->setVar('posts', $data_oc);
    $this->view->setVar('count', 1);
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
      $transport_id = $post['transport_id'];
      $cond = [
        'conditions' => 'id=:id:',
        'bind' => ['id' => $transport_id],
      ];
      $transport = Transport::findFirst($this->qi->inject('Transport', $cond));
      $transport->assign($post);
      if (!$this->request->hasPost('disabled')) {
        $transport->disabled = 0;
      }

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Transport', $transport)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'transports:save');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'transports',
          'action' => 'index',
        ]);
        return;
      }

      $count = 1;
      if ($this->request->hasPost('others')) {
        //
        $others = $post['others'];
        $count = count($others) - 1;

        $total_others = 0;
        $othercost = [];
        foreach($others as $item) {
          if ($item['id'] != '') {
            $oc = OtherCost::findFirst($post['id']);
            $total_others += $item['price'];
            $oc->price = $total_others;
            $oc->update($item);
          } else {
            if (!empty($item['name'])) {
              $oc = new OtherCost();
              $oc->name = $item['name'];
              $oc->price = $item['price'];
              $oc->remarks = $item['remarks'];
              array_push($othercost, $oc);
              $total_others += $item['price'];
            }
          }
        }
        $transport->othercost = $othercost;
      }
      $transport->total_others = $total_others;

      $this->view->setVar('posts', $post);
      $this->view->setVar('count', $count);

      $cond = [
        'conditions' => 'transport_id=:transport_id:',
        'bind' => ['transport_id' => $transport_id],
      ];
      $oldTransInvoice = TransportInvoice::find($cond);

      $total = 0;
      $transportInvoice = [];
      if ($this->request->hasPost('invoice')) {
        $invoices = $post['invoice'];   // from invoice[]
        foreach ($invoices as $iv_id) {
          $transInvoice = new TransportInvoice();
          $transInvoice->transport_id = $transport_id;
          $transInvoice->invoice_id = $iv_id;
          //
          $cond = [
            'conditions' => 'id=:id: AND disabled=0',
            'bind' => ['id' => $iv_id],
          ];
          $invoice = Invoice::findFirst($this->qi->inject('Invoice', $cond));
          $total += $invoice->total_price;
          array_push($transportInvoice, $transInvoice);
        }
      }
      $transport->transportinvoice = $transportInvoice;
      $transport->total = $total;

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$transport->save()) {
        if ($post['client_id'] != '') {
          $cid = $post['client_id'];
          $this->tag->setDefault('client', $cid);
          $selected_invoice_ids = $post['choseInvoices'];
          $selected_invoices = Invoice::find([
            'id IN ({selected_ids:array})',
            'bind' => [
              'selected_ids' => array_values(explode(',', $selected_invoice_ids))
            ]
          ]);
          $list_invoices = $this->getInvoiceList($cid);
          //
          $this->view->setVar('selected_invoice_ids', $selected_invoice_ids);
          $this->view->setVar('selected_invoices', $selected_invoices);
          //
          $this->view->setVar('list_invoices', $list_invoices);
        }

        $msgstack = '';
        foreach ($transport->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'transports',
          'action' => 'new'
        ]);
        return;
      } else {
        if ($post['rmOtherIds'] != '') {
          $rm_others = OtherCost::find('id IN ('. $post['rmOtherIds'] .')');
          $rm_others->delete();
        }
        //
        $oldTransInvoice->delete();
      }

      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Transport was created successfully.'));
      $this->response->redirect('manager/transports/show/' . $transport->id);
      $this->view->setVar('mode', 'edit');
      return;
    }
  }


  public function removeAction() {
    $results = [
      'success' => 0
    ];

    $identity = $this->auth->getUser();
    if (!$identity) {
      return $this->response->redirect('manager/main/forbidden');
    }

    if ($this->request->isAjax()) {
      if ($this->request->isPost()) {
        $id = $this->request->getPost('id');
        $cond = [
          'conditions' => 'id=:id:',
          'bind' => ['id' => $id],
        ];
        $transportInvoice = TransportInvoice::findFirst($this->qi->inject('transportinvoice', $cond));

        if ($transportInvoice->delete()) {
          $results['success'] = 1;
        }
      }
    }

    $this->view->disable();
    $this->response->setContent(json_encode($results));
    return $this->response;
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
    $this->setPageHeading($this->l10n->_('Detail of Transport'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $transport = Transport::findFirst($this->qi->inject('Transport', $cond));
    $transportInvoice = $transport->getRelated('transportinvoice');
    $transportOtherCost = $transport->getRelated('othercost');

    /* put error in session and will be forwarded, if result is empty. */
    if (!$transport) {
      $this->flash->error($this->l10n->_('Specified Transport cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'transports',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('transport', $transport);
    $this->view->setVar('transportInvoice', $transportInvoice);
    $this->view->setVar('transportOtherCost', $transportOtherCost);
  }


//  public function getAction()
//  {
//    $results = [
//      'success' => 0
//    ];
//
//    $identity = $this->auth->getUser();
//    if (!$identity) {
//      return $this->response->redirect('manager/main/forbidden');
//    }
//
//    if ($this->request->hasQuery('client_id')) {
//      $client_id = $this->request->getQuery('client_id');
//      $mode      = $this->request->getQuery('mode');
//
//      $invoices = $this->getInvoiceList();
//      if ($invoices->count() > 0) {
//        $tags = [];
//        foreach ($invoices as $invoice) {
//          $tags[] = $this->view->getRender('partials', 'li-invoices', [
//            'invoice' => $invoice,
//            'mode'    => $mode,
//          ]);
//        }
//        $results['success']  = 1;
//        $results['invoice']  = $tags;
//      }
//    }
//
//    $this->view->disable();
//    $this->response->setContent(json_encode($results));
//    return $this->response;
//  }


//  public function get2Action()
//  {
//    $results = [
//      'success' => 0
//    ];
//
//    $identity = $this->auth->getUser();
//    if (!$identity) {
//      return $this->response->redirect('manager/main/forbidden');
//    }
//
//    if ($this->request->hasQuery('client_id')) {
//      $client_id = $this->request->getQuery('client_id');
//      $transport_id = $this->request->getQuery('transport_id');
//      $mode      = $this->request->getQuery('mode');
//
//      $invoices = $this->getInvoiceList2($client_id, $transport_id);
//      if ($invoices->count() > 0) {
//        $tags = [];
//        foreach ($invoices as $invoice) {
//          $tags[] = $this->view->getRender('partials', 'li-invoices', [
//            'invoice' => $invoice,
//            'mode'    => $mode,
//          ]);
//        }
//        $results['success']  = 1;
//        $results['invoice']  = $tags;
//      }
//    }
//
//    $this->view->disable();
//    $this->response->setContent(json_encode($results));
//    return $this->response;
//  }


  public function beforeExecuteRoute($dispatcher)
  {

    $cond = [
      'conditions' => 'disabled=:disabled:',
      'bind' => ['disabled' => 0],
    ];
    $clients = Client::find($this->qi->inject('Client', $cond));
    $this->view->setVar('clients', $clients);
    $this->view->setVar('status', $this->enum->transportStatus());

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

