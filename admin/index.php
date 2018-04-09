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
		<div class="panel panel-danger">
			<div class="panel-heading">
				Peserta yang masih aktif sampai tanggal <span class="label label-primary"><?php echo $tanggal_sekarang ?></span> adalah : <span class="badge"><?php echo $jumlah_peserta_status; ?></span>
			</div>
			<div class="panel-body">
			<?php
			if (mysqli_num_rows($hasil_peserta_status) > 0) {
			?>
				<table class="table table-striped">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Bagian</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
					</tr>
							<?php
							while($row = mysqli_fetch_assoc($hasil_peserta_status)) {
								?>
								<tr>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['asal']; ?></td>
									<td><?php echo $row['no_telp']; ?></td>
									<td><?php echo $row['tanggal_mulai']; ?></td>
									<td><?php echo $row['tanggal_selesai']; ?></td>
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