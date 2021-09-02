	$(document).ready(function(){
	$("#show_main").load("notifications.php");
 	});
	function nav_settings_click(active) {
	document.getElementsByClassName('nav_settings_button_active')[0].className = 'nav_settings_button_grey';
    document.getElementById(active).className = 'nav_settings_button_active';
	document.getElementById("show_settings").innerHTML = '<img class="loading_gif" src="images/loading.gif"/>';
	$("#show_settings").load(active+".php");
	}
	
/* settings_profile_info.php */

function settings_change() {
document.getElementById('save_button').style.visibility = 'visible';
}

function go_settings_p(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$( "#show_main" ).load( "settings.php", function() {
			$("#show_settings").load("settings_photos.php");
			document.getElementsByClassName('nav_settings_button_active')[0].className = 'nav_settings_button_grey';
    		document.getElementById('settings_photos').className = 'nav_settings_button_active';
		});
}

function save_settings_about_me(id) {
	
	let user_id = id;
	let description = $('#description').val();
	
  $.ajax({
  url: "functions/save_settings_about_me.php",
  async: false,
  data: {user_id: user_id, description:description },
  success: function(result){
	  $( "#notification" ).html( result );
  }
  });
  
		document.getElementById('save_button').style.visibility = 'hidden';
}

/* END */

 function processAjaxData(response, urlPath){
     document.getElementById("content").innerHTML = response.html;
     document.title = response.pageTitle;
     window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
 }
 
 function profile_info(user_id) { 
 	 $("#profile_info_box").load("profile_info.php?user_id="+user_id, function() {
	 $("#profile_info_box").css('visibility', 'visible')
	 })
 }
 
 function profile_info_hide() { 
 	 $("#profile_info_box").css('visibility', 'hidden')
 }
 
 function next_picture(id, user) { 
 	 $("#user_big_picture_"+user).load("functions/next_picture.php?id="+id+"&user="+user);
 }
 
 function previous_picture(id, user) {
	 $("#user_big_picture_"+user).load("functions/previous_picture.php?id="+id+"&user="+user);
 }

 $(document).ready(function(){
    $('#click_notifications').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$("#show_main").load("notifications.php");
	});
	$('#click_hearts').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$("#show_main").load("rate.php", function() {
			$(document).ready(function(){
        	let board = document.querySelector('#board');
        	let carousel = new Carousel(board);
			});
		});
	});
	$('#click_couples').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');	
		$("#show_main").load("couples.php");
		});
		
    $('#click_messages').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');	
		$("#show_main").load("messages.php");
	});
    $('#click_visitors').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$("#show_main").load("visitors.php");
	});
	$('#click_favourite').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$("#show_main").load("favourite.php");
	});
	$('#click_settings').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$( "#show_main" ).load( "settings.php", function() {
		$("#show_settings").load("settings_data.php");
		});
	});
	$('#click_profile').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$("#show_main").load("settings_profile_info.php");
	});
	$('#main_thumb_header').click(function(){
		$("#show_main").html('<img class="loading_gif" src="images/loading.gif"/>');
		$( "#show_main" ).load( "settings.php", function() {
			$("#show_settings").load("settings_photos.php");
			document.getElementsByClassName('nav_settings_button_active')[0].className = 'nav_settings_button_grey';
    		document.getElementById('settings_photos').className = 'nav_settings_button_active';
		});
	});
	
	
	
 });


