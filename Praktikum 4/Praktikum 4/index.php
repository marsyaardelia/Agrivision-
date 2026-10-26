<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];

    $conn->query("INSERT INTO barang (nama_barang, harga) VALUES ('$nama', '$harga')");
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM barang WHERE id=$id");
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];

    $conn->query("UPDATE barang SET nama_barang='$nama', harga='$harga' WHERE id=$id");
}

$edit = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit = $conn->query("SELECT * FROM barang WHERE id=$id")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Barang</title>
    <style>
        body{
            font-family: Arial;
            background-color: #f2f2f2;
        }
        .container{
            width: 400px;
            margin: 50px auto;
            background: #abe2e8;
            padding: 20px;
            border-radius: 5px;
        }
        input{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button{
            margin-top: 10px;
            padding: 8px;
            width: 100%;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">

<h3>Input Data Barang</h3>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $edit['id'] ?? ''; ?>">

    Nama Barang
    <input type="text" name="nama_barang" value="<?php echo $edit['nama_barang'] ?? ''; ?>">

    Harga
    <input type="number" name="harga" value="<?php echo $edit['harga'] ?? ''; ?>">

    <button type="submit" name="<?php echo $edit ? 'update' : 'simpan'; ?>">
        <?php echo $edit ? 'Update' : 'Simpan'; ?>
    </button>
</form>

<hr>

<h4>Data Barang</h4>

<?php
$result = $conn->query("SELECT * FROM barang");

while($row = $result->fetch_assoc()){
    echo "<b>Nama:</b> ".$row['nama_barang']."<br>";
    echo "<b>Harga:</b> ".$row['harga']."<br>";

    echo "<a href='?edit=".$row['id']."'>Edit</a> | ";
    echo "<a href='?hapus=".$row['id']."' onclick=\"return confirm('Yakin mau hapus?')\">Hapus</a>";

    echo "<hr>";
}
?>

</div>

</body>
</html>