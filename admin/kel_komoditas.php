<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('kel_komoditas');
	$xcrud->relation('komoditas','komoditas','nama','nama');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>