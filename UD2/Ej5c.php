<?php

// Definir la fecha
$mes = 19;
$dia = 25;
$anio = 2026;


// Comprobacion 
if (checkdate($mes, $dia, $anio)) {
    echo "La fecha $dia-$mes-$anio es CORRECTA.";
} else {
    echo "La fecha $dia-$mes-$anio es INCORRECTA.";
}
?>