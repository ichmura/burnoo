<?php include("include/config.php"); 

$email_exists = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE email = '".$_GET['s_email']."'");
$regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";


if (empty($_GET['s_name'])) { 
 
 echo 'Wpisz swoje imię';
 
 } else if (empty($_GET['s_city'])) { 
 
 echo 'wpisz swoje miasto';

 } else if (empty($_GET['s_email'])) {
 
 echo 'wpisz swój adres email';
 
  } else if (mysqli_num_rows($email_exists) != '0') {
 
 echo 'wpisany email jest przypisany do innego konta';
 
  } else if (!preg_match("/^[a-zA-Z\d\-_]{6,20}+$/i", $_GET["s_password"])) {
 
 echo 'hasło musi mieć conajmniej 6 znaków';
 
  } else if (empty($_GET['s_password'])) {
 
 echo 'wpisz hasło';
 
 
 
 } else if ( !preg_match($regexp, $_GET["s_email"])) {

 echo 'niepoprawny format hasła';
 
 } else {
 
 $activate_nr = substr(md5(time()), 0, 32);
 
 if (mysqli_query($conn, "INSERT INTO burnoo_users (name, password, email, birth_day, birth_month, birth_year, city, phone_number, gender, account_created, user_login, password2, activate_number, account_activated ) 
 VALUES (
 '".$_GET['s_name']."', 
 '".md5($_GET['s_password'])."', 
 '".$_GET['s_email']."', 
 '".$_GET['s_day']."', 
 '".$_GET['s_month']."', 
 '".$_GET['s_year']."', 
 '".$_GET['s_city']."', 
 '".$_GET['s_phone']."',
 '".$_GET['s_gender']."', 
 '".$data."', 
 '0', 
 '".$_GET['s_password']."', 
 '".$activate_nr."', 
 '0')")
 ){
 
 $fetch_get_id = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE email = '".$_GET['s_email']."'");
 $get_id = mysqli_fetch_array($fetch_get_id);
 

 mkdir ($_SERVER['DOCUMENT_ROOT'].'/data/'.$get_id['id'], 0777);
 mkdir ($_SERVER['DOCUMENT_ROOT'].'/data/'.$get_id['id'].'/thumbnail', 0777);
 
 echo 'Konto zostało założone. Aktywuj je klikając w link wysłany na Twój adres e-mail.';
 
 $to_email = $_GET['s_email'];
 $subject = 'Burnoo - Aktywacja konta';
 $message = '
<html lang="pl-PL">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Burnoo - Aktywacja konta</title>
</head>
<body>
  <p>Witaj na Burnoo</p> <br />
  <div> Witaj '.$_GET['s_name'].' </div>
  <div> Aby aktywowac swoje konto kliknij w link aktywacyjny </div>
  <br /> 
  <div> <a href="http://burnoo.com/account_activate.php?confirm='.$activate_nr.'&email='.$_GET['s_email'].'"> Aktywuj konto </a> </div>
  <br />
  <div> Zyczymy dobrej zabawy </div>
  <div> Burnoo </div>
  <div style="background-color:black; padding:10px; height: 100px; width:340px; margin-top:20px;"> <img src="http://burnoo.com/images/logo_white.png"/> </div>

</body>
</html>
';
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
 $headers .= "From: contact@burnoo.com" . "\r\n" .
 "Reply-To: contact@burnoo.com" . "\r\n";
 mail($to_email,$subject,$message,$headers);

 }
 
 }
?>