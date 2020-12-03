<?php
$time_start = microtime(true);
defined('_DEFVAR') or exit('Restricted Access');

define('__ROOT__', dirname(__FILE__));

define('__SYSTEMPATH__', __ROOT__.'/fc_system/');

define('__SOURCEPATH__', __ROOT__.'/fc_system/source');

define('__ASSETPATH__', __ROOT__.'/Assets/');

define('__PLUGINPATH__', __ASSETPATH__.'/Plugins/');

define('__THEMESPATH__', __ASSETPATH__.'/Themes/');

define('__SETTINGS__', __SYSTEMPATH__.'settings/');

define('__DOMAIN__', $_SERVER['HTTP_HOST']);

define('__CLIENTIP__', $_SERVER['REMOTE_ADDR']);

include_once __SOURCEPATH__.'/main_system.php';

include __SOURCEPATH__.'/Loaders/themeloader.php';

$time_end = microtime(true);

$ex_time = ($time_end - $time_start)/60;

?>