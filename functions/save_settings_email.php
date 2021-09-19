<?php include("include/config.php");

	$email_exists = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE email = '".$_GET['d_email_new']."'");
	
	 if (mysqli_num_rows($email_exists) != '0') {
 
 		echo 'wpisany email jest przypisany do innego konta'; 
		
	 } else {
	
	 mysqli_query($conn,"UPDATE burnoo_users SET email = '".$_GET['d_email_new']."' WHERE id = '".$_GET['user_id']."'"); 
	 
	 echo 'Adres email został zmieniony';
	 
	 }
	
?>