
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio funciones</title>
</head>
<body>

    <h1>a)</h1> <!-- Funcion que suma dos numeros -->

    <?php
    // Funcion que suma dos numeros
    function sumar($numero1, $numero2) {
        return $numero1 + $numero2;
    }

    // Llamamos a la funcion y mostramos el resultado
    echo "La suma es: " . sumar(5, 3);
    ?>

    <br>

    <h1>b)</h1> <!-- Funcion que muestra un mensaje -->

    <?php
    // Funcion que muestra el mensaje recibido
    function mostrarMensaje($mensaje) {
        echo $mensaje;
    }

    // Llamamos a la funcion
    mostrarMensaje("Hola, este es un mensaje de prueba.");
    ?>

    <br>

    <h1>c)</h1> <!-- Funcion que calcula el factorial de un numero -->

    <?php
    // Funcion que calcula el factorial
    function factorial($numero) {

        // Comprobamos si el numero es valido
        if ($numero < 0 || $numero != (int)$numero) {
            return -1;
        }

        $resultado = 1;

        // Calculamos el factorial
        for ($i = 1; $i <= $numero; $i = $i + 1) {
            $resultado = $resultado * $i;
        }

        return $resultado;
    }

    // Probamos la funcion con diferentes argumentos
    echo "Factorial de 5: " . factorial(5) . "<br>";
    echo "Factorial de 0: " . factorial(0) . "<br>";
    echo "Factorial de 4: " . factorial(4) . "<br>";
    echo "Factorial de -3: " . factorial(-3) . "<br>";
    ?>

    <br>

    <h1>d)</h1> <!-- Funcion que devuelve la fecha actual en castellano -->

    <?php
    // Funcion que devuelve la fecha en castellano
    function obtenerFechaCastellano() {

        // Guardamos los dias de la semana
        $dias = array(
            "domingo", "lunes", "martes", "miercoles",
            "jueves", "viernes", "sabado"
        );

        // Guardamos los meses del anio
        $meses = array(
            1 => "enero", "febrero", "marzo", "abril",
            "mayo", "junio", "julio", "agosto",
            "septiembre", "octubre", "noviembre", "diciembre"
        );

        // Obtenemos cada parte de la fecha
        $diaSemana = $dias[date("w")];
        $dia = date("d");
        $mes = $meses[(int)date("m")];
        $anio = date("Y");

        // Devolvemos la fecha completa
        return ucfirst($diaSemana) . ", " . $dia . " de "
            . ucfirst($mes) . " de " . $anio;
    }

    // Llamamos a la funcion y mostramos la fecha
    echo obtenerFechaCastellano();
    ?>

    <br>

    <h1>e)</h1> <!-- Funcion que comprueba si una fecha es correcta -->

    <?php
    // Funcion que valida una fecha con formato dia-mes-anio
    function validarFecha($fecha) {

        // Separamos la fecha por los guiones
        $partes = explode("-", $fecha);

        // Comprobamos que haya tres partes
        if (count($partes) != 3) {
            return false;
        }

        // Comprobamos que todas las partes sean numeros
        foreach ($partes as $parte) {
            if ($parte === "" || !ctype_digit($parte)) {
                return false;
            }
        }

        // Guardamos el dia, el mes y el anio
        $dia = (int)$partes[0];
        $mes = (int)$partes[1];
        $anio = (int)$partes[2];

        // Comprobamos si la fecha existe
        return checkdate($mes, $dia, $anio);
    }

    // Probamos con dos fechas diferentes
    $fecha1 = "25-12-2026";
    $fecha2 = "31-02-2026";

    if (validarFecha($fecha1)) {
        echo $fecha1 . " es correcta.<br>";
    } else {
        echo $fecha1 . " no es correcta.<br>";
    }

    if (validarFecha($fecha2)) {
        echo $fecha2 . " es correcta.<br>";
    } else {
        echo $fecha2 . " no es correcta.<br>";
    }
    ?>

    <br>

    <h1>f)</h1> <!-- Función que calcula potencias -->

    <?php

    // Funcion que calcula una potencia
    // Si no se indica exponente, su valor sera 2
    function potencia($base, $exponente = 2) {
        $resultado = 1;

    //multiplicamos la base tantas veces como indique el exponente
    for ($i = 1; $i <= $exponente; $i = $i + 1) {
            $resultado = $resultado * $base;
        }

        return $resultado;
    }

    // Probamos la funcion con diferentes argumentos
    echo "Cuadrado de 5: " . potencia(5) . "<br>";
    echo "3 elevado a 4: " . potencia(3, 4) . "<br>";
    echo "2 elevado a 3: " . potencia(2, 3) . "<br>";
    ?>

    <br>

    <h1>g)</h1> <!-- Funciones para comprobar diferentes propiedades de un numero -->

    <?php
    // Funcion que comprueba si un numero es capicua
    function esCapicua($numero) {
        $numeroTexto = (string)abs((int)$numero);

        return $numeroTexto === strrev($numeroTexto);
    }

    // Funcion que comprueba si un numero es primo
    function esPrimo($numero) {

        // Los numeros menores que 2 no son primos
        if ($numero < 2 || $numero != (int)$numero) {
            return false;
        }

        // Comprobamos posibles divisores
        for ($i = 2; $i * $i <= $numero; $i = $i + 1) {
            if ($numero % $i == 0) {
                return false;
            }
        }

        return true;
    }

    // Funcion que redondea un numero
    function redondearNumero($numero) {
        return round($numero);
    }

    // Funcion que quita los decimales sin redondear
    function quitarDecimales($numero) {
        return (int)$numero;
    }

    // Funcion que cuenta los digitos de un numero
    function contarDigitos($numero) {
        $numero = abs((int)$numero);

        return strlen((string)$numero);
    }

    // Numero que vamos a comprobar
    $numero = 121;

    // Mostramos los resultados en el programa principal
    echo "Numero: " . $numero . "<br>";

    if (esCapicua($numero)) {
        echo "Es capicua.<br>";
    } else {
        echo "No es capicua.<br>";
    }

    if (esPrimo($numero)) {
        echo "Es primo.<br>";
    } else {
        echo "No es primo.<br>";
    }

    echo "Numero redondeado: " . redondearNumero($numero) . "<br>";
    echo "Numero sin decimales: " . quitarDecimales($numero) . "<br>";
    echo "Cantidad de digitos: " . contarDigitos($numero) . "<br>";
    ?>

</body>
</html>
