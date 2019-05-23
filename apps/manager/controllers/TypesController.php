<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\Type;
use General\Core\Manager\Models\Country;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class TypesController extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List Types'));
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
    $paginator = $this->getPagination('Type', $page, $limit, $posts);
    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }

  public function newAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New Type'));
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
      $type = new Type();
      $type->assign($this->request->getPost());
      if (!$this->request->hasPost('disabled')) {
        $type->disabled = 0;
      }

      /* test whether the current user can edit this Type. */
      if (!$this->qi->is_editable('Type', $type)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'types:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'types',
          'action' => 'index',
        ]);
        return;
      }

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$type->create()) {
        $msgstack = '';
        foreach ($type->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'types',
          'action' => 'new'
        ]);
        return;
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('Type was created successfully.'));
      $this->response->redirect('manager/types/show/' . $type->id);
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
    $this->setPageHeading($this->l10n->_('Detail of Type'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $type = Type::findFirst($this->qi->inject('Type', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$type) {
      $this->flash->error($this->l10n->_('Specified Type cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'types',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('type', $type);
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
    $this->setPageHeading($this->l10n->_('Edit Type'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $type = Type::findFirst($this->qi->inject('Type', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$type) {
      $this->flash->error($this->l10n->_('Specified Type cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'types',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('type', $type);
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
    $type = Type::findFirst($this->qi->inject('Type', $cond));

    /* create instance and set parameters. */
    $type->assign($this->request->getPost());
    if (!$this->request->hasPost('disabled')) {
      $type->disabled = 0;
    }

    /* test whether the current user can edit this Type. */
    if (!$this->qi->is_editable('Type', $type)) {
      $this->flash->notice($this->l10n->_("You don't have access to this module: ").'types:save');
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'types',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if failed to save, put error in session and will be forwarded. */
    /** @var \Phalcon\Mvc\Model\Message $msg */
    if (!$type->save()) {
      $msgstack = '';
      foreach ($type->getMessages() as $msg) {
        $msgstack .= $this->l10n->_($msg->getMessage()).'<br>';
      }
      $this->flash->error($msgstack);
      $this->view->setVar('type', $type);
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'types',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if successfully saved, put message in session and redirect. */
    $this->flash->success($this->l10n->_('Type was updated successfully.'));
    $this->response->redirect('manager/types/show/'.$id);
  }

  public function initialize()
  {
    parent::initialize();
    $this->prependTitle($this->l10n->_('Manage Types'));
  }

  public function beforeExecuteRoute($dispatcher)
  {
    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

