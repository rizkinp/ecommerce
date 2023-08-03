<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "db_tokoonline");
?>

<?php
if(isset($_POST['login'])){
	$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
	$yangcocok = $ambil->num_rows;

	if($yangcocok == 1){
		$_SESSION['admin'] = $ambil->fetch_assoc();
		echo "<div class='alert alert-info'>Login sukses</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php'>";
	}
	else{
		echo "<div class='alert alert-danger'>Login gagal!</div>";
		echo "<meta http-equiv='refresh' content='1;url=login.php'>";
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login Admin</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<style>
		.login-container {
			margin-top: 10%;
			margin-bottom: 10%;
		}

		.login-form {
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		.login-form h2 {
			margin-bottom: 20px;
			text-align: center;
		}

		.login-form .form-group {
			margin-bottom: 20px;
		}

		.login-form .form-control {
			border-radius: 5px;
		}

		.login-form .btn-primary {
			background-color: #4c8fbd;
			border-color: #4c8fbd;
			width: 100%;
			padding: 10px;
			font-size: 16px;
		}

		.login-form .btn-primary:hover {
			background-color: #3d7aa0;
			border-color: #3d7aa0;
		}

		.login-form a {
			color: #4c8fbd;
		}

		.login-form a:hover {
			color: #3d7aa0;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row login-container">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="login-form">
					<h2>Toko Online : Login</h2>
					<h5>( Login yourself to get access )</h5>
					<br />
					<form role="form" method="post">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="user" id="username" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="pass" id="password" />
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="checkbox" /> Remember me
							</label>
							<span class="pull-right">
								<a href="#">Forget password ?</a>
							</span>
						</div>
						<button class="btn btn-primary" name="login">Login</button>
						<hr />
						<p>Not registered? <a href="registeration.html">Click here</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
</body>
</html>
