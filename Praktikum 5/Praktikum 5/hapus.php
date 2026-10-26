<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"delete from laporan_sampah where id='$id'");

header("location:dashboard.php");
?>