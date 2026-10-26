<?php

$n = $_GET["n"];

$min_pangkat = $n;
$best_p = $n;
$sisa_n = $n;

for ($i = 2; $i * $i <= $sisa_n;$i++){
    if ($sisa_n % $i ==0){
        $pangkat = 0;
        while ($sisa_n % $i == 0){
            $sisa_n /= $i;
            $pangkat++;
        }

        if ($pangkat < $min_pangkat){
            $min_pangkat = $pangkat;
            $best_p = $i;
        }
    }
}

if ($sisa_n > 1){
    if ($pangkat < $min_pangkat){
        $best_p = $sisa_n;
    }
}

echo $best_p;
?>