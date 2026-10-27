<?php
// Script para mostrar por pantalla el resultado de operaciones de comparación

$a = 8;
$b = 3;
$c = 5;



// && (AND): Ambas deben ser ciertas
echo "(\$a == \$b) && (\$c > \$b) : ", ($a == $b) && ($c > $b) ? "sí<br>" : "no<br>"; 

// || (OR): Al menos una debe ser cierta
echo "(\$a == \$b) || (\$b == \$c) : ", ($a == $b) || ($b == $c) ? "sí<br>" : "no<br>";

// Comparación simple
echo "(\$b <= \$c) : ", ($b <= $c) ? "sí<br>" : "no<br>";


?>