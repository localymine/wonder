<?php

/**
 * アプリケーションワイドなサービスを登録する
 * @return \Phalcon\Di\FactoryDefault
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Cache\Backend\File as FileBackend;
use Phalcon\Cache\Frontend\Output as OutputFrontend;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Http\Response\Cookies;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Translate\Adapter\PeclGettext as Translator;
use General\Core\Util\Base32;
use General\Core\Util\QueryInjector;
use General\Core\Util\Enums;
use General\Core\Util\SambaSelect;
use General\Core\Util\LicenseManager;

if (!defined('DS')) {
  require_once __DIR__.'/constants.php';
}

/**
 * Dependency Injector
 */
$di = new FactoryDefault();

/**
 * グローバルなconfigを共有する
 */
$di->setShared('config', $config);

/**
 * 初期ルーティングの設定。詳細なルーティングは
 * 各モジュールのModule.phpで行う。
 *
 * @return \Phalcon\Mvc\Router
 */
$di->setShared('router', function () {
  $router = new Router();
  $router->setDefaultModule('converter');
  $router->setDefaultNamespace('General\Core\Converter\Controllers');
  return $router;
});

/**
 * Viewコンポーネントの動作設定
 *
 * テンプレートエンジンとコンパイルパスを設定し、ビュー生成可能にする。
 * 基本Voltを使うが、汎用性から通常のphpも利用可とする。
 * レキシカル変数 $config は<em>SKR_ROOT/config/config.php</em>で定義される。
 *
 * @return \Phalcon\Mvc\View
 */
$di->setShared('view', function () {
  $view = new View();
  $view->registerEngines(array(
    // Volt Template Engine
    '.volt' => function ($view, $di) {
      $volt = new VoltEngine($view, $di);
      $volt->setOptions(array(
        'compileAlways'     => true,
        'compiledPath'      => SKR_CCACHE_DIR.DS,
        'compiledSeparator' => '_'
      ));
      // add filter
      $volt->getCompiler()->addFilter('strtotime', 'strtotime');
      $volt->getCompiler()->addFilter('number_format', 'number_format');
      $volt->getCompiler()->addFunction('str_pad', 'str_pad');
      $volt->getCompiler()->addFunction('base32encode', function($resolvedParams) {
        return Base32::class.'::encode('.$resolvedParams.')';
      });
      $volt->getCompiler()->addFunction('base32decode', function($resolvedParams) {
        return Base32::class.'::decode('.$resolvedParams.')';
      });
      return $volt;
    },
    // 通常のphp view
    '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
    // CakePHPなview
    '.ctp' => 'Phalcon\Mvc\View\Engine\Php',
  ));
  return $view;
});

/**
 * キャッシュシステムの設定
 *
 * フロントエンドモジュール固有のキャッシュ方法を定義する。
 * レキシカル変数 $config は<em>SKR_ROOT/config/config.php</em>で定義される。
 *
 * @return \Phalcon\Cache\Backend\File
 */
$di->setShared('viewCache', function() use ($config) {
  $frontCache = new OutputFrontend(array(
    'lifetime' => (0 == DEBUG_LEVEL ? SKR_CACHE_DIFF : -1)
  ));
  $cache = new FileBackend($frontCache, array(
    'cacheDir' => SKR_CACHE_DIR.DS,
  ));
  return $cache;
});

/**
 * データベースの設定
 *
 * @return \Phalcon\Db\AdapterInterface
 */
$di->setShared('db', function () use ($config) {
  /** @var \Phalcon\Db\Adapter\Pdo $conn */
  $db_config = $config->database->toArray();
  $adapter = $db_config['adapter'];
  unset($db_config['adapter']);
  $class = 'Phalcon\Db\Adapter\Pdo\\'.$adapter;
  $conn = new $class($db_config);

  if (1 == DEBUG_LEVEL) {
    $eventsManager = new EventsManager();
    $logger = new FileLogger(SKR_LOG_DIR.DS.'sql.log');
    $eventsManager->attach('db', function ($event, $conn) use ($logger) {
      /** @var \Phalcon\Events\Event $event */
      if ($event->getType() == 'beforeQuery') {
        /** @var \Phalcon\Db\AdapterInterface $conn */
        $logger->log($conn->getSQLStatement(), Logger::INFO);
      }
    });
    $conn->setEventsManager($eventsManager);
  }

  return $conn;
});

/**
 * ログ専用DB
 *
 * @return \Phalcon\Db\AdapterInterface
 */
$di->setShared('logdb', function () use ($config) {
  /** @var \Phalcon\Db\Adapter\Pdo $conn */
  $db_config = $config->logdb->toArray();
  $adapter = $db_config['adapter'];
  unset($db_config['adapter']);
  $class = 'Phalcon\Db\Adapter\Pdo\\'.$adapter;
  $conn = new $class($db_config);
  return $conn;
});

/**
 * modelsMetadata
 *
 * @return \Phalcon\Mvc\Model\Metadata\Memory
 */
$di->setShared('modelsMetadata', function () {
  return new MetaDataAdapter();
});

/**
 * 暗号化を用いないクッキー
 *
 * Phalconの通常のCookieはcryptによる暗号化・復号化が必要だが
 * 数値等単純な値を一時保存する場合はこれを使用する
 *
 * @return \Phalcon\Http\Response\Cookies
 */
$di->setShared('ezcookies', function () {
  $ezcookies = new Cookies();
  $ezcookies->useEncryption(false);
  return $ezcookies;
});

/**
 * クエリ操作用モジュール
 *
 * @return \General\Core\Util\QueryInjector
 */
$di->setShared('qi', function () {
  return new QueryInjector();
});

/**
 * インタフェイスの翻訳
 *
 * gettextを使用し、accepted-languageに合わせた言語で表示する。
 *
 * @return \Phalcon\Translate\Adapter\PeclGettext Translator
 */
$di->setShared('l10n', function () {
  return new Translator(array(
    'locale'    => 'ja_JP.UTF-8',
    'file'      => 'messages',
    'directory' => SKR_ROOT.DS.'lang',
  ));
});

/**
 * Form生成時に列挙項目を呼び出す
 * @return \General\Core\Util\Enums
 */
$di->setShared('enum', function () {
  return new Enums();
});

/**
 * sambaホスト選択やユーザ作成
 * @return \Phalcon\Config|false
 */
$di->setShared('samba', function () use ($config) {
  return new SambaSelect();
});

/**
 * logger
 * @return \Phalcon\Logger\Adapter\File
 */
$di->setShared('logger', function () {
  return new FileLogger(SKR_LOG_DIR.DS.'app.log');
});

/**
 * Dispatcherにデフォルト名前空間を登録する
 * デフォルトモジュールはManager
 * @return \Phalcon\Mvc\Dispatcher
 */
$di->setShared('dispatcher', function() use ($di) {
  $dispatcher = new Phalcon\Mvc\Dispatcher();
  $dispatcher->setDefaultNamespace('General\Core\Converter\Controllers');
  return $dispatcher;
});

/**
 * ライセンス管理
 * @return LicenseManager
 */
$di->setShared('lman', function () {
  return new LicenseManager();
});

return $di;
