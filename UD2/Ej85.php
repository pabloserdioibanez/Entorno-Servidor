<?php

//Declara un número grande $monto = 1234567.5. Muestra el valor con echo tal cual, 
// luego con number_format con 0 decimales, con 2 decimales y finalmente con
// separadores personalizados (coma decimal y punto de miles).
// Objetivo: formateo de números para pantalla.


$monto = 1234567.5;


echo $monto ,"<br>";
echo number_format($monto, 0) ,"<br>";
echo number_format($monto, 2) ,"<br>";
echo number_format($monto, 2, ',', '.') ,"<br>";


?>