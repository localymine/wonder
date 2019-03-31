<?php

/**
 * アプリケーションで共有するconfiguration
 * @return \Phalcon\Config $config
 */
if (!defined('DS')) {
  require_once __DIR__.'/constants.php';
}

$config = new \Phalcon\Config(array(
  // RDB接続の定義
  'database' => [
    'adapter'   => 'Mysql',
    'host'      => 'localhost',
    'username'  => 'root',
    'password'  => 'root',
//    'dbname'    => 'need_for_speed',
    'dbname'    => 'speed_force',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
  ],
  'logdb' => [
    'adapter'   => 'Mysql',
    'host'      => 'localhost',
    'username'  => 'root',
    'password'  => 'root',
    'dbname'    => 'need_for_speed_log',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
  ],
  // セッションの定義
  'session' => [
    'manager' => [
      'name' => 'skr_manager',
      'lifetime' => SKR_SYS_SESSLIFETIME,
      'path' => '/',
      'secure' => false,
      'httponly' => false,
    ],
    'converter' => [
      'name' => 'skr_converter',
      'lifetime' => SKR_CONVERTER_SESSLIFETIME,
      'path' => '/',
      'secure' => false,
      'httponly' => false,
    ]
  ],
  // アップロード許可ファイル
  'uploadable' => [
    'model' => 'Upload',
    'allowed_exts' => [
      'jpeg',
      'jpg',
      'png',
      'ico',
      'gif',
      'webp',
      'mp4',
      'webm',
      'dat',
      'log',
      'gz',
    ],
  ],
));

return $config;