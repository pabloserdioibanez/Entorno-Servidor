<?php


$a = 10;
$b = 3.14;
$c = "100";
$d = true;

echo "<h3>Es INT</h3>";
echo "a is_int?: " , (is_int($a) ? "Sí" : "No") , "<br>";
echo "b is_int?: " , (is_int($b) ? "Sí" : "No") , "<br>";
echo "c is_int?: " , (is_int($c) ? "Sí" : "No") , "<br>";
echo "d is_int?: " , (is_int($d) ? "Sí" : "No") , "<br>";

echo "<h3>Es FLOAT</h3>";
echo "a is_float?: " , (is_float($a) ? "Sí" : "No") , "<br>";
echo "b is_float?: " , (is_float($b) ? "Sí" : "No") , "<br>";
echo "c is_float?: " , (is_float($c) ? "Sí" : "No") , "<br>";
echo "d is_float?: " , (is_float($d) ? "Sí" : "No") , "<br>";

echo "<h3>Es STRING</h3>";
echo "a is_string?: " , (is_string($a) ? "Sí" : "No") , "<br>";
echo "b is_string?: " , (is_string($b) ? "Sí" : "No") , "<br>";
echo "c is_string?: " , (is_string($c) ? "Sí" : "No") , "<br>";
echo "d is_string?: " , (is_string($d) ? "Sí" : "No") , "<br>";

echo "<h3>Es BOOLEANO</h3>";
echo "a is_bool?: " , (is_bool($a) ? "Sí" : "No") , "<br>";
echo "b is_bool?: " , (is_bool($b) ? "Sí" : "No") , "<br>";
echo "c is_bool?: " , (is_bool($c) ? "Sí" : "No") , "<br>";
echo "d is_bool?: " , (is_bool($d) ? "Sí" : "No") , "<br>";

echo "<h3>Es NUMERICO</h3>";
echo "a is_numeric?: " , (is_numeric($a) ? "Sí" : "No") , "<br>";
echo "b is_numeric?: " , (is_numeric($b) ? "Sí" : "No") , "<br>";
echo "c is_numeric?: " , (is_numeric($c) ? "Sí" : "No") , "<br>";
echo "d is_numeric?: " , (is_numeric($d) ? "Sí" : "No") , "<br>";

?>