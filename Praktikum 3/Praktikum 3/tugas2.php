<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi</title>
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
    </style>
</head>
<body>

<div class="container">
    <h3>Input Data Barang</h3>

    <form method="post">
        Nama Barang
        <input type="text" name="nama">

        Harga
        <input type="number" name="harga">

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <hr>

    <h4>Data Barang</h4>

<?php
$data = array();

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $data[] = array($nama, $harga);

    echo "Data berhasil ditambahkan <br><br>";

    for($i=0; $i<count($data); $i++){
            echo "Nama : ".$data[$i][0]."<br>";
            echo "Harga : ".$data[$i][1]."<br><br>";
        }
    }
?>
</div>
</body>
</html>