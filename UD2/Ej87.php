<?php
// 1. Declaramos las variables con distintos tipos de datos
$v1 = null;   // Nulo (ausencia de valor)
$v2 = false;  // Booleano
$v3 = "15";   // Cadena de texto (string)
$v4 = 15;     // Número entero (int)

// 2. Usamos var_dump para una inspección detallada de todas las variables a la vez
echo "--- Inspección con var_dump ---<br>";
// var_dump acepta múltiples parámetros separados por comas
var_dump($v1, $v2, $v3, $v4);
echo "<br><br>";

// 3. Mostramos los tipos usando gettype y get_debug_type con printf
echo "--- Tipos con gettype y get_debug_type ---<br>";

// %s indica a printf que ahí debe insertar una cadena de texto (el resultado de las funciones)
printf("\$v1 (null)  -> gettype: %s, get_debug_type: %s<br>", gettype($v1), get_debug_type($v1));
printf("\$v2 (false) -> gettype: %s, get_debug_type: %s<br>", gettype($v2), get_debug_type($v2));
printf("\$v3 (\"15\")  -> gettype: %s, get_debug_type: %s<br>", gettype($v3), get_debug_type($v3));
printf("\$v4 (15)    -> gettype: %s, get_debug_type: %s<br>", gettype($v4), get_debug_type($v4));
?>