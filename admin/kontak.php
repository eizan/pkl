<?php 
include "../include/header.php";
include "../include/nav.php";
include "../xcrud/xcrud.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('kontak');
	$xcrud->relation('id_sekolah','sekolah','nama','nama');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>