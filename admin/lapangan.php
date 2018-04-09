<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('peserta');
	$xcrud->table_name('Data Peserta di Kantor');
	$xcrud->relation('jenis_kegiatan','jenis_kegiatan','nama','nama');
	$xcrud->relation('pembimbing','pembimbing','nama','nama');
	$xcrud->change_type('foto', 'image');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>