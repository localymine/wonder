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

