<?php
include "../include/header.php";
include "../include/nav.php";
include "../include/database.php";
?>
<?php
// sql peserta
$sql_peserta = "SELECT * FROM peserta";
$hasil_peserta = mysqli_query($conn,$sql_peserta);
$jumlah_peserta = mysqli_num_rows($hasil_peserta);
// sql kantor
$sql_peserta_kantor = "SELECT * FROM peserta WHERE kel_bagian IS NULL";
$hasil_peserta_kantor = mysqli_query($conn,$sql_peserta_kantor);
$jumlah_peserta_kantor = mysqli_num_rows($hasil_peserta_kantor);
// sql lapangan
$sql_peserta_lapangan = "SELECT * FROM peserta where kel_bagian != 'NULL'";
$hasil_peserta_lapangan = mysqli_query($conn,$sql_peserta_lapangan);
$jumlah_peserta_lapangan = mysqli_num_rows($hasil_peserta_lapangan);

// sql status
$tanggal_sekarang = date('Y-m-d');
$sql_peserta_status = "SELECT * FROM peserta where tanggal_mulai <= NOW() AND tanggal_selesai >= NOW()";
$hasil_peserta_status = mysqli_query($conn,$sql_peserta_status);
$jumlah_peserta_status = mysqli_num_rows($hasil_peserta_status);

// sql peserta seminggu terakhir
$sql_peserta_terakhir = "SELECT * FROM peserta where tanggal_selesai between now() and date_sub(now(),INTERVAL -1 WEEK)";
$hasil_peserta_terakhir = mysqli_query($conn,$sql_peserta_terakhir);
$jumlah_peserta_terakhir = mysqli_num_rows($hasil_peserta_terakhir);



$no = 1;
$no2 = 1;
?>
<div class="col-lg-12">
    <div class="panel panel-default">
			<div class="panel-heading">
				Summary
			</div>
				<div class="panel-body">
					<div class="col-md-4">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-red set-icon">
								<i class="fa fa-users"></i>
							</span>
							<div class="text-box" >
								<a href="peserta.php">
									<p class="main-text"><?php echo $jumlah_peserta; ?></p>
									<p class="text-muted">Peserta</p>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-green set-icon">
								<i class="fa fa-user"></i>
							</span>
							<div class="text-box" >
								<a href="peserta_kantor.php">
									<p class="main-text"><?php echo $jumlah_peserta_kantor; ?></p>
									<p class="text-muted">di Kator</p>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-blue set-icon">
								<i class="fa fa-user"></i>
							</span>
							<div class="text-box" >
								<a href="peserta_lapangan.php">
									<p class="main-text"><?php echo $jumlah_peserta_lapangan; ?></p>
									<p class="text-muted">di Lapangan</p>
								</a>
							</div>
						</div>
					</div>
				</div>

    </div>
</div>

	<div class="col-md-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
				Peserta Seminggu terakhir <span class="badge"><?php echo $jumlah_peserta_terakhir; ?></span> orang
			</div>
			<div class="panel-body">
			<?php
			if (mysqli_num_rows($hasil_peserta_terakhir) > 0) {
			?>
				<table class="table table-striped">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Asal</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Sisa Hari</th>
						<th>Sertifikat</th>
					</tr>
							<?php
							while($row = mysqli_fetch_assoc($hasil_peserta_terakhir)) {
								// menghitung sisa hari
								$datetime1 = date_create($row['tanggal_selesai']);
								$datetime2 = date_create($tanggal_sekarang);
								$interval = date_diff($datetime1, $datetime2);
								
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['asal']; ?></td>
									<td><?php echo $row['tanggal_mulai']; ?></td>
									<td><?php echo $row['tanggal_selesai']; ?></td>
									<td><?php echo $interval->format('%a Hari'); ?></td>
									<td><a target="_blank" href="sertifikat_cetak.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Cetak</a></td>
								  </tr>
								<?php
							}
							?>
				</table>
			<?php
			}else{
			?>
			<h3> Tidak ada peserta seminggu terakhir </h3>
			<?php
			}
			
			?>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
				Peserta yang masih aktif sampai tanggal <span class="label label-primary"><?php echo $tanggal_sekarang ?></span> adalah : <span class="badge"><?php echo $jumlah_peserta_status; ?></span> orang
			</div>
			<div class="panel-body">
			<?php
			if (mysqli_num_rows($hasil_peserta_status) > 0) {
			?>
				<table class="table table-striped">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Asal</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Total Magang</th>
						<th>Sisa Hari</th>
					</tr>
							<?php
							while($row = mysqli_fetch_assoc($hasil_peserta_status)) {
								// menghitung total hari
								$datetime1 = date_create($row['tanggal_mulai']);
								$datetime2 = date_create($row['tanggal_selesai']);
								$datetime3 = date_create($tanggal_sekarang);
								$interval = date_diff($datetime1, $datetime2);
								$interval2 = date_diff($datetime2, $datetime3);
								?>
								<tr>
									<td><?php echo $no2++; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['asal']; ?></td>
									<td><?php echo $row['tanggal_mulai']; ?></td>
									<td><?php echo $row['tanggal_selesai']; ?></td>
									<td><?php echo $interval->format('%a Hari'); ?></td>
									<td><?php echo $interval2->format('%a Hari'); ?></td>
								  </tr>
								<?php
							}
							?>
				</table>
			<?php
			}else{
			?>
			<h3> Tidak ada yang peserta yang aktif </h3>
			<?php
			}
			
			?>
			</div>
		</div>
	</div>


<!-- JQUERY -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
<?php
include "../include/footer.php";
?>