<?php
include "koneksi.php";

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp, "uploads/".$gambar);

mysqli_query($conn,"insert into laporan_sampah values('', '$nama','$kategori','$deskripsi','$gambar')");

header("location:dashboard.php");
?>