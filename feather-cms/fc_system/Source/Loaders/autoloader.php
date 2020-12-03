<?php

defined('_DEFVAR') or exit('Restricted Access');

include_once __SOURCEPATH__.'/API_PHP/fc_api_1.0a.php';

$api = new API;

    function Classes_Loader($classname) {

        global $api;

        $path = __SYSTEMPATH__.'/Classes/';

        $ext = '.class.php';
    
        $full_path = $path . $classname . $ext;
        
        if(file_exists($full_path)) {
            
            include_once  $full_path;
            return true;
            
        } else {

            error_reporting(0);
            
            return false;

            echo 'Fatal';

            die($api->PushToDebuger('debuger_errors', 'Failed loading class '. $class.' with path '. $full_path));
            exit();

        }
    }

    spl_autoload_register("Classes_Loader");