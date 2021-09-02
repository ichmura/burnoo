<?php include("include/config.php");  error_reporting(E_ERROR | E_PARSE);
 
 
 $fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE id = '".$_GET['picture_id']."' AND user_id = '".$_COOKIE['user_id']."' LIMIT 1");
 $pictures_info = mysqli_fetch_array($fetch_pictures);
 
 
 mysqli_query($conn, "DELETE FROM burnoo_pictures WHERE id = '".$_GET['picture_id']."' AND user_id = '".$_COOKIE['user_id']."' LIMIT 1"); // delete from database
 
 unlink($_SERVER['DOCUMENT_ROOT'].$pictures_info['localization']);
 unlink($_SERVER['DOCUMENT_ROOT'].$pictures_info['localization_thumb']);
 
 
 echo 'Zdjęcię zostało usunięte';
 
 ?>