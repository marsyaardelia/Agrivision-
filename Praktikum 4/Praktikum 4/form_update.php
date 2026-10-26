<?php
$host = "localhost";
$username = "root";
$password = ""; 
$database = "praktikum4";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];

    $sql = "UPDATE mahasiswa SET nim=?, nama=?, jurusan=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssi", $nim, $nama, $jurusan, $id);

    if ($stmt->execute()) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>