<?php 
include "../include/database.php";

$id= $_GET['id'];
	if (empty($id)) {
		$gambar = "../assets/sertifikat/1.jpg";
	}
		else {
		$gambar = "../assets/sertifikat/sertifikat.jpg";
	}
	// sql mengambil psesta
	$sql = "SELECT * FROM peserta WHERE id = '$id'";
	$hasil = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($hasil);

	// memngabungkan text dengan gambar
	$nama = $row['nama'];
	$kota_lahir = $row['kota_lahir'].',';
	$tanggal_lahir = $row['tanggal_lahir'];
	$asal = $row['asal'];
	$tanggal = date('d-m-Y');
	$image = imagecreatefromjpeg($gambar);
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 0, 0, 0);
	$font = "../assets/sertifikat/QuinchoScript_PersonalUse.ttf";
	$font2 = "../assets/sertifikat/arial.ttf";
	$size = 42;
	//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
	$image_width = imagesx($image);  

	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,0,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta namanya
	imagettftext($image, $size, 0, 890, 807, $black, $font2, $nama);
	imagettftext($image, $size, 0, 890, 860, $black, $font2, $kota_lahir);
	imagettftext($image, $size, 0, 1160, 860, $black, $font2, $tanggal_lahir);
	imagettftext($image, $size, 0, 890, 920, $black, $font2, $asal);
	imagettftext($image, 35, 0, 1750, 1180, $black, $font2, $tanggal);

	//tampilkan di browser
	header("Content-type:  image/jpeg");
	imagejpeg($image);
	imagedestroy($image);

 ?>