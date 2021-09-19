function goHome() {

    window.location.href = "/index.php";
}

function set_default_picture(pictureId, thumb) {
	
	
	$("#show_notification").load("/functions/set_default_picture.php?picture_id="+pictureId);
	
	$('.my_photo_mini_l').removeClass('my_photo_mini_l').addClass('my_photo_mini');
	$('#picture_'+pictureId).removeClass('#picture_'+pictureId).addClass('my_photo_mini_l');
	
	$('#main_thumb_header').removeClass('#main_thumb_header').addClass('main_user_image');
	$("#main_thumb_header").attr('src', thumb);

	
	
}



function signup_step1(gender) {
	
  $.ajax({
  url: "/functions/singup_step1.php",
  async: false,
  data: {gender:gender},
  success: function(result){
	  $( "#rightSection" ).html( result );
  }
  });
		
}