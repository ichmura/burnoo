<?php include("languages/select_language.php"); ?> 
<?php include("include/config.php"); 
$fetch_user = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['user_id']."' LIMIT 1");
$user_info = mysqli_fetch_array($fetch_user);
?>


<script>

function settings_change() {

document.getElementById('save_button').style.visibility = 'visible';

	
}

function save_settings_data() {
	
	let user_id = <?php echo $user_info['id']; ?>;
	let d_name = $('#name').val();
	let d_day =  $('#birth_day option:selected').val();
	let d_month = $('#birth_month option:selected').val();
	let d_year = $('#birth_year option:selected').val();
	let d_gender = $('#my_gender option:selected').val();
	let d_email = $('#my_email').val();
	let d_phone = $('#my_phone_number').val();
	let d_password = $('#my_password').val();
	
	if(d_name === '') {
	
	$( "#notification" ).html('Wpisz swoje imię');
	
	} else {
	
  $.ajax({
  url: "functions/save_settings_data.php",
  async: false,
  data: {user_id: user_id,d_name:d_name, d_day:d_day, d_month:d_month, d_year:d_year, d_gender:d_gender, d_email:d_email, d_phone:d_phone },
  success: function(result){
	  $( "#notification" ).html( result );
  }
  });
	
		document.getElementById('save_button').style.visibility = 'hidden';
		
	}
}

function change_password() {
	$('#show_settings').load("settings_password.php");
}

function change_email() {
	$('#show_settings').load("settings_email.php");
}

</script>


<div>
<div class="data_input_main">
<div class="data_input_left"> Imię </div> <div class="data_input_right"> <input id="name" onfocus="settings_change()" class="data_input_text" type="text" value="<?php echo $user_info['name']; ?>" /> </div>
</div>

<div class="data_input_main">
<div class="data_input_left"> Data urodzin </div> 



		<div class="data_input_right">
				<select id="birth_day" onchange="settings_change()" class="data_input_day">
        		<?php for ($i_day = 1; $i_day <= 31; $i_day++) { ?> 
                <option value="<?php echo $i_day ?>" <?php if ($user_info['birth_day'] == $i_day){ echo ' selected=selected'; } ?> ><?php echo $i_day ?></option>
				<?php } ?>
                </select>
        
				<select id="birth_month" onchange="settings_change()" class="data_input_month">
                <?php for ($i_month = 1; $i_month <= 12; $i_month++) { ?> 
                <option value="<?php echo $i_month ?>" <?php if ($user_info['birth_month'] == $i_month){ echo ' selected=selected'; } ?>><?php echo $lang_month[$i_month] ?></option>
				<?php } ?>
                  </select>
        
                  <select id="birth_year" onchange="settings_change()" class="data_input_year">
			   		 <?php for ($i_year = 1920; $i_year <= date("Y")-18; $i_year++) { ?> 
                     <option value="<?php echo $i_year ?>" <?php if ($user_info['birth_year'] == $i_year){ echo ' selected=selected'; } ?>><?php echo $i_year ?></option>
					 <?php } ?>
                  </select>
                  </div>

</div>

<div class="data_input_main">
<div class="data_input_left"> Płeć </div> 
<div class="data_input_right"> 

<select id="my_gender"  onchange="settings_change()" class="data_input_text">
                
                <option value="man" <?php if ($user_info['gender'] == 'man'){ echo ' selected=selected'; } ?>> <?php echo $lang['buttonMan'];?> </option>
                <option value="woman" <?php if ($user_info['gender'] == 'woman'){ echo ' selected=selected'; } ?>> <?php echo $lang['buttonWoman'];?> </option>

</select>
</div>
</div>



<div class="data_input_main">
<div class="data_input_left"> E-mail </div> 
<div class="data_input_right"> <a class="change_email_text" onclick="change_email()" title="Kliknij aby zmienić"> <?php echo $user_info['email']; ?> </a> </div>
</div>


<div class="data_input_main">
<div class="data_input_left"> Numer telefonu </div> 
<div class="data_input_right"> <input onfocus="settings_change()" id="my_phone_number" class="data_input_text" type="text" value="<?php echo $user_info['phone_number']; ?>" /> </div>
</div>

<div class="data_input_main">
<div class="data_input_left"> Hasło </div> 
<div class="data_input_right"> <a class="change_pass_text" onclick="change_password()"> Kliknij aby zmienić </a> </div>
</div>

<div class="data_input_main">
<div class="data_input_left"> </div> 
<div class="data_input_right"> <input onfocus="settings_change()" class="save_button" id="save_button" type="submit" onclick="save_settings_data()" value="<?php echo $lang['save'] ?>" /> </div>
</div>


</div>

<div id="notification" class="settings_notifications"> </div>
