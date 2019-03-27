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

    /* your inventory stock dips below the predetermined levels */
    $lowInventory = $this->checkParLevel($user->id);
    $this->view->setVar('products', $lowInventory);
  }

  public function checkParLevel($user_id) {
    $parLevel = Common::query()
      ->where('[' . Common::class . '].cid=:cid:', ['cid' => Common::G_PAR_LEVEL])
      ->columns(['value', 'name'])
      ->execute();
    $cond = [
      'conditions' => 'user_id=:user_id: AND quantity<=:quantity: ',
      'bind' => [
        'user_id'   => $user_id,
        'quantity'  => $parLevel[0]['value'],
      ],
      'order' => 'quantity',
    ];
    $product = Product::find($cond);
    return $product;
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

