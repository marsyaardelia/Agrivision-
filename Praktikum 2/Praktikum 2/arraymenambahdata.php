<?php
function cetak($arr) {
    for ($x = 0; $x < count($arr); $x++) {
        echo "Nama: $arr[$x] <br>";
    }
}
$nama = array("Andi", "Budi", "Cecep");
cetak($nama);

echo "Setelah diadd satu buah nilai <br>";
$nama[] = "Zaim";
cetak($nama); 

echo "Setelah diadd lebih dari satu buah nilai <br>";
array_push($nama, "Mega", "Caca");
cetak($nama);
?>



