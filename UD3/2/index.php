<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Ejercicio 02</title>
 <script src="./js/codigo.js"></script>
</head>
<body>
 <h1>Ejercicio 1</h1>

<!-- Escribe un programa factorial.php, que calcule el factorial de un número.
    Recuerda que el factorial de un número solo está definido para números enteros
    mayores o iguales que cero -->
 <?php

    $numero = 5;

    // Comprobamos que sea mayor o igual que 0
    if ($numero < 0 || $numero != (int)$numero) {
        echo "El numero debe ser un entero mayor o igual que 0";
    } else {
        $factorial = 1;

        // Multiplicamos los numeros desde 1 hasta el numero indicado
        for ($i = 1; $i <= $numero; $i = $i + 1) {
            $factorial = $factorial * $i;
        }

        // Mostramos el resultado
        echo "El factorial de $numero es $factorial";
    }

 ?>
 <h1>Ejercicio 2</h1>

<!-- Haz una página web fecha.php que muestre la fecha actual en castellano, incluyendo
    el día de la semana, con un formato similar al siguiente: "Miércoles, 13 de Abril de
    2011". Para ello utiliza la/s estructura/s de control más apropiada/s. -->
 <?php

 $fechaActual = getdate();
 $fecha = $fechaActual['mday'] . " de " . $fechaActual['month'] . " de " . $fechaActual['year'];
 echo "Hoy es " . $fechaActual['weekday'] . ", " . $fecha;

 echo "<br>";

 function traducirFecha($fecha) {
    switch ($fecha) {
        case 'Monday':
            return 'Lunes';
        case 'Tuesday':
            return 'Martes';
        case 'Wednesday':
            return 'Miércoles';
        case 'Thursday':
            return 'Jueves';
        case 'Friday':
            return 'Viernes';
        case 'Saturday':
            return 'Sábado';
        case 'Sunday':
            return 'Domingo';
    }
 }

 function traducirMes($mes) {
    switch ($mes) {
        case 'January':
            return 'Enero';
        case 'February':
            return 'Febrero';
        case 'March':
            return 'Marzo';
        case 'April':
            return 'Abril';
        case 'May':
            return 'Mayo';
        case 'June':
            return 'Junio';
        case 'July':
            return 'Julio';
        case 'August':
            return 'Agosto';
        case 'September':
            return 'Septiembre';
        case 'October':
            return 'Octubre';
        case 'November':
            return 'Noviembre';
        case 'December':
            return 'Diciembre';
    }
 }

 echo "En castellano: " . traducirFecha($fechaActual['weekday']) . ", " . $fechaActual['mday'] . " de " . traducirMes($fechaActual['month']) . " de " . $fechaActual['year'];
 ?>



</body>
</html>