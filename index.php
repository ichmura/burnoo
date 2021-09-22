<?php include("languages/select_language.php"); 
include("functions/login_functions.php");	 
if (isset($_POST['login'])) { $return_message = user_login(); }
if ($session_logged == 'true') { header ('Location: home.php'); }
if ($_GET['do'] == 'logout' ) { logout(); }
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="main.js"></script>
    <script src="js/signup.js"></script>
    <link rel="icon" href="images/b_icon.png">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/index.css" rel="stylesheet" type="text/css">
    <title>Burnoo | Nowe znajomości, randki, przyjaźń chat </title>
</head>
<body>

<?php include("header.php"); ?>

<div class="main-screen">
    <main class="main-box">

    
        <section class="leftSection">
            
            <div class="loginForm">
                <p class="login_text_long">Zaloguj się na burnoo:</p>
				<form name="login" method="POST">
                <p class="login_text"> e-mail: </p>
                <div> <input class="input_email" name="email" type="text"> </div>
                <p class="password_text"> hasło: </p>
                <div> <input class="input_password" name="password" type="password"> </div>
                <input class="loginButton" type="submit" name="login" value="<?php echo $lang['login'] ?>" />
                <p> Nie pamiętasz hasła ? </p>
                </form>
                <p class="r_login_message"> <?php echo $return_message;?> </p>
            </div>

        
        </section>

        <section class="rightSection" id="rightSection">
         <div class="signup_form">

              <p class="signupText"> <?php echo $lang['signupText']; ?> </p>
            
            <div class="selectGenderBox">
              <p> Wybież płeć: </p>
                <div> <button class="buttonMan" onClick="signup_step1('man')"> <img class="man_logo" src="images/man_logo.png"> <?php echo $lang['buttonMan'] ?> </button> </div>
                <div> <button class="buttonWoman" onClick="signup_step1('woman')"> <img class="woman_logo" src="images/woman_logo.png"> <?php echo $lang['buttonWoman'] ?> </button> </div>

            </div>
         </div>
        </section>

    </main>

</div>

<?php include("footer.php"); ?>
    
    
</body>
</html>