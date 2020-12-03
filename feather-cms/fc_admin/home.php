<?php

define('_DEFVAR', 1);
include_once '../file_system.php';
include_once 'events/security_check.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Home</title>
    <script src="../fc_system/Source/JQuery.min.js"></script>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/menu.css">
</head>
<body>

    <?php
    
        include_once 'extensions/menu.inc.php';
    ?>
    
    <div class='page'>

    <?php
        $api->Page_Loader_Admin();
    ?>

    </div>
</body>
</html>