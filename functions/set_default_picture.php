	<?php include("include/config.php"); 
	
	mysqli_query($conn,"UPDATE burnoo_pictures SET main = '0' WHERE user_id = '".$_COOKIE['user_id']."' AND main = '1'"); 
	
	$sql = "UPDATE burnoo_pictures SET main = '1' WHERE user_id = '".$_COOKIE['user_id']."' AND id = '".$_GET['picture_id']."'"; 

	if (mysqli_query($conn, $sql)) { 
	
	$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."' AND main = '1' LIMIT 1");
	$user_picture = mysqli_fetch_array($fetch_pictures);
	?> Miniaturka została zmieniona <?php } ?>