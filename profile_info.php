<?php 
include("include/config.php"); 
include("languages/select_language.php");
$fetch_profile_info = mysqli_query($conn, "SELECT * FROM burnoo_users WHERE id = '".$_GET['user_id']."' LIMIT 1 ");
$profile_info = mysqli_fetch_array($fetch_profile_info);
$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_GET['user_id']."' AND main = '1' LIMIT 1 ");
$pictures = mysqli_fetch_array($fetch_pictures);

function getAge($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
}
?>

<style>


</style>

<section class="profile_info">

<img class="close_profile_info" onClick="profile_info_hide()" src="images/close_panel_info.png">

<div class="p_info_picture_m">
<div class="p_info_picture_b" onClick="profile_info_hide()"> <img class="p_info_picture" src="<?php echo $pictures['localization_thumb']; ?>"> </div>
<div class="p_info_name"> 

<div> <?php echo $profile_info['name']; ?>, <?php echo getAge($profile_info['birth_year'].'-'.$profile_info['birth_month'].'-'.$profile_info['birth_day']); ?> </div>
<div class="p_info_gender"> <?php echo $lang_gender[$profile_info['gender']]; ?> </div>

<div class="d_about_text_t"> Szukam: </div>
<div class="d_about_looking_for">
<div <?php if($profile_info['looking_for'] == 'woman') { ?> class="p_about_text_b" <?php } else { ?> class="p_about_text_b_hidden" <?php } ?>> <?php echo $lang_gender_2['woman']; ?> </div>
<div <?php if($profile_info['looking_for'] == 'man') { ?> class="p_about_text_b" <?php } else { ?> class="p_about_text_b_hidden" <?php } ?>> <?php echo $lang_gender_2['man']; ?> </div>
<div <?php if($profile_info['looking_for'] == 'all') { ?> class="p_about_text_b" <?php } else { ?> class="p_about_text_b_hidden" <?php } ?>> <?php echo $lang_gender_2['all']; ?> </div>
</div>
</div>

</div>
</div>

<div class="p_info_about">

<h1 class="p_info_b_header"> O mnie: </h1>

<article>
<?php echo nl2br($profile_info['description']); ?>
</article>


</div>


</section>