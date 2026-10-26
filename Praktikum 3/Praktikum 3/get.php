<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sederhana</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="get" action="">
        Nama: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['name']) && isset($_GET['email'])){
        $name = htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);
        echo "<h3>Hasil Input:</h3>";
        echo "Nama: " . $name . "<br>";
        echo "Email: " . $email;
    }
    ?>
</body>
</html>