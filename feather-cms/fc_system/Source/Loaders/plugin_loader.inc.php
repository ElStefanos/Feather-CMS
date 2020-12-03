<?php  

    include __SOURCEPATH__.'/Definers/plugin_definers.php';
    
    if(!isset($plugins_active_paths)) {
        $plugins_active_paths = array();
    }

    if(!isset($plugin_list)) {
        $plugin_list = array();
    }

    $dirs = scandir(__PLUGINPATH__);

    unset($dirs[0], $dirs[1]);

    foreach($dirs as $dir) {

        $dir = __PLUGINPATH__ . $dir;

        foreach($files = glob("$dir/*.plugin.php") as $file) {
            
        $plugin_list[] = $file;
           
        }
    }

    foreach($plugin_list as $plugin) {

        
        include $plugin;
        
        array_push($plugins_active_paths, $plugin);
    }

    $api = new API;

    foreach ($plugins_active_paths as $plugin) {
        $api->PushToDebuger('debuger_plugins_paths', $plugin);
    }

    foreach ($plugins as $plugin_name) {
        $api->PushToDebuger('debuger_plugins_names', $plugin_name);
    }

?>
    