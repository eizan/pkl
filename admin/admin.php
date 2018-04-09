<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('tbl_admin');
	$xcrud->table_name('Data Admin');
	$xcrud->change_type('admin_password', 'password', 'md5', array('maxlength'=>10,'placeholder'=>'Masukan password'));
	$xcrud->change_type('admin_foto', 'image');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>