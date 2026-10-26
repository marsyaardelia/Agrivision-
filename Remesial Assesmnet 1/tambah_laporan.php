<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}

function statusPelanggaran($jumlah){

    if($jumlah >= 1 && $jumlah <= 5){
        return "Ringan";
    }
    elseif($jumlah >= 6 && $jumlah <= 15){
        return "Sedang";
    }

    return "Berat";
}

if(isset($_POST['simpan'])){

    $lokasi = $_POST['lokasi'];
    $waktu = $_POST['waktu_laporan'];
    $jumlah = $_POST['jumlah_kendaraan'];
    $deskripsi = $_POST['deskripsi'];

    if(empty($lokasi)){
        die("Lokasi wajib diisi");
    }

    $status = statusPelanggaran($jumlah);

    $foto = $_FILES['foto_bukti']['name'];

    if($foto != ''){

        $allowed = ['jpg','jpeg','png'];

        $ext = strtolower(
            pathinfo($foto, PATHINFO_EXTENSION)
        );

        if(!in_array($ext,$allowed)){
            die("Format file harus JPG atau PNG");
        }

        if($_FILES['foto_bukti']['size'] > 2000000){
            die("Ukuran file maksimal 2MB");
        }

        move_uploaded_file(
            $_FILES['foto_bukti']['tmp_name'],
            'folderupload/'.$foto
        );
    }

    mysqli_query($conn,"
        INSERT INTO laporan(
            user_id,
            lokasi,
            waktu_laporan,
            jumlah_kendaraan,
            status_pelanggaran,
            deskripsi,
            foto_bukti
        )
        VALUES(
            '{$_SESSION['id']}',
            '$lokasi',
            '$waktu',
            '$jumlah',
            '$status',
            '$deskripsi',
            '$foto'
        )
    ");

    header("Location: laporan.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
    href="assets/style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

<h2>Tambah Laporan</h2>

<form method="POST" enctype="multipart/form-data">

<input
type="text"
name="lokasi"
placeholder="Lokasi"
class="form-control mb-3">

<input
type="datetime-local"
name="waktu_laporan"
class="form-control mb-3">

<input
type="number"
name="jumlah_kendaraan"
placeholder="Jumlah Kendaraan"
class="form-control mb-3">

<textarea
name="deskripsi"
placeholder="Deskripsi"
class="form-control mb-3"></textarea>

<input
type="file"
name="foto_bukti"
class="form-control mb-3">

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

</form>

</div>

<?php include 'footer.php'; ?>

</body>
</html>