<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Common;
use General\Core\Manager\Models\Invoice;
use General\Core\Manager\Models\Product;
use General\Core\Manager\Models\ProductIn;
use General\Core\Manager\Models\ProductQuantity;
use General\Core\Manager\Models\Warehouse;
use General\Core\Util\Enums;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class InventoryController  extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Inventory'));
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


  public function exportAction() {
    $this->view->disable();

    ob_start();
    if ($this->request->hasPost('from') && ($this->request->getPost('from') != 0) &&
      $this->request->hasPost('to') && ($this->request->getPost('to') != 0)) {
      $cond = [
        'conditions' => 'id BETWEEN :from: AND :to: AND disabled=:disabled:',
        'bind' => [
          'from' => $this->request->getPost('from'),
          'to' => $this->request->getPost('to'),
          'disabled' => 0,
        ],
        'order' => 'name'
      ];
    } else {
      $cond = [
        'conditions' => 'disabled=:disabled:',
        'bind' => [
          'disabled' => 0,
        ],
        'order' => 'name'
      ];
    }
    $products = Product::find($cond);

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
      ->setCellValue('B1', 'SPham')
      ->setCellValue('C1', 'G.Lẻ')
      ->setCellValue('D1', 'G.Sỉ')
      ->setCellValue('E1', 'SG')
      ->setCellValue('F1', 'LG');

    $fname = 'Inventory-List-' . time() . '.xlsx';

    // temp file name to save before output
    $temp_file = tempnam(sys_get_temp_dir(), 'phpexcel');

    $i = 2;
    foreach ($products as $product) {
      $productQts = $product->getRelated('productquantity');
      $objPHPExcel->getActiveSheet()
        ->setCellValue('A' . $i, $i-1)
        ->setCellValue('B' . $i, $product->name)
        ->setCellValue('C' . $i, $product->price)
        ->setCellValue('D' . $i, $product->wholesale_price);
      //
      foreach ($productQts as $item) {
        if ($item->warehouse_id == 1) {
          $objPHPExcel->getActiveSheet()
            ->setCellValue('E' . $i, $item->quantity);
        } else {
          $objPHPExcel->getActiveSheet()
            ->setCellValue('F' . $i, $item->quantity);
        }
      }
      $i++;
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
    $objPHPExcel->getActiveSheet()->getStyle('C2:F200')->getNumberFormat()
      ->setFormatCode('#,###');

    foreach (range('A', 'F') as $columnId) {
      $objPHPExcel->getActiveSheet()->getColumnDimension($columnId)->setAutoSize(true);
    }

    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($temp_file);

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

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

