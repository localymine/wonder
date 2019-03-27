<?php

/**
 * アプリケーションで共有するautoloaders
 * @return \Phalcon\Loader $loader
 */
if (!defined('DS')) {
  require_once __DIR__.'/constants.php';
}

$loader = new \Phalcon\Loader();
$loader->registerDirs(array(
  SKR_LIB_DIR,
  SKR_VENDORS_DIR,
));
return $loader;
