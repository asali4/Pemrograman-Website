<?php
include 'config.php';
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$suplier = $_POST['suplier'];
$jumlah = $_POST['jumlah'];


$conn->query("insert into item values('','$nama','$jenis','$suplier','$jumlah')");
header("location:item.php");
