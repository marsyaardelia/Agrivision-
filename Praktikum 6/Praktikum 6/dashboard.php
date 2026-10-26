<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit();
}

include "config.php";
include "laporan.php";

$db = new Database();
$laporan = new Laporan($db->conn);

if (isset($_POST['simpan'])) {
    $laporan->tambah(
        $_POST['nama'],
        $_POST['kategori'],
        $_POST['deskripsi'],
        $_FILES['gambar']
    );
    header("location:dashboard.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $laporan->hapus($_GET['hapus']);
    header("location:dashboard.php");
    exit();
}

$data = $laporan->tampil();
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
   body{
        margin:0;
        font-family: Arial;
    }
    .header{
        background:#e3f2fd;
        color:black;
        padding:15px;
    }
    .container{
        padding:20px;
    }
    input, select, textarea{
        width:100%;
        padding:8px;
        margin-top:5px;
    }
    button{
        padding:10px;
        margin-top:10px;
    }
    table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }
    table, th, td{
        border:1px solid #ccc;
    }
    th, td{
        padding:10px;
    }
</style>
</head>
<body>

<div class="header">
    <div><b>Dashboard</b></div>
    <div>
        <?= $_SESSION['user']; ?> |
        <a class="logout" href="logout.php">Logout</a>
    </div>
</div>

<div class="container">

<div class="card">
<h3>Tambah Data Sampah</h3>
<form method="post" enctype="multipart/form-data">
    Nama
    <input type="text" name="nama" required>

    Kategori
    <select name="kategori">
        <option>Sampah Rumah Tangga</option>
        <option>Rongsokan</option>
        <option>Daun</option>
        <option>Fasilitas</option>
    </select>

    Deskripsi
    <textarea name="deskripsi"></textarea>

    Gambar
    <input type="file" name="gambar" required>

    <button name="simpan">Simpan</button>
</form>
</div>

<div class="card">
<h3>Data Sampah</h3>
<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Deskripsi</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($d=$data->fetch_assoc()) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['kategori'] ?></td>
    <td><?= $d['deskripsi'] ?></td>
    <td>
        <img src="uploads/<?= $d['gambar'] ?>" width="80">
    </td>
    <td>
        <a href="?hapus=<?= $d['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>
</div>

</div>

</body>
</html>