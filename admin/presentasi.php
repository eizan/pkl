<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('presentasi');
	$xcrud->relation('sekolah','sekolah','nama','nama');
	$xcrud->relation('team','team','nama','nama','','',true);
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>