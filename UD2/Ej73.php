<?php

// declaramos una variable en el ambito global
$mensaje = "Texto a mostrar";

function intentarMostrarMensaje() {
    // Intentamos imprimir la variable externa.
    // Usamos @ para suprimir el error visual (Warning: Undefined variable) en pantalla
    echo "Dentro de la función: ", @$mensaje, "<br>";
}

intentarMostrarMensaje();
    echo "Fuera de la función: ", $mensaje, "<br>";
?>