<?php
// Declaramos las variables de distintos tipos
$entero = 42;
$decimal = 3.14;
$cadena = "Hola clase";
$booleano = true;
$nulo = null;

// 1. Tipo Entero (int)
echo "- Entero- <br>";
echo "gettype: ", gettype($entero), "<br>";
echo "get_debug_type: ", get_debug_type($entero), "<br>";
echo "echo: ", $entero, "<br>";
// print solo acepta un argumento, no se pueden usar comas, hay que concatenar con punto
print "print: " . $entero . "<br><br>"; 

// 2. Tipo Decimal (float)
echo "- Decimal- <br>";
echo "gettype: ", gettype($decimal), "<br>";
echo "get_debug_type: ", get_debug_type($decimal), "<br>";
echo "echo: ", $decimal, "<br>";
print "print: " . $decimal . "<br><br>";

// 3. Tipo Cadena (string)
echo "- Cadena- <br>";
echo "gettype: ", gettype($cadena), "<br>";
echo "get_debug_type: ", get_debug_type($cadena), "<br>";
echo "echo: ", $cadena, "<br>";
print "print: " . $cadena . "<br><br>";

// 4. Tipo Booleano (bool)
echo "- Booleano- <br>";
echo "gettype: ", gettype($booleano), "<br>";
echo "get_debug_type: ", get_debug_type($booleano), "<br>";
echo "echo: ", $booleano, "<br>";
print "print: " . $booleano . "<br><br>";

// 5. Tipo Nulo (null)
echo "- Nulo- <br>";
echo "gettype: ", gettype($nulo), "<br>";
echo "get_debug_type: ", get_debug_type($nulo), "<br>";
echo "echo: ", $nulo, "<br>";
print "print: " . $nulo . "<br><br>";
?>