<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('scheduling');
	$xcrud->relation('sekolah','sekolah','nama','nama');
	$xcrud->relation('team','team','nama','nama','','',true);
	$xcrud->change_type('tanggal', 'date');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>