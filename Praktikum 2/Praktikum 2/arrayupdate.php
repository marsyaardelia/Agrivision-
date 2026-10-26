<?php
function cetak($arr) {
    for ($x = 0; $x < count($arr); $x++) {
        echo "Nama: $arr[$x] <br>";
    }
}

$nama = array("Andi", "Budi", "Cecep");
cetak($nama);
echo "Setelah diupdate <br>";
$nama[2] = "Zaim";
cetak($nama);
?>