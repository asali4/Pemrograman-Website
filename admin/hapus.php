<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("delete from item where id='$id'");
header("location:item.php");
