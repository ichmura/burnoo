<?php include("languages/select_language.php"); ?> 
<?php include("include/config.php"); 
$fetch_user = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['user_id']."' LIMIT 1");
$user_info = mysqli_fetch_array($fetch_user);
?>

<script src="js/md5.min.js"></script>

<script language= "JavaScript" type= "text/javascript">

function settings_change() {

document.getElementById('save_button').style.visibility = 'visible';

}

let user_email = '<?php echo $user_info['email']; ?>';

function save_settings_email() {

	let user_id = <?php echo $user_info['id']; ?>;
	let user_password = '<?php echo $user_info['password']; ?>';
	let d_password_act = $('#my_password_act').val();
	let d_email_new = $('#my_email_new').val();
	let re = /^[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*@([a-zA-Z0-9_-]+)(\.[a-zA-Z0-9_-]+)*(\.[a-zA-Z]{2,4})$/i;
	
	if (user_password != md5(d_password_act)) { 
	
	$("#notification").html('Wpisane hasło jest nieprawidłowe');
	
	} else if (d_email_new === '') { 
	
	$("#notification").html('Wpisz nowy adres email');
	
	} else if (d_email_new == user_email) { 
	
	$("#notification").html('Wpisany adres email jest taki sam jak obecny');
	
	} else if (d_email_new.match(re) == null) {
	
    $("#notification").html('Wpisany adres email jest nieprawidłowy');

	} else {
		
		$("#notification").html('');
	
  $.ajax({
  url: "functions/save_settings_email.php",
  async: false,
  data: {user_id: user_id, d_email_new:d_email_new },
  success: function(result){
	  $( "#notification" ).html( result );
	  
	  document.getElementById('save_button').remove();
  }
  });
	

		
		
	}
}

</script>


<div id="email_change_box">

<div class="pass_input_txt">
<div > Zmiana Twojego adresu email na Burnoo: </div> 
</div>

<div class="data_input_main">
<div class="pass_input_left"> Wpisz swoje hasło </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" id="my_password_act" class="data_input_text" type="password"  placeholder="Wpisz aktualne hasło" value="" /> </div>
</div>

<div class="data_input_main">
<div class="pass_input_left"> Twój adres email </div> 
<div class="pass_input_right"> <?php echo $user_info['email']; ?> </div>
</div>

<div class="data_input_main">
<div class="pass_input_left"> Wpisz nowy adres email </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" id="my_email_new" class="data_input_text" type="text" value="" /> </div>
</div>

<div class="data_input_main">
<div class="pass_input_left"> </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" class="save_button" id="save_button" type="submit" onclick="save_settings_email()" value="<?php echo $lang['save'] ?>" /> </div>
</div>

</div>

<div id="notification" class="settings_notifications"> </div>
