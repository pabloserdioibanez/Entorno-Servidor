<?php
// Declaramos la variable en el ámbito global
$mensaje = "Hola";

// Mostramos el valor antes de ejecutar la función usando comas
echo "Antes: ", $mensaje, "<br>";

function modificarMensaje() {
    // Usamos 'global' para acceder a la variable externa.
    // Esto evita el error de variable no definida y quita el subrayado rojo del editor.
    global $mensaje;
    
    // Modificamos la variable original concatenando nuevo texto
    $mensaje .= " desde la función";
}

// Llamamos a la función
modificarMensaje();

// Comprobamos el valor después de ejecutar la función para ver el cambio
echo "Después: ", $mensaje, "<br>";
?>