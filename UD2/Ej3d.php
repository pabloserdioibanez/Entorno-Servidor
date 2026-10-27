<?php

$nombre = "Pablo Serdio";

// establece la zona horaria
date_default_timezone_set('Europe/Madrid');

// Formato de fecha: d (día 2 dígitos), F (mes completo en inglés), Y (año 4 dígitos)
// Se usa strtolower() para que el mes aparezca en minúsculas
$fecha = strtolower(date("d-F-Y")); 

// Formato de hora: H (hora 24h), i (minutos con ceros), s (segundos con ceros)
$hora = date("H:i:s");

echo "Hola, mi nombre es $nombre.<br><br>";
echo "La fecha y hora de conexión es: $fecha, a las $hora <br>";



?>