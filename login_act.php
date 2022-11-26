<?php
session_start();
include 'admin/config.php';
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$pass = md5($pass);
$query = $conn->query("select * from admin where uname='$uname' and pass='$pass'") or die($conn->connect_error);
if (mysqli_num_rows($query) == 1) {
	$_SESSION['uname'] = $uname;
	header("location:admin/index.php");
} else {
	header("location:index.php?pesan=gagal") or die($conn->connect_error);
}
