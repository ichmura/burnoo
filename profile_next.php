<?php include("include/config.php"); 
$fetch_users = mysqli_query($conn, "SELECT * FROM burnoo_users ORDER BY RAND() LIMIT 1");
$users = mysqli_fetch_array($fetch_users);
$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$users['id']."' AND main = '1' LIMIT 1 ");
$pictures = mysqli_fetch_array($fetch_pictures);
$pictures_number = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."'"));
$result = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."' ORDER BY date ASC");
$fetch_pictures_previous = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id < '".$pictures['id']."' AND user_id = '".$pictures['user_id']."' ORDER BY id DESC LIMIT 1 ");
$fetch_pictures_next = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id > '".$pictures['id']."' AND user_id = '".$pictures['user_id']."' ORDER BY id ASC LIMIT 1 ");

function getAge($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
}
?>



<div class="picture_background">

<div id="user_big_picture_<?php echo $pictures['user_id']; ?>">

<img class="big_img" id="big_img" src="<?php echo $pictures['localization']; ?>" style="pointer-events: none;" />


<div class="change_image_panel">
<?php if (mysqli_num_rows($fetch_pictures_previous) == 1){ ?>
<div class="image-left" onclick="previous_picture('<?php echo $pictures['id']; ?>', '<?php echo $pictures['user_id']; ?>')"> <img src="images/arrow-left.png" /> </div>
<?php } else { ?>
<div class="image-left"> </div>
<?php } ?>
<?php if (mysqli_num_rows($fetch_pictures_next) == 1){ ?>
<div class="image-right" onclick="next_picture('<?php echo $pictures['id']; ?>', '<?php echo $pictures['user_id']; ?>')"> <img src="images/arrow-right.png" /> </div>
<?php } else { ?>
<div class="image-right"> </div>
<?php } ?>
</div>
</div>
<div class="choise_panel"> 
<div class="top_panel_name">
<div> <?php echo $users['name']; ?>, <?php echo getAge($users['birth_year'].'-'.$users['birth_month'].'-'.$users['birth_day']); ?> </div>
<div class="press_profile_info" onclick="profile_info('<?php echo $users['id']; ?>')"> <img class="profile_info_image" src="images/profile_info.png" /> </div>
</div>

<div class="choise_images">
<div class="press_profile_back"> <img class="profile_back_image" id="press_back" src="images/profile_back.png" /> </div>
<div class="press_x"> <img class="no_heart_image" id="press_noheart" src="images/no_heart.png" /> </div>
<div class="press_profile_fire"> <img class="profile_fire" id="press_fire" src="images/profile_fire.png" /> </div>
<div class="press_heart"> <img class="heart_image" id="press_heart" src="images/heart.png" /> </div>
</div>
</div>
</div>
