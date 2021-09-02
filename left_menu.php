<aside class="left-menu">




<div id="default_picture" class="image_and_name">
<?php if(mysqli_num_rows($fetch_pictures) == 0) { ?>
<img class="no_image" id="click_photos" src="images/no_image.png">
<?php } else { $user_picture = mysqli_fetch_array($fetch_pictures);  ?> 
<img class="main_user_image" id="click_photos" src="<?php echo $user_picture['localization_thumb']; ?>"> 
<?php } ?>
</div>

<div class="show_name"> <a id="click_profile"><?php echo $user_info['name']; ?></a> <a class="button_logout" href="/index.php?do=logout"> <img title="Wyloguj" class="logout_image" src="images/logout.png"> </a> </div> 




 <ul class="nav-left-menu">
    <li><a id="click_notifications" class="left-menu-button">Powiadomienia</a></li>
    <li><a id="click_messages" class="left-menu-button">Wiadomości</a></li>
    <li><a id="click_visitors" class="left-menu-button">Podglądacz</a></li>
    <li><a id="click_favourite" class="left-menu-button">Ulubione</a></li>
    <li><a id="click_settings" class="left-menu-button">Ustawienia</a></li>
  </ul>

</aside>