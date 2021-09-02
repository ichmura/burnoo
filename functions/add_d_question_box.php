<div id="primary_<?php echo $_GET['id']; ?>" class="primary_container" onmouseover="show_picture_icons('<?php echo $_GET['id']; ?>')" onmouseout="hide_picture_icons('<?php echo $_GET['id']; ?>')">
<img class="primary_icon" src="images/primary_icon.png" title="Ustaw jako domyślne" onclick="set_default_picture('<?php echo $_GET['id']; ?>', '<?php echo $_GET['thumbnail']; ?>')"/>
</div>
<div id="delete_<?php echo $_GET['id']; ?>" class="delete_container" onmouseover="show_picture_icons('<?php echo $_GET['id']; ?>')" onmouseout="hide_picture_icons('<?php echo $_GET['id']; ?>')">
<img class="delete_close" src="images/delete_picture.png" onclick="show_delete_quest('<?php echo $_GET['id']; ?>')" title="Usuń zdjęcie" />
</div>
<div id="question_d_<?php echo $_GET['id']; ?>" class="question_b">
<div class="question_box" onclick="delete_picture('<?php echo $_GET['id']; ?>', '<?php echo $_GET['thumbnail']; ?>')">
<img class="trash_icon" src="images/trash_only.png" title="Usuń zdjęcie" />
<div class="trash_box"> Usuń zdjęcie </div> 
</div>
</div>