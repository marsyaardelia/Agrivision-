<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "ADA DATA";
} else {
    echo "TIDAK ADA DATA";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
        </tr>

<?php while ($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nim']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['jurusan']; ?></td>
    </tr>

<?php
}
?>  
    </table>

    <br>
        <button onclick="location.href='form_input.html'">Tambah Data</button>
        <button onclick="location.href='form_update.html'">Update Data</button>
        <button onclick="location.href='form_delete.html'">Hapus Data</button>

</body>
</html>