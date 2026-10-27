<html>

<h1>Calculo de una compra</h1>

<?php

//IVA GENERAL
define("IVA_GENERAL", 21);

$precio = 17.99;
$cantidad = 2;
$descuento = 30; //porcentaje de descuento
$iva = 2; //porcentaje del iva


//calcular el subtotal
$subtotal = $precio * $cantidad;
echo ("Subtotal sin descuento ni IVA: " . $subtotal . "<br>");

//calcular cuanto se descuenta
$descuento = ($precio * 100)/$descuento;

//calcular precio despues del descuento
$subtotal = $descuento - $subtotal;
echo ("Subtotal sin IVA: " . $subtotal . "<br>");


//calcular el porcentaje de IVA sobre el general
$iva = ($subtotal / IVA_GENERAL)*$iva;
echo ("IVA: ". $iva."<br>");

//calcular precio despues del IVA
$subtotal = $subtotal + $iva;



//pasamos a solo 2 decimales e imprimimos
printf("El precio total es: %.2f<br>" . $subtotal);


?>

</html>