<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php

            $info = $api->GetWebInfo();

            echo '<title>'.$info['web-name'].'</title>';

            $css = array(
                'menu.css',
                'section.css',
                'footer.css',
                'header.css',
                'main.css'
            );

            $js = array(
                'menu.js'
            );

            $api->CSSLoaderURL($css, 'Feather_Nature/css');
            $api->JSLoaderURL($js, 'Feather_Nature/js');
        ?>
    </head>
