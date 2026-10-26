<?php
$password = password_hash('password', PASSWORD_BCRYPT);
echo "Hash: " . $password . "<br>";

$conn = mysqli_connect('localhost', 'root', '', 'db_ci3');
$sql = "INSERT INTO users (name, email, password, created_at, updated_at) 
        VALUES ('Admin', 'marsyaardelia07@gmail.com', '$password', NOW(), NOW())";

if (mysqli_query($conn, $sql)) {
    echo "User berhasil dibuat!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>