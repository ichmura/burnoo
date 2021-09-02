<?php include("include/config.php"); 
mysqli_query($conn,"UPDATE burnoo_users SET looking_for = '".$_GET['gender']."' WHERE id = '".$_GET['user_id']."'"); 
?>