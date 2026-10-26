<?php

function DecimaltoHexa($desimal){
    $hexa = dechex ($desimal);
    return $hexa;
}

$desimal = 255;
$hexa = DecimaltoHexa ($desimal);
echo "======= Program Konversi Bilangan Desimal To Hexadesimal =======";
echo "Angka Desimal: ".$desimal. "<br>";
echo "Setelah di konversi: ".$hexa;

?>