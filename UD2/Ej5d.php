<?php

$fecha1 = "01-09-2026";
$fecha2 = "24-09-2026";


// Creamos los objetos DateTime para la fecha de inicio y la final
$fechaInicial = DateTime::createFromFormat("d-m-Y", $fecha1);
$fechaFinal = DateTime::createFromFormat("d-m-Y", $fecha2);

// Usamos el método diff() de la fecha inicial, 
// comparándola con la final
$diferencia = $fechaInicial->diff($fechaFinal);


$dias_transcurridos = $diferencia->days;

// Imprimimos el resultado
echo "Han transcurrido $dias_transcurridos días entre ambas fechas.";

?>