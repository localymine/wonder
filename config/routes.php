<?php

/**
 * 各モジュールをトラバースし、デフォルト動作のルーティングを登録する
 * /:controller/:adtion/:params/:params...
 */
$router = $di->get('router');
$router->add('/manager', [
  'namespace'  => 'General\Core\Manager\Controllers',
  'module'     => 'manager',
  'controller' => 'index',
  'action'     => 'index'
]);
$router->add('/manager/(index)?', [
  'namespace'  => 'General\Core\Manager\Controllers',
  'module'     => 'manager',
  'controller' => 'index',
  'action'     => 'index'
]);
$router->add('/', [
  'namespace'  => 'General\Core\Converter\Controllers',
  'module'     => 'converter',
  'controller' => 'index',
  'action'     => 'index'
]);
$router->add('/(index)?', [
  'namespace'  => 'General\Core\Converter\Controllers',
  'module'     => 'converter',
  'controller' => 'index',
  'action'     => 'index'
]);
foreach ($app->getModules() as $key => $module) {
  $namespace = str_replace('Module', 'Controllers', $module['className']);
  $router->add('/'.$key.'/:controller/index', [
    'namespace'  => $namespace,
    'module'     => $key,
    'controller' => 1,
    'action'     => 'index',
  ]);
  $router->add('/'.$key.'/:controller/:action/:params', [
    'namespace'  => $namespace,
    'module'     => $key,
    'controller' => 1,
    'action'     => 2,
    'params'     => 3
  ]);
}
$di->set('router', $router);