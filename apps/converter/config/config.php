<?php
/**
 * モジュール固有のconfiguration
 */
if (!defined('DS')) {
  require_once __DIR__.'/../../../config/constants.php';
}

$config = new \Phalcon\Config(array(
  // Managerモジュールのアプリケーションレイアウト
  'application' => array(
    'controllersDir' => __DIR__.'/../controllers/',
    'librariesDir'   => __DIR__.'/../libraries/',
    'modelsDir'      => __DIR__.'/../models/',
    'viewsDir'       => __DIR__.'/../views/',
    'baseUri'        => '/manager/'
  )
));
return $config;
