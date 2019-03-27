<?php
/**
 * handles session management with saving data to local file.
 * ファイルを使用してセッション管理を行う
 */
namespace Coolrevo\Smc\Session;

use Phalcon\Session\Adapter\Files;


/**
 * an extended session adapter.
 * 拡張版ファイルアダプタ
 *
 * stores session data to local file.
 * ローカルファイルにセッションデータを保管する。
 *
 * inherited properties from \Phalcon\Session\Adapter
 *
 * const SESSION_ACTIVE   = 2;
 * const SESSION_NONE     = 1;
 * const SESSION_DISABLED = 0;
 * protected _uniqueId;
 * protected _started = false;
 * protected _options;
 *
 * @package Coolrevo\Smc\Session
 */
class File extends Files
{

  /**
   * class constructor
   *
   * @param  array $options
   */
  public function __construct($options = []) {
    parent::__construct($options);

    if (!isset($options['lifetime'])
    ||   empty($options['lifetime'])) {
      $this->_options['lifetime'] = 0;
    }
    if (!isset($options['path'])
    ||   empty($options['path'])) {
      $this->_options['path'] = '/';
    }
    if (!isset($options['domain'])
    ||   empty($options['domain'])) {
      $this->_options['domain'] = '.' . $_SERVER['SERVER_NAME'];
    }
    if (!isset($options['secure'])
    ||   empty($options['secure'])) {
      $this->_options['secure'] = false;
    }
    if (!isset($options['httponly'])
    ||   empty($options['httponly'])) {
      $this->_options['httponly'] = false;
    }
  }


  /**
   * @inheritdoc
   */
  public function start()
  {
    /* get options
     * オプション取得 */
    $o = $this->getOptions();
    if (session_status() == PHP_SESSION_NONE) {
      /* gets and gets the cookie name
       * cookie名 */
      session_name($o['name']);
      /* session parameters
       * セッションに関するパラメータ */
      session_set_cookie_params( $o['lifetime'], $o['path'], $o['domain'], $o['secure'], $o['httponly']);
      /* start session
       * セッションの開始 */
      return parent::start();
    } else {
      return true;
    }
  }

  /**
   * @inheritdoc
   */
  public function set($index, $value)
  {
    parent::set($index, $value);
    /* get options
     * オプション取得 */
    $o = $this->getOptions();
    /* get current SESSIONID
     * 現在のセッションID取得 */
    $sid = session_id();
    /* update cookie lifetime
     * cookieの廃棄時間更新 */
    $expire = time() + (int) $o['lifetime'];
    /* update cookie
     * cookieを更新 */
    setcookie($o['name'], $sid, $expire, $o['path'], $o['domain'], $o['secure'], $o['httponly']);
  }

}