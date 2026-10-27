<?php

$nombre = "Juan";

//var_dump();
echo "Información de la variable nombre: ";
var_dump($nombre);
echo"<br>";

//mostar solo el contenido
echo "Contenido de la variable: $nombre <br>";

//asginar valor nulo y volver a comprobar
$nombre = null;

echo"Depues asignamos un valor nulo: ";
var_dump($nombre);


?>