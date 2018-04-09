<?php 
include "../include/header.php";
include "../include/nav.php";
?>
<div class="col-lg-12">
   <?php
    $xcrud = Xcrud::get_instance();
	$xcrud->table('peserta');
	$xcrud->where('kel_bagian !=', NULL);
	$xcrud->validation_required('kel_bagian,nama,bagian,jenis_kegiatan,tanggal_mulai,tanggal_selesai,pembimbing,no_telp,tanggal_lahir,kota_lahir,asal,jenis_kelamin');
	$xcrud->table_name('Data Peserta di Lapangan');
	$xcrud->fields('jenis_kegiatan,bagian,kel_bagian',false,'Kerjaan');
	$xcrud->fields('nama,tanggal_lahir,kota_lahir,jenis_kelamin,no_telp,asal,pembimbing,tanggal_mulai,tanggal_selesai,foto',false,'Biodata');
	$xcrud->relation('jenis_kegiatan','jenis_kegiatan','nama','nama');
	$xcrud->relation('bagian','komoditas','nama','nama');
	$xcrud->relation('kel_bagian','kel_komoditas','nama','nama');
	$xcrud->relation('pembimbing','pembimbing','nama','nama');
	$xcrud->change_type('jenis_kelamin','select','Laki-laki','Laki-laki,Perempuan');
	$xcrud->change_type('foto', 'image');
	$xcrud->label('bagian','Komoditas');
	$xcrud->label('kel_bagian','Kel Komoditas');
    echo $xcrud->render();
	?>
</div>
<?php 
include "../include/footer.php";
?>