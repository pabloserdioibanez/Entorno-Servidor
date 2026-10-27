<?php

// instanciamos un nuevo objeto DateTime con fehca de inicio
// y la hora
$fecha = "2026-09-29 14:00:00";

//definimos el número de horas a sumar
$horas = 5;

// strtotime() convierte "2026-09-29 14:00:00 + 5 hours" a un timestamp (int)
// date() lo convierte de vuelta a texto con el formato Y-m-d H:i:s
$nuevaFecha = date('Y-m-d H:i:s', strtotime("$fecha + $horas hours"));

//imprimimos la fecha original y la nueva fecha
echo "Fecha original: $fecha <br>";

echo "Fecha + $horas horas: $nuevaFecha";


?>