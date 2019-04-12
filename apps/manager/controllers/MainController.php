<?php

namespace General\Core\Manager\Controllers;
use General\Core\Manager\Models\Common;
use General\Core\Manager\Models\Product;

/**
 * Class MainController
 * @package General\Core\Converter\Controllers
 */
class MainController extends ControllerBase
{

  public function indexAction()
  {
    $this->setPageHeading($this->l10n->_('Sign In'));
    if ($this->session->get('auth')) {
      $this->response->redirect('manager/main/dashboard');
    }
  }

  public function dashboardAction()
  {
    $user = $this->auth->getUser();
    if (!$user) {
      $this->view->disable();
      $this->auth->remove();
      $this->response->redirect('manager/main/index');
      return;
    }

    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('DashBoard'));
    /* set sidebar collapsed. */
    $this->view->setVar('bodycollapsed', 1);
    /* set User to View variables. */
    $this->view->setVar('user', $user);

    /* get the most order */
    $mostOrders = $this->getTheMostOrder();
    foreach ($mostOrders as $item) {
      $mOrder_dt[] = $item->quantity;
      $mOrder_lb[] = $item->name;
    }
    $this->view->setVar('mOrder_dt', implode(',', $mOrder_dt));
    $this->view->setVar('mOrder_lb', '"'.implode('","', $mOrder_lb).'"');

    /* get the most user care about */
    $mostCares = $this->getUserMostInterested();
    foreach ($mostCares as $item) {
      $mInterested_dt[] = $item->quantity;
      $mInterested_lb[] = $item->name;
    }
    $this->view->setVar('mInterested_dt', implode(',', $mInterested_dt));
    $this->view->setVar('mInterested_lb', '"'.implode('","', $mInterested_lb).'"');

    /* get the most brand name */
    $mostCares = $this->getUserMostBrandName();
    foreach ($mostCares as $item) {
      $mBrand_dt[] = $item->quantity;
      $mBrand_lb[] = $item->name;
    }
    $this->view->setVar('mBrand_dt', implode(',', $mBrand_dt));
    $this->view->setVar('mBrand_lb', '"'.implode('","', $mBrand_lb).'"');

    /* your inventory stock dips below the predetermined levels */
    $lowInventory = $this->getProductsVsParLevel();
    $this->view->setVar('products', $lowInventory);
  }


  public function forbiddenAction()
  {
    $this->setPageHeading('Forbidden');
  }


  public function beforeExecuteRoute($dispatcher)
  {
    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

