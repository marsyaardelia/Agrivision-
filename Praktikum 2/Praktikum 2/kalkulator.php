<?php
function kalkulator(float $a, string $op, float $b) {
    switch ($op) {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            return ($b == 0) ? "Error: Pembagian dengan nol tidak diperbolehkan" : $a / $b;
        case "%":
            return ($b == 0) ? "Error: Modulus dengan nol tidak diperbolehkan" : $a % $b;
        case "^":
            return pow($a, $b);
        default:
            return "Operator tidak valid";            
    }
}
echo kalkulator(3, "+", 5);
echo ("<br>" . kalkulator(10, "/", 20));
echo ("<br>" . kalkulator(10, "x", 20));
?>



