<?php

include '../koneksi.php';

header("Content-Type: application/json");

$data = [];

$query = mysqli_query(
$conn,
"SELECT * FROM laporan"
);

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data);