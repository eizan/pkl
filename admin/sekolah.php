<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('sekolah');
	$xcrud->relation('kabupaten','kabupaten','nama','nama');
	$xcrud->relation('kecamatan','kecamatan','nama','nama','','','',' ','','kabupaten','kabupaten');
	$xcrud->join('nama','scheduling','sekolah');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>