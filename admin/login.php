<?php
session_start();
require '../include/database.php';
// Cara lain untuk exsekusi submit button
//if($_SERVER["REQUEST_METHOD"] == "POST"){
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi PKL</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/binary/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/binary/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/binary/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Sistem Informasi PKL</h2>
               
                <h5>( Silahkan login terlebih dahulu )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Sistem Informasi PKL </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="user" placeholder="Your Username " />
                                        </div>
                                          <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="pass" placeholder="Your Password" />
                                        </div>
                                     
                                     <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
                                    </form>
									
                            </div>
							
                           
                        </div>
						<?php
	if(isset($_POST['submit'])){
	  $user = mysqli_real_escape_string($conn,$_POST["user"]);
	  $pass = mysqli_real_escape_string($conn,md5($_POST['pass']));
	  $sql = "SELECT * FROM tbl_admin WHERE admin_username = '$user' AND admin_password = '$pass' ";
	  $result = mysqli_query($conn,$sql);
	  $row = mysqli_fetch_assoc($result);
	  if(mysqli_num_rows($result) > 0){
		$_SESSION['username'] = $user;
		$_SESSION['foto'] = $row['admin_foto'];
		$_SESSION['nama'] = $row['admin_nama'];
	// Redirect user to index.php
		header("Location: index.php");
	  }else{
		echo '
		<span class="alert alert-danger role="alert">Username atau Password Salah</span>
		';
		mysqli_close($conn);
	  }
	}
	?>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/binary/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/binary/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/binary/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/binary/assets/js/custom.js"></script>
   
</body>
</html>
