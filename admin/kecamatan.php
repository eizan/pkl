<?php 
include "../include/header.php";
include "../include/nav.php";
include "../xcrud/xcrud.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('kecamatan');
	$xcrud->relation('kabupaten','kabupaten','nama','nama');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>