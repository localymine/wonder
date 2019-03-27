<?php
/**
 * handles session management with saving data to database.
 * データベースを使用してセッション管理を行う
 */
namespace General\Core\Session;

use Phalcon\Session\Adapter\Database as DbAdapter;
use General\Core\Session\Exception as SessionException;


/**
 * an extended session adapter.
 * 拡張版セッションアダプタ
 *
 * stores session data to database.
 * データベースにセッションデータを保管する。
 *
 * inherited properties from \Phalcon\Session\Adapter
 *
 * const SESSION_ACTIVE   = 2;
 * const SESSION_NONE     = 1;
 * const SESSION_DISABLED = 0;
 * protected _uniqueId;
 * protected _started = false;
 * protected _options;
 * protected connection;
 *
 * @package Coolrevo\Smc\Session
 */
class Database extends DbAdapter
{

  /**
   * class constructor
   *
   * @param  array $options
   * @throws Exception
   */
  public function __construct($options = [])
  {
    try {
      parent::__construct($options);
    } catch (\Phalcon\Session\Exception $e) {
      throw new SessionException($e->getMessage());
    }

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
    /* gets and gets the cookie name
     * cookie名 */
    session_name($o['name']);
    /* session parameters
     * セッションに関するパラメータ */
    session_set_cookie_params( $o['lifetime'], $o['path'], $o['domain'], $o['secure'], $o['httponly']);
    /* start session
     * セッションの開始 */
    return parent::start();
  }

  /**
   * @inheritdoc
   * @param string $index
   * @param mixed $value
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

  /**
   * @inheritdoc
   *
   * @return boolean
   */
  public function open()
  {
    return true;
  }

  /**
   * @inheritdoc
   *
   * @return boolean
   */
  public function close()
  {
    return false;
  }

  /**
   * @inheritdoc
   *
   * @param  string $sessionId
   * @return string
   */
  public function read($sessionId)
  {
    return parent::read($sessionId);
  }

  /**
   * @inheritdoc
   *
   * @param  string $sessionId
   * @param  string $data
   * @return boolean
   */
  public function write($sessionId, $data)
  {
    return parent::write($sessionId, $data);
  }

  /**
   * @inheritdoc
   *
   * @param  string $sessionId
   * @return boolean
   */
  public function destroy($session_id = null)
  {
    return parent::destroy($session_id);
  }

  /**
   * @inheritdoc
   *
   * @param  integer $maxlifetime
   * @return boolean
   */
  public function gc($maxlifetime)
  {
    return parent::gc($maxlifetime);
  }
}
