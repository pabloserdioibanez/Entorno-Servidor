<?php
// Declaramos la variable en el ámbito global
$color = "azul";

function mostrarColorLocal() {
    // Declaramos una variable local con el mismo nombre.
    // Al no usar 'global', esta variable es completamente independiente de la exterior.
    $color = "rojo";
    
    // Imprimimos la variable local usando comas
    echo "Dentro: ", $color, "<br>";
}

// Ejecutamos la función
mostrarColorLocal();

// Comprobamos el valor de la variable global original
echo "Fuera: ", $color, "<br>";

?>