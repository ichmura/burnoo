	<?php include("include/config.php"); 
	
	
	 mysqli_query($conn,"UPDATE burnoo_users SET 
	 password = '".md5($_GET['d_password_new'])."'
	 WHERE id = '".$_GET['user_id']."'"); 
	 
	 echo 'Hasło zostało poprawnie zmienione';
	
?>