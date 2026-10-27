<?php

// Definir constante PI y variable radio
define("PI", 3.1416);
$radio = 5; // cambiar este valor para probar con diferentes radios

// 2. Calculo de area, perímetro y volumen de la circunferencia
$area = PI * ($radio ** 2);  // A = π · r²

$perimetro = 2 * PI * $radio; // P = 2 · π · r

$volumen = (4 / 3) * PI * ($radio ** 3); // V = (4/3) · π · r³

echo "<strong>Valor del radio: $radio </strong> <br>";
echo "Área de la circunferencia: " . round($area, 2) . "<br>";
echo "Perímetro del círculo: " . round($perimetro, 2) . "<br>";
echo "Volumen de la esfera: " . round($volumen, 2) . "<br>";

?>