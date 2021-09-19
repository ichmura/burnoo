<?php
$fetch_user = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE email = '".$_COOKIE['session_email']."' LIMIT 1");
$user_info = mysqli_fetch_array($fetch_user); 

$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."' AND main = '1' LIMIT 1");
?>

<header>
    <nav class="logo_nav">
        <img class="logo_img" src="/images/logo_white.png" onclick="goHome()"/>
      
<?php if ( $_COOKIE['session_logged_in'] == 'true' ) { ?>
<div id="default_picture" class="image_and_name">
<?php if(mysqli_num_rows($fetch_pictures) == 0) { ?>
<img class="no_image" id="main_thumb_header" src="/images/no_image.png">
<?php } else { $user_picture = mysqli_fetch_array($fetch_pictures);  ?> 
<img class="main_user_image" id="main_thumb_header" src="/<?php echo $user_picture['localization_thumb']; ?>"> 
<?php } ?>
<div>
<a class="button_logout" href="/index.php?do=logout"> <img title="Wyloguj" class="logout_image" src="/images/logout.png"> </a>
</div>
</div>
<?php } ?>

        
    </nav>
</header>
