<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Client;
use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\OtherCost;
use General\Core\Manager\Models\ProductIn;
use General\Core\Manager\Models\Transport;
use General\Core\Manager\Models\TransportInvoice;
use General\Core\Manager\Models\TransportProduct;
use General\Core\Manager\Models\Warehouse;
use General\Core\Util\Enums;

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

      $transportProduct = [];
      if ($this->request->hasPost('trans_prod')) {
        $trans_prods = $post['trans_prod'];
        foreach ($trans_prods as $pd_ele) {
          if ($pd_ele['product_id'] != '') {
            $transProduct = new TransportProduct();
            $transProduct->warehouse_id = $pd_ele['warehouse_id'];
            $transProduct->product_id   = $pd_ele['product_id'];
            $transProduct->amount       = $pd_ele['amount'];
            //
            array_push($transportProduct, $transProduct);
          }
        }
      }
      $transport->transportproduct = $transportProduct;

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
    $list_invoices = $this->getInvoiceList2();

    $this->view->setVar('transport', $transport);
    $this->view->setVar('selected_invoices', $selected_invoices);
    $this->view->setVar('list_invoices', $list_invoices);

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

    $transportProduct = $transport->getRelated('transportproduct');
    $i = 0;
    if ($transportProduct->count() > 0) {
      foreach($transportProduct as $tp) {
        $data_oc['trans_prod'][$i]['warehouse_id'] = $tp->warehouse_id;
        $data_oc['trans_prod'][$i]['product_id'] = $tp->product_id;
        $data_oc['trans_prod'][$i]['name'] = $tp->product->name;
        $data_oc['trans_prod'][$i]['amount'] = $tp->amount;
        $i++;
      }
    }

    $this->view->setVar('posts', $data_oc);
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

      $total_others = 0;
      if ($this->request->hasPost('others')) {
        //
        $others = $post['others'];
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

      $cond = [
        'conditions' => 'transport_id=:transport_id:',
        'bind' => ['transport_id' => $transport_id],
      ];
      $oldTransProduct = TransportProduct::find($cond);

      $transportProduct = [];
      if ($this->request->hasPost('trans_prod')) {
        $trans_prods = $post['trans_prod'];
        foreach ($trans_prods as $pd_ele) {
          if ($pd_ele['product_id'] != '') {
            $transProduct = new TransportProduct();
            $transProduct->warehouse_id = $pd_ele['warehouse_id'];
            $transProduct->product_id   = $pd_ele['product_id'];
            $transProduct->amount       = $pd_ele['amount'];
            //
            array_push($transportProduct, $transProduct);
          }
        }
      }
      $transport->transportproduct = $transportProduct;

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
        $oldTransInvoice->delete();
        $oldTransProduct->delete();
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
    $transportProduct = $transport->getRelated('transportproduct');

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
    $this->view->setVar('transportProduct', $transportProduct);
  }


  public function exportAction($id=null) {
    $this->view->disable();
    if ($id == null) {
      return false;
    }

    ob_start();
    $transport = Transport::findFirst($id);
    if ($transport) {
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
      $objPHPExcel->getActiveSheet()->setTitle($transport->remarks);
      // set data
      $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'No.')
        ->setCellValue('B1', 'KH')
        ->setCellValue('C1', 'SPham')
        ->setCellValue('D1', 'DGia')
        ->setCellValue('E1', 'SLg')
        ->setCellValue('F1', 'TTien')
        ->setCellValue('J1', $transport->total);

      $fname = 'Order-List-' . $transport->name . '-' . time() . '.xlsx';

      // temp file name to save before output
      $temp_file = tempnam(sys_get_temp_dir(), 'phpexcel');

      //
      $i = 2;
      $j = 2;
      $transportInvoices = $transport->getRelated('transportinvoice');
      foreach ($transportInvoices as $tiv) {
        $invoice = Invoice::findFirst($tiv->invoice_id);
        $invoiceDetails = $invoice->getRelated('invoicedetail');
        $total = 0;
        foreach ($invoiceDetails as $ind) {
          $product = $ind->getRelated('product');
          $objPHPExcel->getActiveSheet()
            ->setCellValue('A' . $i, $i-1)
            ->setCellValue('B' . $i, $invoice->client->name)
            ->setCellValue('C' . $i, $product->remarks)
//            ->setCellValue('C' . $i, $product->name)
            ->setCellValue('D' . $i, $ind->price)
            ->setCellValue('E' . $i, $ind->quantity)
            ->setCellValue('F' . $i, ($ind->price*$ind->quantity));
          $total += $ind->price*$ind->quantity;
          $i++;
        }
        $objPHPExcel->getActiveSheet()
          ->setCellValue('F' . $i, $total);
        $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getFont()
          ->setBold(true);
        $objPHPExcel->getActiveSheet()
          ->setCellValue('I' . $j, $invoice->client->name)
          ->setCellValue('J' . $j, $total);
        $i++;
        $j++;
      }

      $k = $i;
      $transportProducts = $transport->getRelated('transportproduct');
      foreach ($transportProducts as $tpd) {
        $objPHPExcel->getActiveSheet()
          ->setCellValue('A' . $k, $k-1)
          ->setCellValue('B' . $k, $tpd->warehouse->name)
          ->setCellValue('C' . $k, $tpd->product->remarks)
          ->setCellValue('E' . $k, $tpd->amount);
        $k++;
      }

      $objPHPExcel->getActiveSheet()->getStyle('A1:F1')
        ->applyFromArray([
          'font' => [
            'bold' => true
          ],
          'alignment' => [
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER
          ]
        ]);
      $objPHPExcel->getActiveSheet()->getStyle('D2:F200')->getNumberFormat()
        ->setFormatCode('#,###');
      $objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()
        ->setBold(true);
      $objPHPExcel->getActiveSheet()->getStyle('J1:J200')->getNumberFormat()
        ->setFormatCode('#,###');

      foreach (range('A', 'J') as $columnId) {
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


  public function exportMoreAction($id=null) {
    $this->view->disable();
    if ($id == null) {
      return false;
    }

    ob_start();
    $transport = Transport::findFirst($id);
    if ($transport) {
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
        ->setCellValue('B1', 'KH')
        ->setCellValue('C1', 'SPham')
        ->setCellValue('D1', 'DGia')
        ->setCellValue('E1', 'SLg')
        ->setCellValue('F1', 'TTien')
        ->setCellValue('G1', 'DGia(mua)')
        ->setCellValue('H1', 'TTien(mua)')
        ->setCellValue('I1', Enums::RATE)
        ->setCellValue('J1','=SUM(J2:J200)')
        ->setCellValue('K1', $transport->total_others)
        ->setCellValue('M1', $transport->total)
        ->setCellValue('O1', '=J1-K1');

      $fname = 'Order-List-More-' . $transport->name . '-' . time() . '.xlsx';

      // temp file name to save before output
      $temp_file = tempnam(sys_get_temp_dir(), 'phpexcel');

      //
      $i = 2;
      $j = 2;
      $transportInvoices = $transport->getRelated('transportinvoice');
      foreach ($transportInvoices as $tiv) {
        $invoice = Invoice::findFirst($tiv->invoice_id);
        $invoiceDetails = $invoice->getRelated('invoicedetail');
        $total = 0;
        $total_purchase = 0;
        foreach ($invoiceDetails as $ind) {
          $product = $ind->getRelated('product');
          $productIns = ProductIn::find([
            'conditions' => 'product_id=:pid:',
            'bind' => ['pid' => $product->id],
            'order' => 'created DESC',
            'limit' => 1
            ]);
          $objPHPExcel->getActiveSheet()
            ->setCellValue('A' . $i, $i-1)
            ->setCellValue('B' . $i, $invoice->client->name)
            ->setCellValue('C' . $i, $product->remarks)
//            ->setCellValue('C' . $i, $product->name)
            ->setCellValue('D' . $i, $ind->price)
            ->setCellValue('E' . $i, $ind->quantity)
            ->setCellValue('F' . $i, ($ind->price*$ind->quantity))
            ->setCellValue('G' . $i, $productIns[0]->purchase_price)
//            ->setCellValue('G' . $i, $product->purchase_price)
            ->setCellValue('H' . $i, ($product->purchase_price*$ind->quantity));
          $total += $ind->price*$ind->quantity;
          $total_purchase += $product->purchase_price*$ind->quantity;
          $i++;
        }
        $objPHPExcel->getActiveSheet()
          ->setCellValue('F' . $i, $total);
        $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getFont()
          ->setBold(true);
        $objPHPExcel->getActiveSheet()
          ->setCellValue('H' . $i, $total_purchase);
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getFont()
          ->setBold(true);
        $objPHPExcel->getActiveSheet()
          ->setCellValue('I' . $i,'=H' . $i . '*$I$1');
        $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getFont()
          ->setBold(true);
        $objPHPExcel->getActiveSheet()
          ->setCellValue('J' . $i,'=F' . $i . '-I' . $i);
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getFont()
          ->setBold(true);
        $objPHPExcel->getActiveSheet()
          ->setCellValue('L' . $j, $invoice->client->name)
          ->setCellValue('M' . $j, $total)
          ->setCellValue('N' . $j, $total_purchase);
        $i++;
        $j++;
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
      $objPHPExcel->getActiveSheet()->getStyle('J1:J1')->getFont()
        ->setBold(true);
      $objPHPExcel->getActiveSheet()->getStyle('J1:K1')->getNumberFormat()
        ->setFormatCode('#,###');
      $objPHPExcel->getActiveSheet()->getStyle('D2:J200')->getNumberFormat()
        ->setFormatCode('#,###');
      $objPHPExcel->getActiveSheet()->getStyle('M1:N1')->getFont()
        ->setBold(true);
      $objPHPExcel->getActiveSheet()->getStyle('M1:O200')->getNumberFormat()
        ->setFormatCode('#,###');

      foreach (range('A', 'N') as $columnId) {
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


  public function exportListAction($id=null) {
    $this->view->disable();
    if ($id == null) {
      return false;
    }

    ob_start();
    $transport = Transport::findFirst($id);
    if ($transport) {
      $objPHPExcel = new \PHPExcel();
      // Set document properties
      $objPHPExcel->getProperties()
        ->setCreator("Sakura Shop")
        ->setDescription("List Products");
      // Set default font
      $objPHPExcel->getDefaultStyle()->getFont()
        ->setName('Arial')
        ->setSize(12);
      // set Title
      $objPHPExcel->getActiveSheet()->setTitle('Products');
      // set data
      $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'MẪU YÊU CẦU NHẬN HÀNG VẬN CHUYỂN')
        ->setCellValue('A2', 'Từ Nhật Bản đến Hà Nội (Việt Nam)')
        ->setCellValue('A4', 'Người gửi tại Nhật Bản')
        ->setCellValue('A5', 'Họ & Tên')
        ->setCellValue('A6', 'Số vận đơn')
        ->setCellValue('A8', 'Người nhận tại Việt Nam')
        ->setCellValue('A9', 'Họ & Tên')
        ->setCellValue('A10', 'Địa chỉ')
        ->setCellValue('A11', 'ĐT')
        ->setCellValue('A13', 'No.')
        ->setCellValue('B13', 'SPham')
        ->setCellValue('C13', 'PLoai')
        ->setCellValue('D13', 'SLg');

      $fname = 'Products-List-' . $transport->name . '-' . time() . '.xlsx';

      // temp file name to save before output
      $temp_file = tempnam(sys_get_temp_dir(), 'phpexcel');

      $objPHPExcel->getActiveSheet()
        ->setCellValue('B5', $transport->sender->lastname.' '.$transport->sender->firstname)
        ->setCellValue('B6', $transport->name)
        ->setCellValue('B9', $transport->receiver->lastname.' '.$transport->receiver->firstname)
        ->setCellValue('B10', $transport->receiver->address)
        ->setCellValue('B11', $transport->receiver->phone);

      //
      $i = 14;
      $transportInvoices = $transport->getRelated('transportinvoice');
      foreach ($transportInvoices as $tiv) {
        $invoice = Invoice::findFirst($tiv->invoice_id);
        $invoiceDetails = $invoice->getRelated('invoicedetail');
        foreach ($invoiceDetails as $ind) {
          $product = $ind->getRelated('product');
          $objPHPExcel->getActiveSheet()
            ->setCellValue('A' . $i, $i-12-1)
            ->setCellValue('B' . $i, $product->name)
            ->setCellValue('C' . $i, $product->category->name)
            ->setCellValue('D' . $i, $ind->quantity);
          $i++;
        }
      }

      $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
      $objPHPExcel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true)->setUnderline(true);
      $objPHPExcel->getActiveSheet()->getStyle('A8')->getFont()->setBold(true)->setUnderline(true);

      $objPHPExcel->getActiveSheet()->getStyle('A13:C13')
        ->applyFromArray([
          'font' => [
            'bold' => true
          ],
          'alignment' => [
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER
          ]
        ]);

      foreach (range('B', 'D') as $columnId) {
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


  public function beforeExecuteRoute($dispatcher)
  {

    $cond = [
      'conditions' => 'disabled=:disabled: AND type=:type:',
      'bind' => ['disabled' => 0, 'type' => 2],
      'order' => 'name',
    ];
    $clients = Client::find($this->qi->inject('Client', $cond));
    $this->view->setVar('clients', $clients);
    $this->view->setVar('status', $this->enum->transportStatus());

    $cond = [
      'conditions' => 'disabled=:disabled: AND type=:type:',
      'bind' => ['disabled' => 0, 'type' => 3],
      'order' => 'name',
    ];
    $sender = Client::find($this->qi->inject('Client', $cond));
    $this->view->setVar('sender', $sender);

    $cond = [
      'conditions' => 'disabled=:disabled: AND type=:type:',
      'bind' => ['disabled' => 0, 'type' => 1],
      'order' => 'name',
    ];
    $receiver = Client::find($this->qi->inject('Client', $cond));
    $this->view->setVar('receiver', $receiver);

    $warehouses = Warehouse::find();
    $this->view->setVar('warehouses', $warehouses);
    $this->view->setVar('warehousesArr', $warehouses->toArray());

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

