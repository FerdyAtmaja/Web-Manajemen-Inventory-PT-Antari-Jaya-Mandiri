<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Login Aplikasi Manajemen Stok Antari Jaya</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Aplikasi Manajemen Stok Antari Jaya">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/logo.png" />

	<!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css" />  

</head>
<body class="login-page bg-login">
	<div class="login-box" style="background-color:  #85c1e9 ;">
		<div style="" class="login-logo">
			<img style="margin-bottom: -15px" src="assets/img/ajm.png" alt="Logo" height="100">
		</div>
		<?php 

			// fungsi utk tampilkan pesan
			// jika alert = "" kosong
			// tampilakn pesan
		if(empty($_GET['alert'])) {
			echo "";
		}
		// jika alert 1
		// tampilkan pesan gagal "username / password salah ,silahkan cek kembali"
		elseif($_GET['alert'] == 1) {
			echo "<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<h4> <i class='icon fa fa-times-circle'></i>Gagal Login!</h4>
				Username atau password salah, cek kembali username dan password Anda!.</div>";
			}
			// jika alert =2
			// tampilkan pesan sukse "anda berhasil logout"
			elseif($_GET['alert'] == 2) {
				echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<h4> <i class='icon fa fa-check-circle'></i>Sukses!</h4>
				Anda Berhasil Logout.</div>";
			}
		 ?>

		 <div class="login-box-body">
		 	<p class="login-box-msg" style="font-weight: bold;">PT. ANTARI JAYA MANDIRI</p> <br/>
		 	<form action="login_cek.php" method="POST">
		 		<div class="form-group has-feedback">
				 	<h5>Username</h5>
		 			<input type="text" class="form-control" name="username" placeholder="Masukkan username" autocomplete="off" required />
		 			
		 		</div>

		 		<div class="form-group has-feedback">
				 	<h5>Password</h5>
		 			<input type="password" class="form-control" name="password" placeholder="Masukkan password" required />
		 			
		 		</div>
		 		<div style="height: 10px;"></div>
		 		<div class="row">
		 			<div class="col-xs-12">
		 				<input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Login" style="height: 32pt; border-radius: 8pt; font-size:medium;" />
		 			</div>
		 		</div>
		 	</form>
		 </div>
	</div>

	<!-- jQuery 3.7.0 -->
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>