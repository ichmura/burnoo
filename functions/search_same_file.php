<?php include("include/config.php"); 
    
	// Search same fileName when uploading new file
	
	$fetch_picture = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."' AND name = '".$_GET['name']."' LIMIT 1");


    if(mysqli_num_rows($fetch_picture) == 0) {
		
	echo '0';

	} else { 
	
	echo '1';
	
	}?>