<?php

include 'config.php';
$tgl = $_POST['tanggal'];
$tgl = date('Y-m-d', strtotime($tgl));
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];


$dt = $conn->query("select * from item where nama='$nama'");
$data = mysqli_fetch_array($dt);
$sisa = $data['jumlah'] - $jumlah;
$conn->query("update item set jumlah='$sisa' where nama='$nama'");


$conn->query("insert into item_out values('','$tgl','$nama','$jumlah')") or die($conn->connect_error);
header("location:item_out.php");
