	<?php include("include/config.php"); 
	
	
	 mysqli_query($conn,"UPDATE burnoo_users SET 
	 description = '".$_GET['description']."'
	 WHERE id = '".$_GET['user_id']."'"); 
	
?>