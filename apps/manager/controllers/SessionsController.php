<?php
/**
 * handles authentication process of servicers.
 */
namespace General\Core\Manager\Controllers;

use General\Core\Auth\AuthDbException;
use General\Core\Auth\AuthBfaException;


/**
 * class for display sign in form, process after success / failure of sign in, sign out process.
 *
 * @package General\Core\Servicer\Controllers
 */
class SessionsController extends ControllerBase
{

  /**
   * guard from unexpected access that ends with slash.
   */
  public function indexAction()
  {
    $this->response->redirect('servicer/main/index');
    return;
  }


  /**
   * start sign in session.
   * セッションの開始
   */
  public function startAction()
  {
    if ($this->request->isPost()) {
      /* retrieve posted data. */
      $credential = [
        'username' => $this->request->getPost('username'),
        'password' => $this->request->getPost('password'),
      ];
      /* authentication will be succeeds when active user exists,
       * and hash value of the password matches. */
      try {
        $this->auth->check($credential);
        $this->response->redirect('manager/main/dashboard');
        return;
      } catch (AuthBfaException $e) {
        /* in case of brute force attack attempt, raise software error. */
        $this->flash->error($e->getMessage());
        $this->dispatcher->forward([
          'module'     => 'manager',
          'controller' => 'errors',
          'action'     => 'error403'
        ]);
        return;
      } catch (AuthDbException $e) {
        $this->flash->error($e->getMessage());
      }
    }
    $this->view->setVar('title', $this->l10n->_('Sign In'));
    $this->response->redirect('manager/main/index');
    return;
  }


  /**
   * sign out and close session.
   */
  public function endAction()
  {
    $this->session->remove('auth');
    $this->flash->notice('Goodbye!');
    $this->response->redirect('manager/main/index');
    return;
  }


  /**
   * preprocess before action execution.
   *
   * @param \Phalcon\Mvc\Dispatcher $dispatcher
   * @return boolean
   */
  public function beforeExecuteRoute($dispatcher)
  {
    parent::beforeExecuteRoute($dispatcher);
    return true;
  }

}

