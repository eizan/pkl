<?php
include "../include/header.php";
include "../include/nav.php";
include "../include/database.php";
?>
<div class="col-md-12">
    <h2>Cetak Sertifikat</h2>   
    <h5>Silah kan pilih nama yang akan di cetak sertifikatnya</h5>
</div>
</div>
<hr />


<div class="row">
	<!-- pengecekan nama peserta -->
	<div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading">
                Sertifikat
            </div>        
			<div class="panel-body"> 
                <form role="form" class="" method="post">
					<div class="form-group">
						<label>Nama Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control" placeholder="Masukan Nama peserta" required>
					</div>
					<button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-search"></i> Cek Peserta</button>
				</form>
			</div>
		</div>
	</div>

<?php 
if(isset($_POST['submit'])){
	$nama= $_POST['nama_peserta'];
	// sql peserta tanggal
	$sql = "SELECT * FROM peserta WHERE nama LIKE '%$nama%'";
	$hasil = mysqli_query($conn,$sql);
	$jumlah = mysqli_num_rows($hasil);
	if (mysqli_num_rows($hasil) > 0) {
	// output data of each row
	?>

	<!-- hasil pengecekan -->
	<div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading">
                List Hasil Peserta
            </div>        
			<div class="panel-body"> 
                <table class="table table-striped">
                	<thead>
                		<tr>
                			<th>Nama</th>
                			<th>Asal</th>
                			<th width="5%">Pilihan</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php
							while($row = mysqli_fetch_assoc($hasil)) {
								?>
                		<tr>
                			<td><?php echo $row['nama']; ?></td>
                			<td><?php echo $row['asal']; ?></td>
                			<td><a target="_blank" href="sertifikat_cetak.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Cetak</a></td>
                		</tr>
                		<?php } ?>
                	</tbody>
                </table>
			</div>
		</div>
	</div>

	<?php 
	}else{
		echo '<div class="col-md-6"><div class="alert alert-danger"><i class="fa fa-warning"></i> Nama yang di cari tidak ada</div></div>';
	} 
	?>
	
	<?php } ?>
</div>


<!-- JQUERY -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<?php
include "../include/footer.php";
?>