<?php

//Seting Up

defined('_DEFVAR') or exit('Restricted Access');



if(!file_exists(__SYSTEMPATH__.'Classes/Database/Database_Info.config.php')) {
    header("Location: http://" . __DOMAIN__ . "/fc_system/Temp/Installation");
    exit();
}

//Loading

include_once __SOURCEPATH__.'/Loaders/autoloader.php';

//Testing connection

$db = new DataBase\DataBase;

$connect = $db->db_connect();

//Loading

include_once __SOURCEPATH__.'/API_PHP/fc_api_1.0a.php';

include_once __SOURCEPATH__.'/Definers/Plugin_definers.php';

include_once __SOURCEPATH__.'/SETTINGS/settings.php';

$api = new API;

?>