<?php
// Ejercicio 1: echo vs print_r vs var_dump

// Declaramos la variable de texto
$mensaje = "Hola mundo";

// 1. echo: Imprime la cadena directamente
echo "Con echo: ", $mensaje, "<br>";

// 2. print_r: Imprime información legible sobre una variable
echo "Con print_r: ";
print_r($mensaje);
echo "<br>";

// 3. var_dump: Imprime información detallada incluyendo tipo y longitud
echo "Con var_dump: ";
var_dump($mensaje);
?>