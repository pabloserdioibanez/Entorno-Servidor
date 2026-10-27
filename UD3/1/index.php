<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Ejercicio 1</title>
</head>
<body>
 <h1>a)</h1> <!-- Utiliza un bucle que creas oportuno para sumar los números naturales pares del 10 al
                100 y muestra el resultado de la suma. -->

    <?php
        $suma = 0;

        // Empezamos en 10 y avanzamos de dos en dos hasta 100
        for ($numero = 10; $numero <= 100; $numero = $numero + 2) {
            $suma = $suma + $numero;
        }

        echo "La suma es: " . $suma;
    ?>

<br>

 <h1>b)</h1> <!-- Realiza un programa que indique si un número de 3 cifras es capicúa. Intenta hacerlo
                    para cualquier número de cifras -->

    <?php
    $numero = (string) abs((int) readline("Introduce un numero: "));

    // strrev invierte el texto
    $numeroInvertido = strrev($numero);

    if ($numero === $numeroInvertido) {
        echo "Es capicua";
    } else {
        echo "No es capicua";
    }
    ?>

 <br>

  <h1>c)</h1> <!-- Realiza en PHP un programa que muestre los números comprendidos entre 100 y 999
                    que son capicúa -->

    <?php
    for ($numero = 100; $numero <= 999; $numero = $numero + 1) {
        // Comparamos el numero con sus cifras invertidas
        if ((string) $numero === strrev((string) $numero)) {
            echo $numero . "<br>";
        }
    }
    ?>

  <h1>d)</h1> <!--  Visualizar aquellos números de 3 cifras que cumplen que la suma de sus dígitos es igual
                    al producto de los mismos. Por ejemplo 123, donde 1+2+3 = 1*2*3.  -->

    <?php
    for ($numero = 100; $numero <= 999; $numero = $numero + 1) {
        // Sacamos cada cifra del numero
        $centenas = intdiv($numero, 100);
        $decenas = intdiv($numero % 100, 10);
        $unidades = $numero % 10;

        $suma = $centenas + $decenas + $unidades;
        $producto = $centenas * $decenas * $unidades;

        // Mostramos el numero si la suma y el producto coinciden
        if ($suma === $producto) {
            echo $numero . "<br>";
        }
    }
    ?>

  <h1>e)</h1> <!-- Realiza un programa que muestre la serie 
                    de Fibonacci: 0,1,1,2,3,5,8,13,.. -->

    <?php

    $anterior = 0;
    $actual = 1;

    for ($contador = 1; $contador <= 10; $contador = $contador + 1) {
        echo $anterior . " ";

        // Calculamos el siguiente numero y movemos los valores
        $siguiente = $anterior + $actual;
        $anterior = $actual;
        $actual = $siguiente;
    }

    ?>



  <h1>f)</h1> <!-- Realiza un programa que genere 10
                valores de la siguiente serie: 1/2, 2/4, 3/8, 4/16 -->

    <?php
    function fibonacciSerie(int $n): array {
        $serie = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }
        return $serie;
    }

    print_r(fibonacciSerie(10));
    // [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
    ?>

    <h1>g)</h1> <!-- Muestra la tabla de multiplicar de un número, pero colorea
                    las filas alternando dos
                    colores diferentes en las filas pares
                    y las impares. -->

    
    <style>
        table { border-collapse: collapse; }
        td { padding: 5px 15px; border: 1px solid #ccc; }
        tr.par { background-color: #d4edda; }   /* verde claro */
        tr.impar { background-color: #f8d7da; } /* rosa claro */
    </style>

    <table>

    <?php
    
    for ($multiplicador = 1; $multiplicador <= 10; $multiplicador = $multiplicador + 1) {
        // Elegimos una clase distinta para las filas pares e impares
        $clase = ($multiplicador % 2 === 0) ? "par" : "impar";

        echo "<tr class='" . $clase . "'>";
        echo "<td>" . $numero . " x " . $multiplicador . "</td>";
        echo "<td>" . ($numero * $multiplicador) . "</td>";
        echo "</tr>";
    }

    ?>

    </table>

    <h1>h)</h1> <!-- valores triangulo -->
    
    <?php
    $numFilas = 10;

    // Bucle exterior para controlar las filas
    for ($i = 1; $i <= $numFilas; $i++) {
        
        // Bucle interior para imprimir los números de 1 hasta $i
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }
        
        // Salto de línea al final de cada fila
        echo "<br>";
    }

    echo "Para el otro lado <br>";

    // para el otro lado
    for ($i = $numFilas; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }

    echo "<br>";

    }


    ?>

    <h1>i)</h1> <!-- Comprobar si un numero es primo de forma optima -->

    <?php
    // Guardamos el numero que queremos comprobar
    $numero = 3;

    // Suponemos que el numero es primo
    $esPrimo = true;

    // Los numeros menores que 2 no son primos
    if ($numero < 2) {
        $esPrimo = false;
    } else {
        // Comprobamos posibles divisores desde 2
        for ($i = 2; $i < $numero; $i = $i + 1) {

            // Si el resto es 0, hemos encontrado un divisor
            if ($numero % $i == 0) {
                $esPrimo = false;

                // Abandonamos el bucle porque ya no es primo
                break;
            }
        }
    }

    // Mostramos el resultado
    if ($esPrimo) {
        echo "$numero es primo";
    } else {
        echo "$numero no es primo";
    }
    ?>

    <h1>j)</h1> <!-- Obtener los numeros primos entre 3 y 999 -->

    <?php
    // Recorremos los numeros desde 3 hasta 999
    for ($numero = 3; $numero <= 999; $numero = $numero + 1) {

        // Suponemos que el numero es primo
        $esPrimo = true;

        // Comprobamos si tiene algun divisor
        for ($i = 2; $i < $numero; $i = $i + 1) {

            // Si el resto es 0, no es primo
            if ($numero % $i == 0) {
                $esPrimo = false;

                // Dejamos de comprobar divisores
                break;
            }
        }

        // Si sigue siendo primo, lo mostramos
        if ($esPrimo) {
            echo $numero . "<br>";
        }
    }
    ?>

    <h1>k)</h1> <!-- Determinar el precio un viaje (ida y vuelta) con estancia, conociendo
                    la distancia a recorrer en ferrocarril y los días de estancia. 
                    En el cálculo tendremos en cuenta que si
                    el número de días de estancia es superior
                     a 7 y la distancia es superior a 800 km el
                    billete tiene una reducción del 30 por ciento. 
                    Si la distancia es inferior a 50 km el coste
                    total tiene un recargo del 10%. 
                    El precio por km es de 2.5€, y el día de estancia son
                    10€.
                    -->

    <?php
    
    $precio;
    $distancia_a_recorrer = 250;
    $dias_estancia = 3;

    $precio = $distancia_a_recorrer * 2.5 + $dias_estancia * 10;

    if ($dias_estancia > 7 && $distancia_a_recorrer > 800) {
        $total = $precio * 0.7;
    } else if ($distancia_a_recorrer < 50) {
        $total = $precio * 1.1;
    } else {
        $total = $precio;
    }


    echo "Distancia a recorrer: " . $distancia_a_recorrer . " km <br>";
    echo "Días de estancia: " . $dias_estancia . " días <br>";
    echo "El precio total es: <strong>" . $total . "€</strong>";
    
    
    ?>

    




</body>
</html>