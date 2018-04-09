<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('peserta');
	$xcrud->table_name('Data Semua Peserta');
	$xcrud->unset_add();
    $xcrud->unset_edit();
    $xcrud->unset_remove();
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>