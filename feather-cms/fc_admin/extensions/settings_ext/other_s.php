<?php
define('_DEFVAR', 1);
include_once '../../../file_system.php';
include '../../Events/security_check.php';
$api = new API;

$api->Page_Loader_Admin('multi');

use Settings\Settings;

foreach($other_settings as $item) {
    $item = ${$item}->LoadOther();
    echo $item;
}
?>
    
