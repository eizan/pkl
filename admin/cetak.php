<?php 
session_start();
ob_start();
include "../include/database.php";
$bulan = $_GET['bulan'];
$tahun= $_GET['tahun'];
?>
<!DOCTYPE html>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<title>Cetak data dari bulan <?php echo $bulan; ?> tahun <?php echo $tahun; ?></title>
</head>
<body>
<h1>Laporan Peserta Bulan <?php echo $bulan; ?> tahun <?php echo $tahun; ?></h1>
<?php
				// sql peserta tanggal
				$sql_peserta_tanggal = "SELECT * FROM peserta WHERE year(tanggal_mulai) = $tahun and month(tanggal_mulai) = $bulan";
				$hasil_peserta_tanggal = mysqli_query($conn,$sql_peserta_tanggal);
				$jumlah_peserta_tanggal = mysqli_num_rows($hasil_peserta_tanggal);
				if (mysqli_num_rows($hasil_peserta_tanggal) > 0) {
				// output data of each row
				?>

							<table border="1" width="100%">
								  <tr>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Email</th>
								  </tr>
							<?php
							while($row = mysqli_fetch_assoc($hasil_peserta_tanggal)) {
								?>
								<tr>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['asal']; ?></td>
									<td><?php echo $row['no_telp']; ?></td>
								  </tr>
								<?php
							}
							?>
							</table>
					<?php
				} else {
				echo '
				<div class="alert alert-danger">
					<strong>0 Hasil!</strong> Tidak ada data.
				</div>';
				}
				?>
				<p>data yang tertera di atas adalah Peserta yang pernah melakukan kegiatan di BPPPPT Sukabumi.</p>
				<p align='right'>Sukabumi, <?php echo date('d-m-Y'); ?></p>
				<br>
				<br>
				<br>
				<p align='right'>( Ikhsan Thohir )
				KETUA BPPPPT Sukabumi</p>
				
</body>
</html>
<?php
$filename="laporan-".$bulan."-".$tahun.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once "../include/html2pdf/html2pdf.class.php";
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
