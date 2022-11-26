<?php
include 'config.php';
$id = $_GET['id'];
$jumlah = $_GET['jumlah'];
$nama = $_GET['nama'];

$a = $conn->query("select jumlah from item where nama='$nama'");
$b = mysqli_fetch_array($a);
$kembalikan = $b['jumlah'] + $jumlah;
$c = $conn->query("update item set jumlah='$kembalikan' where nama='$nama'");
$conn->query("delete from item_out where id='$id'");
header("location:item_out.php");
