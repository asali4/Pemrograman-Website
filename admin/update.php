<?php
include 'config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$suplier = $_POST['suplier'];
$jumlah = $_POST['jumlah'];


$conn->query("UPDATE item set nama='$nama', jenis='$jenis', suplier='$suplier', jumlah='$jumlah' where id='$id'");
header("location:item.php");
