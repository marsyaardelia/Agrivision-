<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit();
}
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
        <h2>Dashboard</h2>
        Login: <?php echo $_SESSION['user']; ?> |
        <a href="logout.php" style="color:black;">Logout</a>
    </div>

    <div class="container">
        <h3>Tambah Data</h3>

        <form action="simpan.php" method="post" enctype="multipart/form-data">
            Nama
            <input type="text" name="nama">

            Kategori
            <select name="kategori">
                <option>Sampah Rumah Tangga</option>
                <option>Rongsokan</option>
                <option>Daun</option>
                <option>Fasilitas</option>
            </select>

            Deskripsi
            <textarea name="deskripsi"></textarea>

            Upload Gambar
            <input type="file" name="gambar">

            <button type="submit">Simpan</button>
        </form>

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

<?php
$no=1;
$data = mysqli_query($conn,"select * from laporan_sampah");

while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['kategori']; ?></td>
<td><?php echo $d['deskripsi']; ?></td>
<td><img src="uploads/<?php echo $d['gambar']; ?>" width="80"></td>
<td>
<a href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
</td>
</tr>
<?php } ?>

        </table>

    </div>

</body>
</html>