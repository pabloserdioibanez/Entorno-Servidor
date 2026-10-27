<?php

$saldo = 1000;
$transacciones = 0;

// función sin usar GLOBAL
function procesarCompra($monto) {
    // Al intentar usar estas variables, PHP asumirá que son locales.
    // Esto generará un error/advertencia de "Undefined variable".

    //habria que poner un "global $saldo, $transacciones;"

    $saldo = $saldo - $monto; 
    $transacciones = $transacciones + 1;
}

// 3. Llamar a la función
procesarCompra(200);

// Mostrar los valores fuera de la función
echo "Saldo final: " . $saldo . "\n";
echo "Transacciones finales: " . $transacciones . "\n";
?>