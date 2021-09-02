<?php include("include/config.php");

$pictures_number = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE user_id = '".$_COOKIE['user_id']."'"));

$file_name = $_FILES['file']['name'];
$user_id = $_COOKIE['user_id'];

if ($pictures_number <15) {
if (!file_exists('data/'.$user_id.'/'.$file_name)) {
if(array_key_exists('file',$_FILES) && $_FILES['file']['error'] == 0 ){




$file_ext = strtolower(strrchr($file_name, '.'));
$file_localization = 'data/'.$user_id.'/'.$file_name;
$thumbnail_localization = 'data/'.$user_id.'/thumbnail/'."THUMB_".$file_name;

if(move_uploaded_file($_FILES['file']['tmp_name'], $file_localization)){
	
mysqli_query($conn, "INSERT INTO burnoo_pictures (user_id, name, file_size, ext, localization, localization_thumb, date) VALUES ('".$user_id."', '".$file_name."', '".$_FILES['file']['size']."', '".$file_ext."', '".$file_localization."', '".$thumbnail_localization."', '".time()."')");
		
		
		
		
		
		
// CREATE THUMBNAIL	
		
if ($file_ext == '.jpg' or $file_ext == '.gif' or $file_ext == '.png' or $file_ext == '.jpeg') {
	 
 if (substr($filename, -4) == '.php')
 die('hacking attempt...');
 
 if ($file_ext == '.jpg' or $file_ext == '.jpeg' ) {
	 
 $img_src = imagecreatefromjpeg($file_localization);
 
 } else if ($file_ext == '.gif' ) {
	 
 $img_src = imagecreatefromgif($file_localization);
 
 } else if ($file_ext == '.png' ) {
	 
 $img_src = imagecreatefrompng($file_localization);
 
 }
 
     /* See if it failed */
    if(!$img_src)
    {
        /* Create a black image */
        $img_src  = imagecreatetruecolor(120, 120);
        $bgc = imagecolorallocate($img_src, 255, 255, 255);
        $tc  = imagecolorallocate($img_src, 0, 0, 0);

        imagefilledrectangle($img_src, 0, 0, 120, 120, $bgc);
    }

 $rozmiar_x = imagesx($img_src); // old image size
 $rozmiar_y = imagesy($img_src); // old image size

 $max_x='120' ;
 $stosunek=$max_x/ $rozmiar_x;
 $max_y=$rozmiar_y*$stosunek;
 
 
 $system = explode('.',$file_ext);
 
 if (preg_match('/jpg|jpeg/',$system[1])){
 $orig_image = imagecreatefromjpeg($file_localization);
 } else if (preg_match('/gif/',$system[1])){
 $orig_image = imagecreatefromgif($file_localization);
 } else if (preg_match('/png/',$system[1])){
 $orig_image = imagecreatefrompng($file_localization);
 }
 
 

 $thumbnail_width = $max_x;
 $thumbnail_height = $max_y; 
 
 		
 $sm_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height) or die ("Cannot Initialize GD Image");
 
 imagecopyresampled($sm_image, $orig_image, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, 
 imagesx($orig_image), imagesy($orig_image)); 
 
 imagejpeg($sm_image,$thumbnail_localization,80);
 imagedestroy($sm_image); 
 imagedestroy($orig_image);
 
	
 }	
 
 
 $maxDim = 800;
$file_name_loc = $file_localization;
list($width, $height, $type, $attr) = getimagesize( $file_name_loc );
if ( $width > $maxDim || $height > $maxDim ) {
    $target_filename = $file_name_loc;
    $ratio = $width/$height;
    if( $ratio > 1) {
        $new_width = $maxDim;
        $new_height = $maxDim/$ratio;
    } else {
        $new_width = $maxDim*$ratio;
        $new_height = $maxDim;
    }
    $src = imagecreatefromstring( file_get_contents( $file_name_loc ) );
    $dst = imagecreatetruecolor( $new_width, $new_height );
    imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
    imagedestroy( $src );
    imagepng( $dst, $target_filename ); // adjust format as needed
    imagedestroy( $dst );
}
	


$fetch_pictures = mysqli_query($conn, "SELECT * FROM burnoo_pictures WHERE name = '".$file_name."' AND user_id = '".$_COOKIE['user_id']."' LIMIT 1");
$picture = mysqli_fetch_array($fetch_pictures);
echo $picture['id']; }}}} else { echo 'error_limit';}

mysqli_close($conn);
?>