function signup() {
	
	let s_name = $('#name').val();
	let s_day =  $('#birth_day option:selected').val();
	let s_month = $('#birth_month option:selected').val();
	let s_year = $('#birth_year option:selected').val();
	let s_city = $('#city').val();
	let s_gender = $('#my_gender option:selected').val();
	let s_email = $('#email').val();
	let s_phone = $('#phone').val();
	let s_password = $('#password').val();
	
  $.ajax({
  url: "functions/signup_user.php",
  async: false,
  data: { s_name:s_name, s_day:s_day, s_month:s_month, s_year:s_year, s_city:s_city, s_gender:s_gender, s_email:s_email, s_phone:s_phone, s_password:s_password },
  success: function(result){
	  $( "#notification" ).html( result );
  }
  });
	

	
}