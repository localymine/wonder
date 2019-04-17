<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Brand;
use General\Core\Manager\Models\Client;
use General\Core\Manager\Models\Country;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class BrandsController extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List Brands'));
    /* page number to be initially displayed. */
    $page = 1;
    /* maximum number of data to be displaied on single page. */
    $limit = 100;
    /* initialize data to be passed to paginator. */
    $posts = isset($_REQUEST) ? $_REQUEST : [];
    $posts['order'] = 'name';

    if ($this->request->hasQuery('limit')) {
      $limit = $this->request->getQuery('limit', 'int');
    }
    if ($this->request->hasQuery('page')) {
      $page = $this->request->getQuery('page', 'int');
    }
    $paginator = $this->getPagination('Brand', $page, $limit, $posts);
    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }

  public function newAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New Brand'));
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
      $client = new Brand();
      $client->assign($this->request->getPost());
      if (!$this->request->hasPost('disabled')) {
        $client->disabled = 0;
      }

      /* test whether the current user can edit this Client. */
      if (!$this->qi->is_editable('Brand', $client)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'brands:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'brands',
          'action' => 'index',
        ]);
        return;
      }

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$client->create()) {
        $msgstack = '';
        foreach ($client->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'brands',
          'action' => 'new'
        ]);
        return;
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Brand was created successfully.'));
      $this->response->redirect('manager/brands/show/' . $client->id);
      return;
    }
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
    $this->setPageHeading($this->l10n->_('Detail of Brand'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $client = Brand::findFirst($this->qi->inject('Brand', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$client) {
      $this->flash->error($this->l10n->_('Specified Client cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'brands',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('brand', $client);
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
    $this->setPageHeading($this->l10n->_('Edit Brand'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $client = Brand::findFirst($this->qi->inject('Brand', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$client) {
      $this->flash->error($this->l10n->_('Specified Client cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'brands',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('brand', $client);
  }

  public function saveAction()
  {
    /* return 404 status if request method is not POST, or $_POST[id] is not set. */
    if (!$this->request->isPost()
      ||  !$this->request->hasPost('id')) {
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'errors',
        'action'     => 'error404',
      ]);
      return;
    }

    $id = $this->request->getPost('id');
    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $client = Brand::findFirst($this->qi->inject('Brand', $cond));

    /* create instance and set parameters. */
    $client->assign($this->request->getPost());
    if (!$this->request->hasPost('disabled')) {
      $client->disabled = 0;
    }

    /* test whether the current user can edit this Client. */
    if (!$this->qi->is_editable('Brand', $client)) {
      $this->flash->notice($this->l10n->_("You don't have access to this module: ").'brands:save');
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'brands',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if failed to save, put error in session and will be forwarded. */
    /** @var \Phalcon\Mvc\Model\Message $msg */
    if (!$client->save()) {
      $msgstack = '';
      foreach ($client->getMessages() as $msg) {
        $msgstack .= $this->l10n->_($msg->getMessage()).'<br>';
      }
      $this->flash->error($msgstack);
      $this->view->setVar('brand', $client);
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'brands',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if successfully saved, put message in session and redirect. */
    $this->flash->success($this->l10n->_('Brand was updated successfully.'));
    $this->response->redirect('manager/brands/show/'.$id);
  }

  public function initialize()
  {
    parent::initialize();
    $this->prependTitle($this->l10n->_('Manage Clients'));
  }

  public function beforeExecuteRoute($dispatcher)
  {
    $countries = Country::find();
    $this->view->setVar('countries', $countries);

    $this->view->setVar('type', $this->enum->clientType());

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

