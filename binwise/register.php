<?php

include 'koneksi.php';

if(isset($_POST['daftar'])){

$nama=$_POST['nama'];
$email=$_POST['email'];
$nomorhp=$_POST['nomorhp'];
$alamat=$_POST['alamat'];
$password=md5($_POST['password']);

mysqli_query($conn,"
INSERT INTO users
(nama,email,nomorhp,alamat,password,role)
VALUES
('$nama','$email','$nomorhp','$alamat','$password','warga')
");

echo "
<script>
alert('Registrasi berhasil');
window.location='login.php';
</script>
";
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>
<link rel="stylesheet" href="assets/styleregis.css">
</head>

<body>

<div class="container">

    <div class="left">
    <h1>Buat Akun Baru BinWise</h1>
    <h2>Lengkapi data diri Anda untuk membuat akun baru</h2>
    <div class="hero">
        <div class="hero-image">
            <img src="images/3r.png" alt="">
        </div>
    </div>
    </div>

    <div class="right">
    <div class="card">

    <h2>Daftar</h2>

<form method="POST">

    <div class="input-group">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
    </div>

    <div class="input-group">
        <input type="email" name="email" placeholder="Email" required>
    </div>

    <div class="input-group">
        <input type="text" name="nomorhp" placeholder="Nomor HP" required>
    </div>

    <div class="input-group">
        <textarea name="alamat" placeholder="Alamat" required></textarea>
    </div>

    <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
    </div>

    <button class="btn" name="daftar">
        Daftar
    </button>

</form>

</div>

</div>

</div>

</body>
</html>