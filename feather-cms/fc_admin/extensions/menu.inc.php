<?php

use AdminUsers\AdminUsers;
    $admin = new AdminUsers;

    $userinfo = $admin->Get_User_Info();
    
?>
<div id='menu'>
    <div id='hamburger'>
        <span id="toggle"></span>
    </div>
    <div class='header'>
        <div class="info">
            <?php echo 'Welcome ' . $userinfo['username']; ?>
        </div>
    </div>
    <ol>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './extensions', 'preview.inc.php');?>">Preview</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './extensions', 'themes.inc.php');?>">Themes</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './extensions', 'plugins.inc.php');?>">Plugins</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './extensions', 'install.inc.php');?>">Install Package</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('multi', './extensions', 'settings.inc.php', './extensions/settings_ext/', 'general_s.php');?>">Settings</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './extensions', 'dbm.inc.php');?>">DataBase Manager</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './extensions', 'accountm.inc.php'); ?>">Account Manager</a></li>
        <li class="item"><a href="<?php echo $api->Page_Path_Set('this', './events', 'logout.php'); ?>">LogOut</a></li>
    </ol>
</div>
<script src="./js/menu.js"></script>