	<?php include("include/config.php"); 
	
	
	 mysqli_query($conn,"UPDATE burnoo_users SET 
	 name = '".$_GET['d_name']."', 
	 birth_day = '".$_GET['d_day']."',
	 birth_month = '".$_GET['d_month']."',
	 birth_year = '".$_GET['d_year']."',
	 gender = '".$_GET['d_gender']."',
	 email = '".$_GET['d_email']."',
	 phone_number = '".$_GET['d_phone']."'
	 WHERE id = '".$_GET['user_id']."'"); 
	
?>