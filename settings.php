<?php include("languages/select_language.php"); ?> 

<section class="main-section">


<h1> Ustawienia </h1>

<nav class="settings_navigate">
<div class="settings_head_name"><input class="nav_settings_button_active" onclick="nav_settings_click('settings_data')" type="submit" id="settings_data" value="<?php echo $lang['your_data']; ?>" /></div>
<div class="settings_head_name"><input class="nav_settings_button_grey" onclick="nav_settings_click('settings_photos')" type="submit" id="settings_photos" value="<?php echo $lang['your_pictures']; ?>" /></div>
<div class="settings_head_name"><input class="nav_settings_button_grey" onclick="nav_settings_click('settings_privacy')" type="submit" id="settings_privacy" value="<?php echo $lang['your_private']; ?>" /></div>
<div class="settings_head_name"><input class="nav_settings_button_grey" onclick="nav_settings_click('settings_notifications')" type="submit" id="settings_notifications" value="<?php echo $lang['your_notifications']; ?>" /></div>
</nav>

<div class="settings_center">
<div class="show_settings" id="show_settings">

</div>
</div>



</section>