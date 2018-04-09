<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SI PKL</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="#" class="btn btn-default square-btn-adjust"><?php echo date('D d M Y'); ?></a>&nbsp; <a href="#" class="btn btn-primary square-btn-adjust"><?php echo $_SESSION['nama']; ?></a> <a href="logout.php" class="btn btn-danger square-btn-adjust" onclick="return confirm('Ingin logout sekarang?');">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="../uploads/<?php echo $_SESSION['foto']; ?>" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-users"></i> Peserta<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="peserta_kantor.php">Kantor</a>
                            </li>
                            <li>
                                <a href="peserta_lapangan.php">Lapangan</a>
                            </li>
                        </ul>
                     </li>
                   
					<li>
                        <a  href="pembimbing.php"><i class="fa fa-book"></i> Pembimbing</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-sitemap"></i> Jenis Kegiatan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="jenis_kegiatan.php">Kegiatan</a>
                            </li>
                            <li>
                                <a href="bagian.php">Bagian</a>
                            </li>
                        </ul>
                     </li>
					 <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Komoditas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="komoditas.php">Komoditas</a>
                            </li>
                            <li>
                                <a href="kel_komoditas.php">Kelompok</a>
                            </li>
                        </ul>
                     </li>
					 <li>
                        <a  href="laporan.php"><i class="fa fa-print"></i> Laporan</a>
                    </li>
                    <li>
                        <a  href="sertifikat.php"><i class="fa fa-file-pdf-o"></i> Cetak Sertifikat</a>
                    </li>
					 <li>
                        <a  href="admin.php"><i class="fa fa-gears"></i> Admin</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">