<!DOCTYPE html>
<html>

<head>
	<title>ASSET TRACKING</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'admin/config.php'; ?>
	<style type="text/css">
		.kotak {
			margin-top: 150px;
		}

		.kotak .input-group {
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<?php
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == "gagal") {
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='bi bi-exclamation-circle'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
		<div class="panel panel-default">
			<form action="login_act.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
					<img class="img-responsive" src="assets/img/logo.png" alt="logo" style="padding:20px;">
					<!-- <h3>Silahkan Login ..</h3> -->
					<label style="color:#222;">Please Login to your account</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Username" name="uname">
					</div>
					<div class="input-group">
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					<div class="input-group">
						<input type="submit" class="btn btn-primary" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>