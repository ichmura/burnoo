 function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
 }

// photos settings

function dropzone_start() { 
Dropzone.autoDiscover = false;

$('#my_dropzone').dropzone({
  url: "uploader.php",
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 5000, // MB
  maxFiles: 15,
  createImageThumbnails: false,
  previewsContainer: false,
  acceptedFiles:'image/*',
  dictMaxFilesExceeded: "Maksymalnie można przesłać 15 zdjęć",
  dictFallbackMessage: "Twoje przeglądarka nie wspiera dodawania plików typu 'przeciągnij i upuść'.",
  dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
  dictFileTooBig: "Plik jest za duży",
  dictInvalidFileType: "Nie moźna wgrywać plików tego typu.",
  dictResponseError: "Server responded with {{statusCode}} code.",
  dictCancelUpload: "Cancel upload",
  dictUploadCanceled: "Upload canceled.",
  dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
  dictRemoveFile: "Remove file",
  init: function() {
	  
   
   this.on("error", function(file, message) { 

		document.getElementById('show_notification').innerHTML = '<div class="dropzone_error">'+message+'</div>';
				
    });

    },
  accept: function(file, done) { 


  
   var new_photo = document.createElement('div');
	   new_photo.id = file.name;
	   new_photo.className = 'my_photo_mini';
	   new_photo.innerHTML = '<img src="images/loading.gif" style="max-height:50px; max-width:50px;" />'
	   document.getElementById('show_my_photos').appendChild(new_photo);
	   
$.get( "functions/search_same_file.php", { name: file.name } )
  .done(function( data ) {
    var picture_exist = data;
	
	if (picture_exist == '1') { 
	new_photo.remove();
	document.getElementById('show_notification').innerHTML = '<div class="dropzone_notification">Zdjęcie już istnieje</div>'; 
	
	 }
	
  });  
	   
	   
	   
	   done();
  
  },
    success: function (file, response) {
		
	let thumbnail = 'data/' + getCookie('user_id') + '/thumbnail/THUMB_' + file.name;


     function add_new_photo() {
	   document.getElementById(file.name).innerHTML = '<img src="'+ thumbnail +'" style="max-height:100px; max-width:100px;" />'
	   document.getElementById('show_notification').innerHTML = '<div class="dropzone_notification">Zdjęcie zostało dodane</div>'; 
	 }

	 setTimeout(add_new_photo(), 2000);
	 
	 if(response == 'error_limit') { 
	 document.getElementById('my_dropzone').innerHTML = 'Limit zdjęć osiągnięty.';
	 document.getElementById('show_notification').innerHTML = '<div class="dropzone_notification">Maksymalnie można dodać 30 zdjęć.</div>'; 
	 document.getElementById(file.name).remove();
	 } else {
		 
		var picture_id = response;
		var new_picture = document.getElementById(file.name);
		
		new_picture.id = 'picture_'+picture_id;

		$(new_picture).attr("onMouseOver","show_picture_icons("+picture_id+")");
		$(new_picture).attr("onMouseOut","hide_picture_icons("+picture_id+")");
		
		
		var delete_questions = document.createElement('div');
		delete_questions.id = 'delete_questions_'+picture_id;
		new_picture.after(delete_questions);
		
		$("#delete_questions_"+picture_id).load("functions/add_d_question_box.php?id="+picture_id+"&thumbnail="+thumbnail);
	 }
	 
	 
	}
	   
  
}
)
 
}


 var actual_del_quest = [];

 
 function show_picture_icons(picture) {
	 
	document.getElementById('delete_'+picture).style.visibility = "visible";
	document.getElementById('primary_'+picture).style.visibility = "visible";
	 
 }
 
  function hide_picture_icons(picture) {
	 
	document.getElementById('delete_'+picture).style.visibility = "hidden";
	document.getElementById('primary_'+picture).style.visibility = "hidden";
 }
 
 
 function show_delete_quest(picture) {
	 event.stopPropagation();
	document.getElementById('question_d_'+picture).style.visibility = "visible";
 }
 
 function delete_picture(picture, thumb) {
	 
	document.getElementById('picture_'+picture).remove();
	document.getElementById('delete_'+picture).remove();
	document.getElementById('primary_'+picture).remove();
	document.getElementById('question_d_'+picture).remove();
	
	if($('#main_thumb_header').attr('src') == thumb) {
		
		$('#main_thumb_header').removeClass('#main_thumb_header').addClass('no_image');
		$("#main_thumb_header").attr("src","images/no_image.png");
		
	}
	
	

	$("#show_notification").load("functions/delete_picture.php?picture_id="+picture);

 }
 

 
 $('html').click(function() {
   $('.question_b').css("visibility" , "hidden");
});