<?php
function cetak($arr) {
    for ($x = 0; $x < count($arr); $x++) {
        echo "Nama: $arr[$x] <br>";
    }
}

$nama = array("Andi", "Budi", "Cecep");
cetak($nama);
echo "Setelah menghapus elemen pertama menggunakan array_spilce <br>";
array_splice($nama, 0, 2);
cetak($nama);
?>