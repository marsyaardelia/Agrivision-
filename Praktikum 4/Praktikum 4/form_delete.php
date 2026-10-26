<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "praktikum4";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];

    $sql = "DELETE FROM mahasiswa WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<tr><td>Gagal: " . $stmt->error . "</td></tr>";
    }

    $stmt->close();
}

$conn->close();
?>