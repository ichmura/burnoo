<?php include("languages/select_language.php"); ?> 
<?php include("include/config.php"); 
$fetch_user = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['user_id']."' LIMIT 1");
$user_info = mysqli_fetch_array($fetch_user);
?>

<script src="js/md5.min.js"></script>

<script>

function settings_change() {

document.getElementById('save_button').style.visibility = 'visible';

	
}

function save_settings_pass() {
	
	let user_id = <?php echo $user_info['id']; ?>;
	let user_password = '<?php echo $user_info['password']; ?>';
	let d_password_act = $('#my_password_act').val();
	let d_password_new = $('#my_password_new').val();
	let d_password_new_r = $('#my_password_new_r').val();
	
	if (d_password_new.length < 6) { 
	
	$("#notification").html('Nowe hasło musi mieć minimum 6 znaków');
	
	} else if (d_password_new != d_password_new_r) { 
	
	$("#notification").html('Nowe hasła się różnią');
	
	} else if (user_password != md5(d_password_act)) { 
	
	$("#notification").html('Aktualne hasło jest nieprawidłowe');
	
	} else if (d_password_act == d_password_new) { 
	
	$("#notification").html('Aktualne hasło jest takie samo jak nowe hasło');
	
	} else {
		
		$("#notification").html('');
	
  $.ajax({
  url: "functions/save_settings_password.php",
  async: false,
  data: {user_id: user_id, d_password_act:d_password_act, d_password_new:d_password_new },
  success: function(result){
	  $( "#notification" ).html( result );
	  
	  document.getElementById('save_button').remove();
  }
  });
	

		
		
	}
}

</script>


<div>

<div class="pass_input_txt">
<div > Zmiana Twojego hasła dostępu do Burnoo: </div> 
</div>

<div class="data_input_main">
<div class="pass_input_left"> Wpisz aktualne hasło </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" id="my_password_act" class="data_input_text" type="password" value="" /> </div>
</div>

<div class="data_input_main">
<div class="pass_input_left"> Wpisz nowe Hasło </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" id="my_password_new" class="data_input_text" type="password" placeholder="Minimum 6 znaków" autocomplete="new-password" value="" /> </div>
</div>

<div class="data_input_main">
<div class="pass_input_left"> Wpisz ponownie nowe Hasło </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" id="my_password_new_r" class="data_input_text" type="password" placeholder="Minimum 6 znaków" autocomplete="new-password" value="" /> </div>
</div>


<div class="data_input_main">
<div class="pass_input_left"> </div> 
<div class="pass_input_right"> <input onfocus="settings_change()" class="save_button" id="save_button" type="submit" onclick="save_settings_pass()" value="<?php echo $lang['save'] ?>" /> </div>
</div>

</div>

<div id="notification" class="settings_notifications"> </div>
