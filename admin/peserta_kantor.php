<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('peserta');
	$xcrud->where('kel_bagian IS NULL');
	$xcrud->table_name('Data Peserta di Kantor');
	$xcrud->columns('jenis_kegiatan,bagian,nama,tanggal_lahir,kota_lahir,jenis_kelamin,no_telp,asal,pembimbing,tanggal_mulai,tanggal_selesai,foto');
	$xcrud->validation_required('kel_bagian,nama,bagian,jenis_kegiatan,tanggal_mulai,tanggal_selesai,pembimbing,no_telp,tanggal_lahir,kota_lahir,asal,jenis_kelamin');
	$xcrud->fields('jenis_kegiatan,bagian',false,'Kerjaan');
	$xcrud->fields('nama,tanggal_lahir,kota_lahir,jenis_kelamin,no_telp,asal,pembimbing,tanggal_mulai,tanggal_selesai,foto',false,'Biodata');
	$xcrud->relation('jenis_kegiatan','jenis_kegiatan','nama','nama');
	$xcrud->relation('bagian','bagian','nama','nama');
	$xcrud->relation('pembimbing','pembimbing','nama','nama');
	$xcrud->change_type('jenis_kelamin','select','Laki-laki','Laki-laki,Perempuan');
	$xcrud->change_type('foto', 'image');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>