<?php

include 'koneksi.php';

if(isset($_POST['next'])){

$email=$_POST['email'];

$cek=mysqli_query($conn,"
SELECT * FROM users
WHERE email='$email'
");

if(mysqli_num_rows($cek)>0){

$data=mysqli_fetch_assoc($cek);

header("Location: resetpassword.php?id=".$data['id']);
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Lupa Password</title>
<link rel="stylesheet" href="assets/styleforget.css">
 <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="container">

<div class="left">
    <div class="hero-text">
        <h1>Lupa Kata Sandi?</h1>
        <h2>Masukkan email yang terdaftar untuk mereset kata sandi</h2>
    </div>

    <div class="hero-image">
        <img src="images/tempatsampah.png" alt="">
    </div>
</div>

<div class="right">
<div class="card">
      <div class="icon">
            <i class="fa-solid fa-envelope"></i>
        </div>
    <h2>Lupa Kata Sandi</h2>
    <p>Masukkan email untuk mereset kata sandi</p>
<form method="POST">

<div class="input-group">
<input type="email" name="email" placeholder="Masukkan Email">
</div>

<button type="submit" name="next" class="btn">
    Berikutnya
</button>

</form>

</div>

</div>

</div>

</body>
</html>