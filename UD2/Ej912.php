<?php
// 1. Si la constante DEBUG no existe, defínela con valor true
if (!defined('DEBUG')) {
    define('DEBUG', true);
}

// 2. Función que imprime un mensaje según el valor de DEBUG
function mostrarDebug() {
    if (DEBUG == true) {
        echo "Modo debug ACTIVO\n";
    } else {
        echo "Modo debug INACTIVO\n";
    }
}

// 3. Invocar la función
mostrarDebug();

?>   