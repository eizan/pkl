<?php
include "../include/header.php";
include "../include/nav.php";
include "../include/database.php";
?>
<div class="col-md-12">
    <h2>Laporan</h2>   
    <h5>Pilih Laporan yang di inginkan</h5>
</div>
</div>
<hr />

<div class="row">
	<div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading">
                Laporan
            </div>        
			<div class="panel-body"> 
                <form role="form" class="form-inline" method="post">
					<div class="form-group">
						<label>Bulan</label>
                        <select name="bulan" class="form-control">
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="12">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<select name="tahun" class="form-control">
							<?php
							$mulai= date('Y') - 50;
							for($i = $mulai;$i<$mulai + 100;$i++){
								$sel = $i == date('Y') ? ' selected="selected"' : '';
								echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
							}
							?>
						</select>
                    </div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<?php 
			if(isset($_POST['submit'])){
				$bulan = $_POST['bulan'];
				$tahun= $_POST['tahun'];
				// sql peserta tanggal
				$sql_peserta_tanggal = "SELECT * FROM peserta WHERE year(tanggal_mulai) = $tahun and month(tanggal_mulai) = $bulan";
				$hasil_peserta_tanggal = mysqli_query($conn,$sql_peserta_tanggal);
				$jumlah_peserta_tanggal = mysqli_num_rows($hasil_peserta_tanggal);
				if (mysqli_num_rows($hasil_peserta_tanggal) > 0) {
				// output data of each row
				?>
					<div class="panel panel-default">
						<div class="panel-heading">
						<a href="cetak.php?bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn btn-danger">Cetak <i class="fa fa-print"></i></a>
						</div>        
						<div class="panel-body"> 
							<table class="table table-striped">
								<thead>
								  <tr>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Email</th>
								  </tr>
								</thead>
								<tbody>
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
							</tbody>
							</table>
						</div>
					</div>
					<?php
				} else {
				echo '
				<div class="alert alert-danger">
					<strong>0 Hasil!</strong> Tidak ada data.
				</div>';
				}
			};
		?>
	</div>
</div>
  
<!-- JQUERY -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<?php
include "../include/footer.php";
?>