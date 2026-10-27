<?php

$saldo = 1000;
$transacciones = 0;

// función sin usar GLOBAL
function procesarCompra($monto) {
    global $saldo, $transacciones;

    $saldo = $saldo - $monto; 
    $transacciones++;

}

// 3. Llamar a la función
procesarCompra(300);

// Mostrar los valores fuera de la función
echo "Saldo: " . $saldo . "\n";
echo "Transacciones: " . $transacciones . "\n";



?>