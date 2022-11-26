<?php
include 'config.php';

$id = $_POST['id'];
$date = strtotime($_POST['tanggal']);
$tanggal = date('Y-m-d', $date);
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];


$conn->query("UPDATE item_out SET tanggal='$tanggal', nama='$nama', jumlah='$jumlah' WHERE id='$id'");
header("location:item_out.php?pesan=update");
