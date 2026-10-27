<?php

$a = 1;
$b = "1";

echo '$a = 1' . "<br>";
echo '$b= "1";';


echo "<h3>Comparación de variables</h3>";

echo "<h5>Comparación de variables con ==</h5>";
print $a == $b; //true porque el valor es el mismo, aunque el tipo de dato sea diferente
echo "<br>";
echo "<h5>Comparación de variables con ===</h5>";
print $a === $b; //false porque el valor es el mismo pero el tipo de dato es diferente, uno es int y otro es string

?>