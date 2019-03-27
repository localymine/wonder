<?php
/**
 * handles error pages of servicer module.
 * サービサモジュールのエラーページ処理
 */
namespace General\Core\Manager\Controllers;


/**
 * class that handles HTTP 4xx and 5xx errors.
 * HTTP 4xx および 5xxエラーの処理を行う
 *
 * @package General\Core\Manager\Controllers
 */
class ErrorsController extends ControllerBase
{


  /**
   * returns Unknown Error.
   * HTTP status Unknown Error を返す
   */
  public function indexAction()
  {
    $this->setPageHeading('Unknown Error Occurred');
    $this->response->setStatusCode(500, 'Unknown Error Occurred');
  }


  /**
   * returns 401 Error.
   * HTTP status 401 Error を返す
   */
  public function error401Action()
  {
    $this->setPageHeading('401 Authentication Required');
    $this->response->setStatusCode(401, 'Authentication Required');
  }


  /**
   * returns 403 Error.
   * HTTP status 403 Error を返す
   */
  public function error403Action()
  {
    $this->setPageHeading('403 Forbidden');
    $this->response->setStatusCode(403, 'Forbidden');
  }


  /**
   * returns 404 Error.
   * HTTP status 404 Error を返す
   */
  public function error404Action()
  {
    $this->setPageHeading('404 Not Found');
    $this->response->setStatusCode(404, 'Not Found');
  }


  /**
   * returns 500 Error.
   * HTTP status 500 Error を返す
   */
  public function error500Action()
  {
    $this->setPageHeading('500 Internal Server Error');
    $this->response->setStatusCode(500, 'Internal Server Error');
  }


  /**
   * returns 501 Error.
   * HTTP status 501 Error を返す
   */
  public function error501Action()
  {
    $this->setPageHeading('501 Not Implemented');
    $this->response->setStatusCode(501, 'Not Implemented');
  }


  /**
   * returns 502 Error.
   * HTTP status 502 Error を返す
   */
  public function error502Action()
  {
    $this->setPageHeading('502 Bad Gateway');
    $this->response->setStatusCode(502, 'Bad Gateway');
  }


  /**
   * returns 503 Error.
   * HTTP status 503 Error を返す
   */
  public function error503Action()
  {
    $this->setPageHeading('503 Service Unavailable');
    $this->response->setStatusCode(503, 'Service Unavailable');
  }


  /**
   * initialization of controller before dispatch.
   * コントローラの初期化
   */
  public function initialize()
  {
    parent::initialize();
    $this->view->setLayout('error');
    $this->prependTitle($this->l10n->_('Manage Members'));
  }


  /**
   * preprocess before action execution.
   * コントローラアクションの実行前処理
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

