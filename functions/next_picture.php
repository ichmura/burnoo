<?php include("include/config.php"); 
$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id > '".$_GET['id']."' AND user_id = '".$_GET['user']."' ORDER BY id ASC LIMIT 1 ");
$pictures = mysqli_fetch_array($fetch_pictures);

$fetch_pictures_next = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id > '".$pictures['id']."' AND user_id = '".$_GET['user']."' ORDER BY id ASC LIMIT 1 ");
 ?>

<img class="big_img" src="<?php echo $pictures['localization']; ?>" style="pointer-events: none;" />
<div class="change_image_panel">
<div class="image-left" onclick="previous_picture('<?php echo $pictures['id']; ?>', '<?php echo $pictures['user_id']; ?>')"> <img src="images/arrow-left.png" /> </div>
<?php if (mysqli_num_rows($fetch_pictures_next) == 1){ ?>
<div class="image-right" onclick="next_picture('<?php echo $pictures['id']; ?>', '<?php echo $pictures['user_id']; ?>')"> <img src="images/arrow-right.png" /> </div>
<?php } else {?>
<div class="image-right"></div>
<?php }?>
</div>