	<?php 
	include("include/config.php"); 
	include("languages/select_language.php"); 
	
	$activate_number = $_GET['confirm'];
	
	if (strlen($activate_number) == 32) {
	
	if (mysqli_query($conn,"UPDATE burnoo_users SET account_activated = '1' WHERE activate_number = '".$activate_number."' AND email = '".$_GET['email']."'")) {
		
	?>
    
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <?php include("/languages/select_language.php"); ?> 
    <link rel="icon" href="/images/b_icon.png">
    <link rel="stylesheet" href="/css/dropzone.css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/home.css" rel="stylesheet" type="text/css">

    <title> Burnoo | Nowe znajomości, randki, przyjaźń chat </title>
</head>
<body>

<?php include("/header.php"); ?>

<div class="main-screen">

<main id="show_main" class="main-box">

<div class="acc_activate_box">
Twoje konto jest już aktywne 
<?php if ( $_COOKIE['session_logged_in'] != 'true' ) { ?> <a class="acc_activate_link" href="/index.php"> Zaloguj się </a> <? } ?>
</div>

</main>

</div>
    
<?php include("footer.php"); ?>

</body>
</html>

    
    
<?php } } ?>