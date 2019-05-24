<?php

namespace General\Core\Manager\Controllers;

use General\Core\Manager\Models\OutGoing;
use General\Core\Manager\Models\Member;
use General\Core\Manager\Models\Type;

/**
 * Class IndexController
 * @package General\Core\Converter\Controllers
 */
class OutGoingController extends ControllerBase
{

  public function indexAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('List OutGoings'));
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
    $paginator = $this->getPagination('OutGoing', $page, $limit, $posts);
    if (!$paginator) {
      $this->response->redirect('manager/main/index');
      return;
    }
    $this->view->setVar('page', $paginator->getPaginate());
  }

  public function newAction()
  {
    /* set title of this page. */
    $this->setPageHeading($this->l10n->_('Create New OutGoing'));
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
      $outgoing = new OutGoing();
      $outgoing->assign($this->request->getPost());
      if (!$this->request->hasPost('disabled')) {
        $outgoing->disabled = 0;
      }

      /* test whether the current user can edit this OutGoing. */
      if (!$this->qi->is_editable('OutGoing', $outgoing)) {
        $this->flash->notice($this->l10n->_("You don't have access to this module: ") . 'outgoing:create');
        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'outgoing',
          'action' => 'index',
        ]);
        return;
      }

      /* if failed to save, put error in session and will be forwarded. */
      /** @var \Phalcon\Mvc\Model\Message $msg */
      if (!$outgoing->create()) {
        $msgstack = '';
        foreach ($outgoing->getMessages() as $msg) {
          $msgstack .= $this->l10n->_($msg->getMessage()) . '<br>';
        }
        $this->flash->error($msgstack);

        $this->dispatcher->forward([
          'module' => 'manager',
          'controller' => 'outgoing',
          'action' => 'new'
        ]);
        return;
      }
      /* if successfully saved, put message in session and redirect. */
      $this->flash->success($this->l10n->_('OutGoing was created successfully.'));
      $this->response->redirect('manager/outgoing/show/' . $outgoing->id);
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
    $this->setPageHeading($this->l10n->_('Detail of OutGoing'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $outgoing = OutGoing::findFirst($this->qi->inject('OutGoing', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$outgoing) {
      $this->flash->error($this->l10n->_('Specified OutGoing cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'outgoing',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('outgoing', $outgoing);
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
    $this->setPageHeading($this->l10n->_('Edit OutGoing'));

    $cond = [
      'conditions' => 'id=:id:',
      'bind' => ['id' => $id],
    ];
    $outgoing = OutGoing::findFirst($this->qi->inject('OutGoing', $cond));

    /* put error in session and will be forwarded, if result is empty. */
    if (!$outgoing) {
      $this->flash->error($this->l10n->_('Specified OutGoing cannot found.') . "($id)");
      $this->dispatcher->forward([
        'module' => 'manager',
        'controller' => 'outgoing',
        'action' => 'index',
      ]);
      return;
    }
    /* set parameters to display page. */
    $this->view->setVar('outgoing', $outgoing);
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
    $outgoing = OutGoing::findFirst($this->qi->inject('OutGoing', $cond));

    /* create instance and set parameters. */
    $outgoing->assign($this->request->getPost());
    if (!$this->request->hasPost('disabled')) {
      $outgoing->disabled = 0;
    }

    /* test whether the current user can edit this OutGoing. */
    if (!$this->qi->is_editable('OutGoing', $outgoing)) {
      $this->flash->notice($this->l10n->_("You don't have access to this module: ").'outgoing:save');
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'outgoing',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if failed to save, put error in session and will be forwarded. */
    /** @var \Phalcon\Mvc\Model\Message $msg */
    if (!$outgoing->save()) {
      $msgstack = '';
      foreach ($outgoing->getMessages() as $msg) {
        $msgstack .= $this->l10n->_($msg->getMessage()).'<br>';
      }
      $this->flash->error($msgstack);
      $this->view->setVar('outgoing', $outgoing);
      $this->dispatcher->forward([
        'module'     => 'manager',
        'controller' => 'outgoing',
        'action'     => 'edit',
        'params'     => [$id],
      ]);
      return;
    }

    /* if successfully saved, put message in session and redirect. */
    $this->flash->success($this->l10n->_('OutGoing was updated successfully.'));
    $this->response->redirect('manager/outgoing/show/'.$id);
  }

  public function initialize()
  {
    parent::initialize();
    $this->prependTitle($this->l10n->_('Manage OutGoings'));
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

