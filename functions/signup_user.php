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
 
 $link_aktywacji = rand('10000000', '99999999');
 
 sql_query("INSERT INTO burnoo_users (username, name, surname, password, email, birth_day, birth_month, birth_year, gender, user_created, first_login, password2, activated_number, account_activated ) 
 VALUES (
 '".$_GET['username']."', 
 '".$_GET['imie']."', 
 '".$_GET['nazwisko']."', 
 '".md5($_GET['password'])."', 
 '".$_GET['email']."', 
 '".$_GET['birth_day']."', 
 '".$_GET['birth_month']."', 
 '".$_GET['birth_year']."', 
 '".$_GET['gender']."', 
 '".$data."', 
 'no', 
 '".$_GET['password']."', 
 '".$link_aktywacji."', '1')");

// mkdir ($_SERVER['DOCUMENT_ROOT'].'/data/'.$_GET['username'], 0777);
// mkdir ($_SERVER['DOCUMENT_ROOT'].'/data/'.$_GET['username'].'/folder_icons', 0777);
 
 }
?>