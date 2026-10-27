<?php
// Script para mostrar por pantalla el resultado de operaciones de comparación

$a = 8;
$b = 3;
$c = 5;



// El formato es: (condición) ? "Valor si es verdadero" : "Valor si es falso"
echo "\$a == \$b : ", $a == $b ? "sí<br>" : "no<br>"; 
echo "\$a != \$b : ", $a != $b ? "sí<br>" : "no<br>"; 
echo "\$a < \$b  : ", $a < $b  ? "sí<br>" : "no<br>";  
echo "\$a > \$b  : ", $a > $b  ? "sí<br>" : "no<br>";  
echo "\$a >= \$c : ", $a >= $c ? "sí<br>" : "no<br>"; 
echo "\$a <= \$c : ", $a <= $c ? "sí<br>" : "no<br>"; 
?>


?>