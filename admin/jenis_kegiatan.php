<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('jenis_kegiatan');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>