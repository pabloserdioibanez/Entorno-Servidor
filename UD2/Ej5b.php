<?php

date_default_timezone_set('Europe/Madrid');
$fecha= date("d/m/Y");
echo "<br>Fecha actual: $fecha";
$dias=5;
$fecha=date('d/m/Y', strtotime("now - $dias days"));
echo "<br> Nueva fecha: $fecha";

?>