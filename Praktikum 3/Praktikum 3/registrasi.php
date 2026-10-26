<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <style>
        body{
            font-family: Arial;
            background-color: #f2f2f2;
        }
        .box{
            width: 300px;
            margin: 100px auto;
            background: #abe2e8 ;
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

<div class="box">
    <h3>Registrasi</h3>

    <form method="post">
        Username
        <input type="text" name="username">

        Password
        <input type="password" name="password">

        <button type="submit" name="daftar">Daftar</button>
    </form>
</div>

<?php

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    header("Location: tugas2.php");
    exit;
}

?>

</body>
</html>