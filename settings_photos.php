<script>
$(document).ready(function () { 
dropzone_start(); 
});
</script>

<div type="text" class="show_notification" id="show_notification"></div>

<div id="my_dropzone" class="my_dropzone" >
Kliknij aby dodać zdjęcie lub przeciągnij je tutaj
</div>

<?php include("include/config.php"); 
$fetch_users = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['user_id']."' LIMIT 1");
$users = mysqli_fetch_array($fetch_users);
$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$users['id']."' ORDER BY id LIMIT 32");
?>

<div id="show_my_photos" class="show_my_photos">

	<?php while ($user_picture = mysqli_fetch_array($fetch_pictures)) { ?>
    <div id="picture_<?php echo $user_picture['id']; ?>" <?php if($user_picture['main'] == 1) { ?> class="my_photo_mini_l" <?php } else { ?> class="my_photo_mini" <?php } ?> onmouseover="show_picture_icons('<?php echo $user_picture['id']; ?>')" onmouseout="hide_picture_icons('<?php echo $user_picture['id']; ?>')">
    <img src="<?php echo $user_picture['localization_thumb']; ?>" class="my_photo_img" />
    </div>
    
    <div id="delete_questions_<?php echo $user_picture['id']; ?>">
 <div id="primary_<?php echo $user_picture['id']; ?>" class="primary_container" onmouseover="show_picture_icons('<?php echo $user_picture['id']; ?>')" onmouseout="hide_picture_icons('<?php echo $user_picture['id']; ?>')">
    <img class="primary_icon" src="images/primary_icon.png" title="Ustaw jako domyślne" onclick="set_default_picture('<?php echo $user_picture['id']; ?>', '<?php echo $user_picture['localization_thumb']; ?>')" />
    </div>
    
    <div id="delete_<?php echo $user_picture['id']; ?>" class="delete_container" onmouseover="show_picture_icons('<?php echo $user_picture['id']; ?>')" onmouseout="hide_picture_icons('<?php echo $user_picture['id']; ?>')">
    <img class="delete_close" src="images/delete_picture.png" onclick="show_delete_quest('<?php echo $user_picture['id']; ?>')" title="Usuń zdjęcie" />
    </div>
	
    <div id="question_d_<?php echo $user_picture['id']; ?>" class="question_b">
    <div class="question_box" onclick="delete_picture('<?php echo $user_picture['id']; ?>', '<?php echo $user_picture['localization_thumb']; ?>')"> <img class="trash_icon" src="images/trash_only.png" title="Usuń zdjęcie" /> <div class="trash_box"> Usuń zdjęcie </div> </div>
    </div>
    
    </div>
	<?php } ?>

</div>