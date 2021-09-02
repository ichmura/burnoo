<?php include("include/config.php"); 


	## USER LOGGED IN
	
	if ( $_COOKIE['session_logged_in'] == 'true' ) {
	
	$fetch_user = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['session_id']."' AND email = '".$_COOKIE['session_email']."' AND user_status != '0'");
	
	if ( mysqli_num_rows($fetch_user) == 0 ) { $session_logged = 'false'; } else { 
	
	$user_info = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['session_id']."' AND email = '".$_COOKIE['session_email']."' AND user_status != '0'");
	
	$session_logged = 'true'; }	
	
	} else {
	
	$session_logged = 'false';
	
	}
	
		
	
	## USER LOGOUT
	
	function logout() {
	
	setcookie('session_logged_in', '', time()-14400,'/');
	setcookie('session_email', '', time()-14400,'/');
	setcookie('user_id', '', time()-14400,'/');
	setcookie('session_id', '',time()-14400,'/');

	header('Location: index.php');
	
	}



 	function user_login() {
		
	include("include/config.php"); 
 
	$fetch_user = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE email = '".$_POST['email']."' AND password = '".md5($_POST['password'])."' LIMIT 1");

	if (mysqli_num_rows($fetch_user) == 0) {
 
	 return 'Błędny e-mail lub hasło';
 
	} else {
		
	 $user_login_info = mysqli_fetch_array($fetch_user);
 
	 setcookie('session_logged_in', 'true', time()+7200, '/');
	 setcookie('session_email', $user_login_info['email'], time()+7200, '/');
	 setcookie('user_id', $user_login_info['id'], time()+7200, '/');
	 setcookie('session_id', $user_login_info['id'], time()+7200, '/');
 
	 mysqli_query($conn, "UPDATE burnoo_users SET user_login_time = '".time()."', user_timeout = '".time()."' WHERE email = '".$_POST['email']."' LIMIT 1");
 
	 header('Location: home.php');
 
 	}
 	} ?>