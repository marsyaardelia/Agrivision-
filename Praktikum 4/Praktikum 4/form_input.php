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

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];

    $sql = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nim, $nama, $jurusan);

    if ($stmt->execute()) {
        echo "<tr><td>Data berhasil ditambahkan</td></tr>";
    } else {
        echo "<tr><td>Gagal: " . $stmt->error . "</td></tr>";
    }

    $stmt->close();
}

$conn->close();
?>