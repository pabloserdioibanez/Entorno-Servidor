<?php
// Declaramos la función que llevará el conteo
function contadorLlamadas() {
    // La palabra reservada 'static' hace que la variable no se destruya al terminar la función.
    // La asignación inicial (= 0) solo se ejecuta la primera vez.
    static $contador = 0;
    
    // Incrementamos el valor de la variable
    $contador++;
    
    // Mostramos el resultado usando comas en el echo
    echo "Llamada ", $contador, "<br>";
}

// Ejecutamos la función tres veces seguidas
contadorLlamadas();
contadorLlamadas();
contadorLlamadas();

?>