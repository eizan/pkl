<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
	$xcrud->table('team');
	$xcrud->change_type('foto', 'image');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>