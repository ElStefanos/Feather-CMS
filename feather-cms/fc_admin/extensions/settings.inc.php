<?php

$api= new API;

?>

<script src="./js/svg_hover_change.js"></script>
<link rel="stylesheet" href="./css/settings.css">

<div class="settings">
    <div class="header-settings">
        <h1>Settings</h1>
        <ol>
            <li id='item1' onclick="RequestPageSettings('general_s.php')" ><a id="nav1" onclick="Clicked(this.id)" href="#general"><img src='./icons/settings.svg'><p>General</p></a></li>
            <li id='item2' onclick="RequestPageSettings('security_s.php')"><a id="nav2" onclick="Clicked(this.id)" href="#security"><img src='./icons/secure.svg'><p>Security</p></a></li>
            <li id='item3' onclick="RequestPageSettings('updates_s.php')"><a id="nav3" onclick="Clicked(this.id)" href="#updates"><img src='./icons/update.svg'><p>Updates</p></a></li>
            <li id='item4' onclick="RequestPageSettings('database_s.php')"><a id="nav4" onclick="Clicked(this.id)" href="#database"><img src='./icons/database.svg'><p>Database</p></a></li>
            <li id='item5' onclick="RequestPageSettings('other_s.php')"><a id="nav5" onclick="Clicked(this.id)" href="#other"><img src='./icons/other.svg'><p>Other</p></a></li>
        </ol>
    </div>
    <div class='settings-pages'>
        <?php
            $api->Page_Loader_Admin('multi');
        ?>
    </div>
    <script src="./js/settings.js"></script>
</div>
