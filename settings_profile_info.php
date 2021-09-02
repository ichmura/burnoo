<?php 
include("include/config.php"); 
include("languages/select_language.php");
$fetch_profile_info = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_COOKIE['user_id']."' LIMIT 1");
$profile_info = mysqli_fetch_array($fetch_profile_info);
$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."' AND main = '1' LIMIT 1 ");
$pictures = mysqli_fetch_array($fetch_pictures);

function getAge($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
}
?>

<script>

let show_looking_for;

function looking_for(gender) {
	
	if  ($( ".d_about_text_b" ).length > 1) {
		
		$( ".d_about_text_b" ).attr('class', 'd_about_text_b_hidden');
		$( "#look_"+gender ).attr('class', 'd_about_text_b');
		
  $.ajax({
  url: "functions/save_settings_looking_for.php",
  async: false,
  data: {user_id: '<?php echo $_COOKIE['user_id'];?>', gender:gender },
  });
		
	} else {
	
	$("#look_woman").attr('class', 'd_about_text_b');
	$("#look_man").attr('class', 'd_about_text_b');
	$("#look_all").attr('class', 'd_about_text_b');
	
	}
}


function looking_for_save() {
	
	
}


</script>



<section class="profile_info">

<div class="p_info_picture_m">
<div class="p_info_picture_b" onclick="go_settings_p()"> <img class="p_info_picture" src="<?php echo $pictures['localization_thumb']; ?>"> </div>
<div class="p_info_name"> 

<div> <?php echo $profile_info['name']; ?>, <?php echo getAge($profile_info['birth_year'].'-'.$profile_info['birth_month'].'-'.$profile_info['birth_day']); ?> </div>
<div class="p_info_gender"> <?php echo $lang_gender[$profile_info['gender']]; ?> </div>

<div class="d_about_text_t"> Szukam: </div>
<div class="d_about_looking_for">
<div onclick="looking_for('woman')" id="look_woman" <?php if($profile_info['looking_for'] == 'woman') { ?> class="d_about_text_b" <?php } else { ?> class="d_about_text_b_hidden" <?php } ?>> <?php echo $lang_gender_2['woman']; ?> </div>
<div onclick="looking_for('man')" id="look_man" <?php if($profile_info['looking_for'] == 'man') { ?> class="d_about_text_b" <?php } else { ?> class="d_about_text_b_hidden" <?php } ?>> <?php echo $lang_gender_2['man']; ?> </div>
<div onclick="looking_for('all')" id="look_all" <?php if($profile_info['looking_for'] == 'all') { ?> class="d_about_text_b" <?php } else { ?> class="d_about_text_b_hidden" <?php } ?>> <?php echo $lang_gender_2['all']; ?> </div>
</div>
</div>
</div>



<div class="d_about_main">


<div class="d_about_top"> 
<div class="d_about_name"> O mnie </div> 

<textarea maxlength="300" onfocus="settings_change()" id="description" class="d_about_description"><?php echo $profile_info['description']; ?></textarea>

<div> <input onfocus="settings_change()" class="save_button" id="save_button" type="submit" onclick="save_settings_about_me('<?php echo $profile_info['id']; ?>')" value="<?php echo $lang['save'] ?>" /> </div>

</div>

<div id="notification" class="settings_notifications"> </div>

</div>





</section>