<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\InCome;
use General\Core\Manager\Models\Member;
use General\Core\Manager\Models\Type;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class InComesController extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List InComes'));
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
    $paginator = $this->getPagination('InCome', $page, $limit, $posts);
    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }

  public function newAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New InCome'));
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
      $income = new InCome();
      $income->assign($this->request->getPost());
      if (!$this->request->hasPost('disabled')) {
        $income->disabled = 0;
      }

      /* test whether the current user can edit this InCome. */
      if (!$this->qi->is_editable('InCome', $income)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'incomes:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'incomes',
          'action' => 'index',
        ]);
        return;
      }

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$income->create()) {
        $msgstack = '';
        foreach ($income->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'incomes',
          'action' => 'new'
        ]);
        return;
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('InCome was created successfully.'));
      $this->response->redirect('manager/incomes/show/' . $income->id);
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
    $this->setPageHeading($this->l10n->_('Detail of InCome'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $income = InCome::findFirst($this->qi->inject('InCome', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$income) {
      $this->flash->error($this->l10n->_('Specified InCome cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'incomes',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('income', $income);
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
    $this->setPageHeading($this->l10n->_('Edit InCome'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $income = InCome::findFirst($this->qi->inject('InCome', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$income) {
      $this->flash->error($this->l10n->_('Specified InCome cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'incomes',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('income', $income);
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
    $income = InCome::findFirst($this->qi->inject('InCome', $cond));

    /* create instance and set parameters. */
    $income->assign($this->request->getPost());
    if (!$this->request->hasPost('disabled')) {
      $income->disabled = 0;
    }

    /* test whether the current user can edit this InCome. */
    if (!$this->qi->is_editable('InCome', $income)) {
      $this->flash->notice($this->l10n->_("You don't have access to this module: ").'incomes:save');
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'incomes',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if failed to save, put error in session and will be forwarded. */
    /** @var \Phalcon\Mvc\Model\Message $msg */
    if (!$income->save()) {
      $msgstack = '';
      foreach ($income->getMessages() as $msg) {
        $msgstack .= $this->l10n->_($msg->getMessage()).'<br>';
      }
      $this->flash->error($msgstack);
      $this->view->setVar('income', $income);
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'incomes',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if successfully saved, put message in session and redirect. */
    $this->flash->success($this->l10n->_('InCome was updated successfully.'));
    $this->response->redirect('manager/incomes/show/'.$id);
  }

  public function initialize()
  {
    parent::initialize();
    $this->prependTitle($this->l10n->_('Manage InComes'));
  }

  public function beforeExecuteRoute($dispatcher)
  {
    $members = Member::find([
      'conditions' => 'disabled=:disabled:',
      'bind' => [
        'disabled' => 0,
      ]
    ]);
    $this->view->setVar('members', $members);

    $types = Type::find();
    $this->view->setVar('types', $types);

    parent::beforeExecuteRoute($dispatcher);
    return true;
  }
}

