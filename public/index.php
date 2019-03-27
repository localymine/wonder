<?php

use Phalcon\Mvc\Application;
use Phalcon\Logger\Adapter\File as FileAdapter;

// DONOT display errors
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', On);
// error_reporting(E_ALL);

(new \Phalcon\Debug)->listen();

// Application-Wideな定数を定義
include __DIR__.'/../config/constants.php';

// Garbage corrects
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 43200);

// Add include_path
ini_set('include_path', get_include_path().':'.SKR_LIB_DIR);
ini_set('include_path', get_include_path().':'.SKR_VENDORS_DIR);

$logger = new FileAdapter(SKR_LOG_DIR.DS.'exeption.log');

try {
  // configurationの読み込み
  $config = require __DIR__.'/../config/config.php';
  // autoloaderからの読み込み
  $loader = require __DIR__.'/../config/loader.php';
  $loader->register();
  // サービスの読み込み
  $di = require __DIR__.'/../config/services.php';
  // リクエスト処理のメイン
  $app = new Application();
  // Dependency Injectorをセット
  $app->setDI($di);
  // Modulesの読み込み
  require __DIR__.'/../config/modules.php';
  // Routerの読み込み
  require __DIR__.'/../config/routes.php';
  // リクエスト処理の開始
  echo $app->handle()->getContent();

} catch (Phalcon\Exception $e) {
  // アプリケーションレベルの例外処理
  $logger->error($e->getMessage());
  $logger->error($e->getTraceAsString());
  header('HTTP/1.1 500 Internal Server Error', true, 500);
} catch (\PDOException $e) {
  // ミドルウェアレベルの例外処理
  $logger->error($e->getMessage());
  $logger->error($e->getTraceAsString());
  header('HTTP/1.1 500 Internal Server Error', true, 500);
} catch(Phalcon\Application\Exception $e) {
  if(preg_match('/^Module \'(.*?)\' isn\'t registered in the application container$/', $e->getMessage(), $match)) {
    // You can get the attempted module name from the router:
    echo '<pre>', var_dump($application->router->getModuleName()), '</pre>';
    // Or the regexp match
    echo '<pre>', var_dump($match[1]), '</pre>';
    // Then handle it as you wish...
    echo $application->handle('/error/e404')->getContent();
  }
  // ...
}
