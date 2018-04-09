<?php
include "../include/header.php";
include "../include/nav.php";
include "../include/database.php";
?>
<div class="col-lg-12">
	<?php 
	if($_GET['page'] == 'presentasi'){
		?>

		<h1>Presentasi</h1>
		<hr>
		<table class="table table-striped">
			<tr>
				<th>Nama Sekolah</th>
				<td>SMKN 1 Sukabumi</td>
			</tr>
			<tr>
				<th>Alamat Sekolah</th>
				<td>Jalan Raya Cibolang No 21</td>
			</tr>
			<tr>
				<th>Kontak Person</th>
				<td>Agus Gustian M.pd</td>
			</tr>
		</table>

		<?php
	}elseif ($_GET['page'] == 'sekolah') {
		    $xcrud = Xcrud::get_instance();
			$xcrud->table('sekolah');
			$xcrud->unset_add();
		    $xcrud->unset_edit();
		    $xcrud->unset_remove();
		    $xcrud->unset_view();
		    $xcrud->unset_csv();
		    $xcrud->unset_limitlist();
		    $xcrud->unset_numbers();
		    $xcrud->unset_pagination();
		    $xcrud->unset_print();
		    $xcrud->unset_search();
		    $xcrud->unset_title();
		    $xcrud->unset_sortable();
		    echo $xcrud->render();
	}elseif ($_GET['page'] == 'spanduk') {
			$xcrud = Xcrud::get_instance();
			$xcrud->table('sekolah');
			$xcrud->where('spanduk =', 1);
			$xcrud->columns('nama,alamat,telp'); // columns in grid
			$xcrud->unset_add();
		    $xcrud->unset_edit();
		    $xcrud->unset_remove();
		    $xcrud->unset_view();
		    $xcrud->unset_limitlist();
		    $xcrud->unset_numbers();
		    $xcrud->unset_pagination();
		    $xcrud->unset_search();
		    $xcrud->unset_sortable();
		    $xcrud->table_name('Sekolah Spanduk');
		    echo $xcrud->render();
	}elseif ($_GET['page'] == 'scheduling') {
		?>

		<h1>Scheduling</h1>
		<hr>
		<table class="table table-striped">
			<tr>
				<th>Nama Sekolah</th>
				<td>SMKN 1 Sukabumi</td>
			</tr>
			<tr>
				<th>Alamat Sekolah</th>
				<td>Jalan Raya Cibolang No 21</td>
			</tr>
			<tr>
				<th>Kontak Person</th>
				<td>Agus Gustian M.pd</td>
			</tr>
		</table>

		<?php
	}
	?>
</div>
<?php
include "../include/footer.php";
?>