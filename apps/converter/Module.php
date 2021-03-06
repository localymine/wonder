<?php

namespace General\Core\Converter;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Security;
use Phalcon\Flash\Session as Flash;
use Phalcon\Version;
use General\Core\Session\Database as SessDbAdapter;

/**
 * モジュール固有の設定を行い、アプリケーションに登録する
 * @package General\Core\Converter
 */
class Module implements ModuleDefinitionInterface
{
  /**
   * autoloaderからモジュール固有のライブラリを読み込む
   * @param DiInterface $di
   */
  public function registerAutoloaders(DiInterface $di = null)
  {
    $loader = new Loader();
    // 名前空間を検索するディレクトリ
    $loader->registerNamespaces(array(
      'General\Core\Converter\Controllers' => __DIR__.'/controllers/',
      'General\Core\Converter\Models'      => __DIR__.'/models/',
      'General\Core\Converter\Components'  => __DIR__.'/libraries/',
    ));
    // モジュール固有ライブラリ
    $loader->registerDirs(array(
      __DIR__.'/libraries/',
    ));
    $loader->register();
  }

  /**
   * モジュール固有の依存注入
   * @param DiInterface $di
   */
  public function registerServices(DiInterface $di)
  {
    // モジュール固有のconfigurationを読み込む
    $config = include __DIR__.'/config/config.php';
    $config->merge($di->get('config'));
    $di->set('config', $config);

    // viewsの設定
    $view = $di->get('view');
    $view->setViewsDir(__DIR__.'/views/');

    /**
     * Sessionサービスの開始
     *
     * @return \Phalcon\Session\Adapter\Database
     */
    $db = $di->get('db');
    $di->set('session', function () use ($db, $config) {
      $cfg = $config->session->converter->toArray();
      $cfg = array_merge($cfg, [
        'db'    => $db,
        'table' => 'sessions',
        'column_session_id'  => 'session_id',
        'column_data'        => 'data',
        'column_created_at'  => 'created',
        'column_modified_at' => 'updated',
      ]);
      $session = new SessDbAdapter($cfg);
      $session->start();
      return $session;
    });

    /**
     * Session FlashにTwitter Bootstrapを利用する
     * @return \Phalcon\Flash\Session Flash
     */
    $di->set('flash', function () {
      $flash = new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
      ]);
      $major = Version::getPart(Version::VERSION_MAJOR);
      if ($major >= 3) {
        $flash->setAutoescape(false);
      }
      return $flash;
    });

    /**
     * ユーザ認証ライブラリ
     *
     * ユーザ認証・セッション管理を統一のインタフェイスで管理する。
     *
     * @return \Coolrevo\Smc\Manager\Components\Auth AuthManager
     */
//    $di->set('auth', function() {
//      return new AuthManager();
//    });

    /**
     * アクセスコントロールリスト(ACL)
     *
     * ACLによりユーザ権限とアクセス可能なパスを統一のインタフェイスで管理する。
     *
     * @return \Coolrevo\Smc\Manager\Components\Acl AclManager
     */
//    $di->set('acl', function() {
//      return new AclManager();
//    });

    /**
     * UI出力用ライブラリ
     *
     * コントローラ・アクションに応じたナビゲーションを出力する
     *
     * @return \General\Core\Manager\Components\UiUtil
     */
    $di->set('nav', function() {
      return new UiUtil();
    });

    /**
     * 集計用ライブラリ
     *
     * @return \Coolrevo\Smc\Manager\Components\Calculator
     */
//    $di->set('calculator', function() {
//      return new Calculator();
//    });

    /**
     * Securityコンポーネントの設定
     */
//    $di->set('security', function () {
//      $security = new Security();
//      $security->setWorkFactor(12);
//      return $security;
//    });

  }

}
