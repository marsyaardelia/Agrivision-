<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";

$db = new Database();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $username;
        header("location:dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
    body{
        margin:0;
        font-family: Arial;
        background:#e3f2fd;
    }
    .container{
        width:100%;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .box{
        width:350px;
        background:#fff;
        padding:25px;
        border-radius:8px;
    }
    input{
        width:100%;
        padding:10px;
        margin-top:5px;
    }
    button{
        width:100%;
        padding:10px;
        margin-top:15px;
    }
</style>
</head>
<body>

<div class="container">
<div class="box">
<h2>Login</h2>

<form method="post">
    Username
    <input type="text" name="username" required>

    Password
    <input type="password" name="password" required>

    <button name="login">Login</button>
</form>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

</div>
</div>

</body>
</html>