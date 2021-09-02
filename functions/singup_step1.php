<?php include("languages/select_language.php"); ?> 
<?php include("include/config.php"); ?>


<h1> Stwórz nowe konto </h1>

<div>
<div class="signup_input_main">
<div class="signup_input_left"> Imię </div> <div class="signup_input_right"> <input id="name" class="signup_input_text" type="text" /> </div>
</div>

<div class="signup_input_main">
<div class="signup_input_left"> Data urodzin </div> 



		<div class="signup_input_right">
				<select id="birth_day" onchange="settings_change()" class="signup_input_day">
        		<?php for ($i_day = 1; $i_day <= 31; $i_day++) { ?> 
                <option value="<?php echo $i_day ?>"><?php echo $i_day ?></option>
				<?php } ?>
                </select>
        
				<select id="birth_month" onchange="settings_change()" class="signup_input_month">
                <?php for ($i_month = 1; $i_month <= 12; $i_month++) { ?> 
                <option value="<?php echo $i_month ?>"><?php echo $lang_month[$i_month] ?></option>
				<?php } ?>
                  </select>
        
                  <select id="birth_year" onchange="settings_change()" class="signup_input_year">
			   		 <?php for ($i_year = 1920; $i_year <= date("Y")-18; $i_year++) { ?> 
                     <option value="<?php echo $i_year ?>"><?php echo $i_year ?></option>
					 <?php } ?>
                  </select>
                  </div>

</div>


<div class="signup_input_main">
<div class="signup_input_left"> Miasto </div> 
<div class="signup_input_right"> <input id="city" class="signup_input_text" type="text" /> </div>
</div>


<div class="signup_input_main">
<div class="signup_input_left"> Płeć </div> 
<div class="signup_input_right"> 

<select id="my_gender"  onchange="settings_change()" class="signup_input_text">
                
                <option value="man" <?php if ($_GET['gender'] == 'man'){ echo ' selected=selected'; } ?>> <?php echo $lang['buttonMan'];?> </option>
                <option value="woman" <?php if ($_GET['gender'] == 'woman'){ echo ' selected=selected'; } ?>> <?php echo $lang['buttonWoman'];?> </option>

</select>
</div>
</div>



<div class="signup_input_main">
<div class="signup_input_left"> E-mail </div> 
<div class="signup_input_right"> <input id="email" class="signup_input_text" type="text" /> </div>
</div>


<div class="signup_input_main">
<div class="signup_input_left"> Numer telefonu </div> 
<div class="signup_input_right"> <input id="phone" class="signup_input_text" type="text" /> </div>
</div>

<div class="signup_input_main">
<div class="signup_input_left"> Hasło </div> 
<div class="signup_input_right"> <input id="password" class="signup_input_text" type="text" /> </div>
</div>

<div class="signup_button_form"> <input class="signup_button" type="submit" onClick="signup()" value="<?php echo $lang['signup'] ?>" /> </div>

<div id="notification" class="notification"> </div>


<div class="signup_input_main">
<div class="signup_agree"> By continuing, you're confirming that you've read and agree to our Terms and Conditions, Privacy Policy and Cookie Policy </div>
</div>


