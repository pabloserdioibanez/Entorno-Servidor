<?php
// 1. Declaración de la variable
$var = ""; // Se crea la variable en memoria y se le asigna un string vacío. 

// 2. Uso de empty()
if (empty($var)) {
    // La condición se cumple (devuelve true). 
    // Como vimos antes, PHP considera una cadena vacía ("") como un valor "vacío".
    // Por lo tanto, se ejecutará este 'echo'.
    echo '$var es 0, cadena vacía, o no se encuentra definida en absoluto';
}

// 3. Uso de isset()
if (isset($var))
    // La condición también se cumple (devuelve true).
    // La variable SÍ existe en memoria y su valor NO es NULL. Aunque el string no tenga contenido, es un valor válido.
    // Por lo tanto, se ejecutará este 'echo'.
    echo '$var está definida a pesar de que está vacía';
else
    // Este bloque no se ejecutará en este ejemplo.
    // Solo se ejecutaría si hubiéramos asignado '$var = null;' o si hubiéramos borrado la variable previamente.
    echo "NO EXISTE LA VARIABLE";
?>