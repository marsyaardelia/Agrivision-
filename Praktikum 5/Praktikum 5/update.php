<?php
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

mysqli_query($conn, "update laporan_sampah set 
nama='$nama',
kategori='$kategori',
deskripsi='$deskripsi'
where id='$id'");

header("location:dashboard.php");
?>