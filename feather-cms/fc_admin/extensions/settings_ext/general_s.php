<?php

$page = $_SERVER['PHP_SELF'];
$page = explode('/', $page);
$page = $page[2];
if($page !== 'home.php') {
    define('_DEFVAR', 1);
    include_once '../../../file_system.php';
    include '../../Events/security_check.php';
}

$api = new API;
$settings = new Settings\Settings;

?>

<div class='settings-items'>
    <div class='setting-title'>
        <p>Website Info</p>
    </div>
        <form enctype="multipart/formdata" id="website-info" name='website-info' class='setting-content'>
            <div class="setting-item">
                <p>Website name</p>
                <input type="text" name='web-name'>
            </div>
            <div class="setting-item">
                <p>Logo</p>
                <input type="file" id="logo" name='logo'>
                <label for="logo" id="upload">Insert</label>
            </div>
            <div class="setting-item">
                <button type="submit" name='update'>Update</button>
                <button type="submit" name='reset'>Reset to Defaults</button>
            </div>
        </form>
</div>

<div class='settings-items'>
    <div class='setting-title'>
            <p>Website Settings</p>
    </div>
        <form enctype="multipart/formdata" id="website-settings" name='website-settings' class='setting-content'>
            <div class="setting-item">
                <input type="checkbox" name="onlinemode" id="onlinemode" <?php $settings->ReadSettings_Print('ONLINE_MODE', 'checked', '');?>>
                <label class="onlinemode">Online mode</label>
            </div>
            <div class="setting-item">
                <input type="checkbox" name="whitelist" id="whitelist" <?php $settings->ReadSettings_Print('WHITELIST', 'checked', '');?>>
                <label class="whitelist">Whitelist</label>
            </div>
            <div class="setting-item">
                <input type="checkbox" name="thirdparty" id="thirdparty" <?php $settings->ReadSettings_Print('ALLOW_TP_PACKAGE', 'checked', '');?>>
                <label class="whitelist">Enable third party packages</label>
            </div>
            <div class="setting-item">
                <input type="checkbox" name="plugins" id="plugins" <?php $settings->ReadSettings_Print('ENABLE_PLUGINS', 'checked', '');?>>
                <label class="whitelist">Enable plugins</label>
            </div>
            <div class="setting-item">
                <button name='update'>Update</button>
                <button name='reset'>Reset to Defaults</button>
            </div>
        </form>
</div>

<div class='settings-items'>
    <div class='setting-title'>
            <p>Website Settings Miscellaneous</p>
    </div>
        <form enctype="multipart/formdata" id="website-settings" name='website-settings' class='setting-content'>
            <div class="setting-item">
                <input type="checkbox" name="onlinemode" id="onlinemode">
                <label class="onlinemode">Online mode</label>
            </div>
            <div class="setting-item">
                <input type="checkbox" name="whitelist" id="whitelist">
                <label class="whitelist">Whitelist</label>
            </div>
            <div class="setting-item">
                <button type="submit" name='update'>Update</button>
                <button type="submit" name='reset'>Reset to Defaults</button>
            </div>
        </form>
</div>

