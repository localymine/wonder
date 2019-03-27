<?php

/**
 * Modulesを登録する
 */
use Phalcon\Text;

if (!defined('DS')) {
  require_once __DIR__.'/constants.php';
}

$modules = [];
$capture = glob(SKR_APP_DIR.DS.'*'.DS.'Module.php');
foreach ($capture as $Module_php) {
  $module = basename(dirname($Module_php));

  $Module = Text::camelize($module);
  $modules["$module"] = [
    'className' => "General\\Core\\$Module\\Module",
    'path' => $Module_php
  ];
}

$app->registerModules($modules);
