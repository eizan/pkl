<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('bagian');
	$xcrud->relation('jenis_kegiatan','jenis_kegiatan','nama','nama');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>