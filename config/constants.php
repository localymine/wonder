<?php

/**
 * アプリケーションワイドな定数を登録する
 */

/**
 * Global debug
 */
define('DEBUG_LEVEL', 0);

/**
 * Application Name
 */
define('SKR_APPNAME', 'INVENTORY MANAGEMENT');

/**
 * Application Version
 */
define('SKR_APPVERSION', '1.0.0');

/**
 * Directory Separator
 */
define('DS', '/');

/**
 * ROOT Directory
 */
define('SKR_ROOT', realpath(dirname(__DIR__)));

/**
 * Application Directory
 */
define('SKR_APP_DIR', SKR_ROOT.DS.'apps');

/**
 * Commandline App Directory
 */
define('SKR_CLI_DIR', SKR_ROOT.DS.'cli');

/**
 * App-wide Configuration Directory
 */
define('SKR_CONFIG_DIR', SKR_ROOT.DS.'config');

/**
 * App-wide I18N Library Directory
 */
define('SKR_I18N_DIR', SKR_ROOT.DS.'lang');

/**
 * App-wide Extension/plugin Directory
 */
define('SKR_LIB_DIR', SKR_ROOT.DS.'library');

/**
 * App-wide External Library Directory
 */
define('SKR_VENDORS_DIR', SKR_ROOT.DS.'vendors');

/**
 * Frontend contents cache time
 * default 5 days (60*60*24*5) = 432000
 */
define('SKR_CACHE_DIFF', 432000);

/**
 * Servicer/Manager app session lifetime
 * default 60 minutes (60*60) = 3600
 */
define('SKR_SYS_SESSLIFETIME', 3600);


/**
 * Contents cache directory
 */
define('SKR_CACHE_DIR', SKR_ROOT.DS.'var/cache');

/**
 * Template compile directory
 */
define('SKR_CCACHE_DIR', SKR_ROOT.DS.'var/ccache');

/**
 * Application log directory
 */
define('SKR_LOG_DIR', SKR_ROOT.DS.'var/log');

/**
 * Application temporaly directory
 */
define('SKR_TMP_DIR', SKR_ROOT.DS.'var/tmp');

/**
 * Application Download target directory
 */
define('SKR_DOWNLOAD_DIR', SKR_ROOT.DS.'var/downloads');

/**
 * Application Upload target directory
 */
define('SKR_UPLOAD_DIR', SKR_ROOT.DS.'var/uploads');

/**
 * Application Upload target directory
 */
define('SKR_UPLOAD_RAW_IMG', SKR_ROOT.DS.'public/uploads');
define('SKR_UPLOAD_IMG', 'uploads');

/**
 * Application default images
 */
define('SKR_DEFAULT_LOGIN_IMG',  SKR_DOWNLOAD_DIR.DS.'login.png');
define('SKR_DEFAULT_VIEWER_IMG', SKR_DOWNLOAD_DIR.DS.'blank.jpg');
define('SKR_DEFAULT_NO_IMG', SKR_UPLOAD_IMG.DS.'no-image.png');

/**
 * Contents cache directory
 * @deprecated
 */
define('SKR_XMLDB_DIR', SKR_ROOT.DS.'var/db');