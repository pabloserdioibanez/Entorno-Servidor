
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>

    <h2>a) Fusion de 2 arrays aleatorios, ordenados de menor a mayor.</h2>
    <?php

    //funcion que genera array con 20 numeros aleatorios
    function cargarArray() {
        $numeros = array();

        for ($i = 0; $i < 20; $i = $i + 1) {
            $numeros[] = rand(1, 100);
        } return $numeros;
    }

    // funcion que ordena array de menor a mayor
    function ordenar($numeros) {
        sort($numeros); //sort ordena de menor a mayor
        return $numeros;
    }

    // funcion que mezcla dos arrays ordenados
    function mezclar($array1, $array2) {
        $resultado = array();

        // indice para recorrer los dos arrays
        $i = 0;
        $j = 0;

        // comparamos los elementos mientras queden en ambos arrays
        while ($i < count($array1) && $j < count($array2)) {

            // añadimos el numero menor al resultado
            if ($array1[$i] <= $array2[$j]) {

                $resultado[] = $array1[$i];

                //avanza el primer array
                $i = $i + 1;

            } else {
                $resultado[] = $array2[$j];

                // avanza el segundo array
                $j = $j + 1;
            }
        }

        // añadimos los elementos restantes del primer array
        while ($i < count($array1)) {
            $resultado[] = $array1[$i];
            $i = $i + 1;
        }

        // añadimos los elementos restantes del segundo array
        while ($j < count($array2)) {
            $resultado[] = $array2[$j];
            $j = $j + 1;
        }

            // Devolvemos el array fusionado
            return $resultado;
    }

        // Programa principal: generamos los dos arrays y los ordenamos
            $array1 = ordenar(cargarArray());
            $array2 = ordenar(cargarArray());

        // Fusionamos los dos arrays ordenados
            $fusion = mezclar($array1, $array2);

        // Mostramos el primer array
            echo "<h3>Primer array</h3>";
            echo implode(", ", $array1);

        // Mostramos el segundo array
            echo "<h3>Segundo array</h3>";
            echo implode(", ", $array2);

        // Mostramos el array fusionado
            echo "<h3>Array fusionado</h3>";
            echo implode(", ", $fusion);
        
    ?>

    <h2>b) Calcular letra del NIF en base al DNI.</h2>

    <?php
  

    ?>










</body>
</html>
