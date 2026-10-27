<?php
// Ejercicio 2: Casting de string a entero

// Declaramos un string que contiene un número
$numero = "42";

// Mostramos su estado inicial
echo "Antes: ";
var_dump($numero);
echo "<br>";

// Convertimos el string a entero explícitamente (casting)
$numero = (int)$numero; 

// Sumamos 8
$numero += 8;

// Mostramos el resultado final
echo "Resultado con echo: " . $numero . "<br>";
echo "Después: ";
var_dump($numero);
?>