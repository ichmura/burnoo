<?php include("include/config.php"); 
$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id < '".$_GET['id']."' AND user_id = '".$_GET['user']."' ORDER BY id DESC LIMIT 1 ");
$pictures = mysqli_fetch_array($fetch_pictures);

$fetch_pictures_previous = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id < '".$pictures['id']."' AND user_id = '".$_GET['user']."' ORDER BY id DESC LIMIT 1 ");
?>

<img class="big_img" src="<?php echo $pictures['localization']; ?>" style="pointer-events: none;" />
<div class="change_image_panel">
<?php if (mysqli_num_rows($fetch_pictures_previous) == 1){ ?>
<div class="image-left" onclick="previous_picture('<?php echo $pictures['id']; ?>', '<?php echo $pictures['user_id']; ?>')"> <img src="images/arrow-left.png" /> </div>
<?php } else { ?>
<div class="image-left"></div>
<?php } ?>
<div class="image-right" onclick="next_picture('<?php echo $pictures['id']; ?>', '<?php echo $pictures['user_id']; ?>')"> <img src="images/arrow-right.png" /> </div>
</div>