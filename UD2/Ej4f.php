<?php

$var1 = 5;
$var2 = 8;

echo "Voy a intercambiar los valores de las variables <br>";
echo "Número 1: $var1<br>";
echo "Número 2: $var2<br><br>";

$temporal = $var1;
$var1 = $var2;
$var2 = $temporal;

echo "Después del intercambio:<br>";
echo "Número 1: $var1<br>";
echo "Número 2: $var2 <br>";


?>