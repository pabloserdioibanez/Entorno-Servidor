<?php

$producto = "Laptop";
$categoria = "Electrónicos";


$refProducto = &$producto;

$refCategoria = &$categoria;

$producto = "Smartphone";
$categoria = "Moviles";

print "Producto: $refProducto <br>";
print "Categoria: $refCategoria <br>";

//al usar un ref se copia el valor y se pega en la variable de referencia.



?>