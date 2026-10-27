<?php

$cantidad = 67;

$billetes10 = 0;
$billetes5 = 0;
$monedas1 = 0;

// Calcular billetes de 10€
$billetes10 = (int) ($cantidad / 10);
$resto = $cantidad % 10; // Lo que sobra tras quitar los billetes de 10

// Calcular billetes de 5€ usando el resto anterior
$billetes5 = (int) ($resto / 5);
$resto = $resto % 5; // Lo que sobra tras quitar los billetes de 5

// Las monedas de 1€ son el resto final
$monedas1 = $resto;

// Mostrar los resultados
echo "Billetes de 10€: $billetes10 <br>";
echo "Billetes de 5€: $billetes5 <br>";
echo "Monedas de 1€: $monedas1 <br>";




?>