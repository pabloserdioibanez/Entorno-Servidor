<?php


$a = 5; $b = ++$a; //el valor de a es 6 que se contajia de la otra operacion y el de b es (a+1=6)


$a = 5; $b = $a++; //el valor de a era 5, escupe el 5 para que $b se lo guarde. Inmediatamente después de soltar ese 5, en un proceso invisible por detrás, $a se actualiza a 6



?>