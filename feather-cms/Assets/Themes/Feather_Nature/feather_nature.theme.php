<?php

    use Menu\Menu;
    use DataBase\DataBase;
    
    $api = new API;
    $menu = new Menu;
    $db = new DataBase;

    include __SOURCEPATH__.'/Loaders/plugin_loader.inc.php';

    $page = $api->GetUrl('desired', 'index.php');

    switch ($page) {
        case TRUE:
                include __THEMESPATH__.'/Feather_Nature/Pages/homepage.php';
            break;

        default:
            include __THEMESPATH__.'/Feather_Nature/Pages/page.php';
            break;
    }

?>