<?php

namespace General\Core\Manager\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use General\Core\Paginator\ModelFilter;
use General\Core\Util\FilterInjector;

/**
 * @package General\Core\Controllers
 *
 * @property \Phalcon\Translate\Adapter\PeclGettext $l10n
 * @property \General\Core\Util\QueryInjector $qi
 * @property \General\Core\Util\Enums $enum
 * @property \General\Core\Manager\Components\Auth $auth
 */
class ControllerBase extends Controller
{
  public function initialize()
  {
    // set DOCTYPE HTML5
    Tag::setDocType(Tag::HTML5);
    // initialize parameters
    $this->persistent->{'parameters'} = null;
    Tag::setTitle($this->l10n->_(SKR_APPNAME));
  }


  /**
   * preprocess before each action execution.
   *
   * @param \Phalcon\Mvc\Dispatcher $dispatcher
   */
  public function beforeExecuteRoute($dispatcher)
  {
    /* retrieve session informations. */
    $identity = $this->auth->getIdentity();
    /* retrieve Module name of current access. */
    $moduleName = $this->router->getModuleName();
    /* retrieve Controller name of current access. */
    $controllerName = $dispatcher->getControllerName();
    /* retrieve Action name of current access. */
    $actionName = $dispatcher->getActionName();
    // 認証が必要なコントローラの場合

    if ($this->acl->isPrivate($controllerName, $actionName)) {
      if (!$identity) {
        /* redirect to sign in form if session does not exist(= not logged in). */
        $this->flash->notice($this->l10n->_('The session has expired. Please sign in.'));
        $this->response->redirect("$moduleName/main/index");
        return;
      }
      if (!$this->acl->isAllowed($identity['role'], $controllerName, $actionName)) {
        /* for actions not permitted for the user. */
        $this->flash->notice(
          $this->l10n->_("You don't have access to this module: ") . "$controllerName:$actionName"
        );
        if ($this->acl->isAllowed($identity['role'], $controllerName, 'index')) {
          /* if exists and allowed to user, redirect to indexAction. */
          $dispatcher->forward([
            'module' => $moduleName,
            'controller' => $controllerName,
            'action' => 'index'
          ]);
          return;
        } else {
          /* delete session and transfer to sign in form. */
          $this->auth->remove();
          $dispatcher->forward([
            'module' => $moduleName,
            'controller' => 'main',
            'action' => 'index'
          ]);
          return;
        }
      }
    }
    $prev_naved = $this->session->get('navigated', false);
    $navigated = time();
    $this->session->set('navigated', $navigated);

    if ($prev_naved) {
      if ($navigated - $prev_naved > SKR_SYS_SESSLIFETIME) {
        /* redirect to sign in form if session time is exceeded. */
        $this->auth->remove();
        $this->flash->notice($this->l10n->_('The session has expired. Please sign in.'));
        $this->response->redirect("$moduleName/main/index");
        return;
      }
    }

    if ($identity && !empty($identity)) {
      $this->view->setVar('identity', $identity);
    }

    if ($this->ezcookies->has('skr_pm_collapse')) {
      $collapsed = $this->ezcookies->get('smc_pm_collapse')->getValue();
      if (intval($collapsed) == 1) {
        $this->view->setVar('bodycollapsed', 1);
      }
    }

    return true;
  }


  /**
   * set characters as H1 element of the page, and set as variable to View.
   *
   * @param string $title character to set as title.
   */
  protected function setPageHeading($title)
  {
    $this->prependTitle($title);
    $this->view->setVar('page_heading', $title);
  }


  /**
   * add an element before the title with a delimiter in between.
   *
   * @param string $title title string.
   * @param string $glue character add between letters.
   */
  protected function prependTitle($title, $glue = '|')
  {
    if (!is_null($glue)) {
      Tag::prependTitle(" $glue ");
    }
    Tag::prependTitle($title);
  }


  /**
   * add an element behind the title with a delimiter in between.
   *
   * @param string $title title string.
   * @param string $glue character add between letters.
   */
  protected function appendTitle($title, $glue = '|')
  {
    Tag::appendTitle($title);
    if (!is_null($glue)) {
      Tag::appendTitle(" $glue ");
    }
  }


  /**
   * Paging
   *
   * @param string $ModelName Model name to paginate.
   * @param int    $page      page # to display.
   * @param int    $limit     display rows per page.
   * @param array  $posts     posted data.
   * @return ModelFilter|bool Paginator
   */
  protected function getPagination($ModelName, $page = 1, $limit = 100, $posts = [])
  {
    /* retrieve any saved parameters if any.
     * 保存済パラメータがあれば取得 */
    $persistent = $this->persistent->get('parameters');
    if (!is_array($persistent)) {
      $persistent = [];
    }
    $params = array_merge($posts, $persistent);
    /** @var Criteria $parameters */
    $creteria = FilterInjector::applyFilter($this->di, $ModelName, $params);
    if ($creteria) {
      $this->persistent->set('parameters', $creteria->getParams());
      /** @var Resultset $model_data */
      $model_data = $creteria->execute();

      $paginator = new ModelFilter([
        'data' => $model_data,
        'limit'=> $limit,
        'page' => $page,
        'query'=> $params,
      ]);
//      FilterInjector::buildFilterForm($this->di, $this, $ModelName, $params);
      return $paginator;
    } else {
      return false;
    }
  }

  protected function getInvoiceList($client_id)
  {
    $creteria = FilterInjector::getInvoiceNotInTransportInvoice($this->di, $client_id);
    if ($creteria) {
      /** @var Resultset $model_data */
      return $creteria->execute();
    } else {
      return false;
    }
  }

  protected function getInvoiceList2($client_id, $transport_id) {
    $result = FilterInjector::getInvoiceNotInTransportInvoiceAndSelectedInvoice($this->di, $client_id, $transport_id);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

}