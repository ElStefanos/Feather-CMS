<?php

    $caller = new Settings\Settings;

    $setting = $caller->ReadSettings();

    $online = $setting['ONLINE_MODE'];

    $whitelist = $setting['WHITELIST'];

    $enable_plugins = $setting['ENABLE_PLUGINS'];

    $allow_third_party = $setting['ALLOW_TP_PACKAGE'];

    $limit_admin_acc = $setting['LIMIT_NUM_ADMIN_ACCOUNTS'];
    $limit_root_acc = $setting['LIMIT_NUM_ROOT_ACCOUNTS'];
    $limit_mod_acc = $setting['LIMIT_NUM_MOD_ACCOUNTS'];

    $enable_logs = $setting['ENABLE_LOGS'];

    $require_login = $setting['REQ_VISITOR_LOGIN'];

        //Apply settings
    //Check for online state
    switch ($online['state']) {

        case 'FALSE':

            $location = $_SERVER['PHP_SELF'];

            $path = explode('/', $location);


            if(!in_array('offline.php', $path)) {

                header("Location: http://".__DOMAIN__."/offline.php");

                exit();
            }

            $api->PushToDebuger('debuger_warnings', 'Warning: Online mode is set to false');
            $api->PushToDebuger('debuger_settings', 'Online Mode: FALSE');

            exit();
            
        break;
        
        
        default:
        
            $api->PushToDebuger('debuger_settings', 'Online Mode: TRUE');
            
        break;

    }

    //Enable plugins

    switch ($enable_plugins['state']) {

        case 'FALSE':

            $api->PushToDebuger('debuger_warnings', 'Warning: Plugins are disabled');
            $api->PushToDebuger('debuger_settings', 'Plugins: FALSE');

        break;
        
        
        default:
        
            include_once __SOURCEPATH__.'/Loaders/plugin_loader.inc.php';

            $api->PushToDebuger('debuger_settings', 'Plugins: TRUE');
            
        break;

    }

    //Whitelist

    switch ($whitelist['state']) {
        case 'TRUE':
            
            $api->PushToDebuger('debuger_warnings', 'Warning: Whitelist is set to TRUE');
            $api->PushToDebuger('debuger_settings', 'Whitelist: TRUE');

            break;
        
        default:
            
            $api->PushToDebuger('debuger_settings', 'Whitelist: FALSE');

            break;
    }

    //Require login

    switch ($require_login['state']) {
        case 'TRUE':
            
            $api->PushToDebuger('debuger_warnings', 'Warning: Visitor Login is set to TRUE');
            $api->PushToDebuger('debuger_settings', 'Whitelist: TRUE');

            break;
        
        default:
            
            $api->PushToDebuger('debuger_settings', 'Visitor Login: FALSE');

            break;
    }

    //Enable logs

    switch ($enable_logs['state']) {
        case 'TRUE':
            
            $api->PushToDebuger('debuger_settings', 'Enable Logs: TRUE => '. $enable_logs['additional_value']);
            
        break;
        
        default:
        
            $api->PushToDebuger('debuger_warnings', 'Warning: Logs are set to false');
            $api->PushToDebuger('debuger_settings', 'Logs: FALSE');

            break;
    }

    //Allow TP packages

    switch ($allow_third_party['state']) {
        case 'TRUE':
            
            $api->PushToDebuger('debuger_settings', 'Third party packages: TRUE');
            $api->PushToDebuger('debuger_warnings', 'Warning: Third-party packages are allowed');
            
        break;
        
        default:

            $api->PushToDebuger('debuger_settings', 'Third party packages: FALSE');

        break;
    }


?>
