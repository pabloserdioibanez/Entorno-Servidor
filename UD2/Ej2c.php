<?php



?><?php
$variable_global = "SOY LA VARIABLE GLOBAL";

function probarAlcance() {
    // Solo existe dentro de estas llaves { }
    $variable_local = "SOY LA VARIABLE LOCAL";
    
    echo "<h3>Ejecutando dentro de la función:</h3>";
    
    // Las comillas dobles interpretan la variable.
    echo "Comillas dobles: $variable_local <br>";
    
    // Las comillas simples NO interpretan la variable, imprimen el texto literal.
    echo 'Comillas simples: $variable_local <br>';
    
    // Para poder usar la variable global aquí dentro, hay que "importarla"
    // Si se pone esto, PHP daría un error al intentar imprimir $variable_global
    global $variable_global;
    echo "Llamando a la global: $variable_global <br>";
}

echo "<h2>Prueba de Ambito</h2>";

// Llamamos a la función
probarAlcance();

echo "<h3>Ejecutando fuera de la función:</h3>";
echo "Llamando a la global: $variable_global <br>";



?>