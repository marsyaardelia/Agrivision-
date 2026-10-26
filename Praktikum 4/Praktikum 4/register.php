<?php
include 'koneksi.php';

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    echo "Registrasi berhasil <a href='login.php'>Login</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
     <style>
        body{
            font-family: Arial;
            background-color: #f2f2f2;
        }
        .box{
            width: 300px;
            margin: 100px auto;
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

<div class="box">
    <h3>Register</h3>

    <form method="post">
        Username
        <input type="text" name="username">

        Password
        <input type="password" name="password">

        <button type="submit" name="daftar">Daftar</button>
    </form>
</div>

</body>
</html>