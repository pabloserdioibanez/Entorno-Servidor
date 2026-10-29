
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
        // Funcion que calcula la letra correspondiente al DNI
        function calcularLetra($dni) {

            // Cadena con las letras en el orden establecido
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

            // Calculamos el resto de dividir el DNI entre 23
            $resto = $dni % 23;

            // Devolvemos la letra situada en la posicion del resto
            return $letras[$resto];
        }

        // DNI que queremos comprobar
        $dni = 12345678;

        // Llamamos a la funcion para obtener la letra
        $letra = calcularLetra($dni);

        // Mostramos el DNI junto con su letra
        echo "El DNI es: " . $dni . "<br>";
        echo "La letra del NIF es: " . $letra . "<br>";
        echo "El NIF completo es: " . $dni . $letra;
    ?>

    <h2>c) foreach para mostrar todos los valores del array en una tabla
        con dos columnas. 1ª NombreVariable 2ª Valor
    </h2>


    // se crea la tabla con dos columnas
    <table border="1">

        // primera fila: nombres de las columnas
        <tr>
            <th>Variable</th>
            <th>Valor</th>
        </tr>

        <?php

        // Recorremos el array $_SERVER con foreach
        // $nombre guarda el nombre de cada variable
        // $valor guarda el contenido de esa variable
        foreach ($_SERVER as $nombre => $valor) {

            // Mostramos una fila por cada variable
            echo "<tr>";

            // Mostramos el nombre de la variable en la primera columna
            echo "<td>" . $nombre . "</td>";

            // Mostramos el valor de la variable en la segunda columna
            echo "<td>" . $valor . "</td>";

            // Cerramos la fila de la tabla
            echo "</tr>";
        }

        ?>

    </table>

    <h4>d) Modifica el último programa realizado para obtener la fecha en castellano, de
        forma que prescinda de las estructuras switch-case y en su lugar almacene los
        nombres de los meses y días de la semana en sendos arrays. El programa
        deberá calcular la fecha en castellano en una función, y mostrarla por pantalla
        desde el programa principal. </h4>


    <h5>Fecha actual en castellano</h5>

    <?php

        // Creamos una funcion que devuelve la fecha en castellano
        function fechaCastellano() {

            // Guardamos los dias de la semana en un array
            // PHP considera que el domingo es el dia 0
            $dias = array(
                "Domingo", "Lunes", "Martes", "Miercoles",
                "Jueves", "Viernes", "Sabado"
            );

            // Guardamos los meses del anio en otro array
            // Enero ocupa la posicion 0 y diciembre la posicion 11
            $meses = array(
                "Enero", "Febrero", "Marzo", "Abril",
                "Mayo", "Junio", "Julio", "Agosto",
                "Septiembre", "Octubre", "Noviembre", "Diciembre"
            );

            // Obtenemos el numero del dia de la semana
            // date("w") devuelve un numero entre 0 y 6
            $numeroDia = date("w");

            // Obtenemos el numero del dia del mes
            // date("d") devuelve el dia del mes
            $dia = date("d");

            // Obtenemos el numero del mes
            // date("n") devuelve un numero entre 1 y 12
            $numeroMes = date("n");

            // Obtenemos el anio actual
            $anio = date("Y");

            // Buscamos el nombre del dia en el array
            $nombreDia = $dias[$numeroDia];

            // Restamos 1 al mes porque los arrays empiezan en 0
            $nombreMes = $meses[$numeroMes - 1];

            // Unimos todas las partes de la fecha en un texto
            $fecha = $nombreDia . ", " . $dia . " de " .
                    $nombreMes . " de " . $anio;

            // Devolvemos la fecha completa
            return $fecha;
        }

        // Programa principal: llamamos a la funcion y mostramos el resultado
        echo fechaCastellano();

    ?>


    <h5>e) Crea un array asociativo de países y capitales inicializándolo con los principales
    países y capitales europeas. Llama al array “mapa”.
    Visualiza el array con la función print_r.
    Muestra la capital de Italia.
    Averigua si está contenida Rusia.
    Recorre el array mediante un bucle foreach para visualizar todo su contenido.
    Elimina a Francia de la lista.
    Vuelve a mostrar el contenido del array con foreach.
    Muestra el país cuya capital es Lisboa.
    </h5>

    <?php

    // Array asociativo pais => capital
    $mapa = array(
                "Italia"    => "Roma",
                "Francia"   => "París",
                "Portugal"  => "Lisboa",
                "España"    => "Madrid",
                "Alemania"  => "Berlín",
                "Rusia"     => "Moscú"
            );

    print_r($mapa);

    echo "<br>";

    //capital de italia:
    echo "Capital de italia: " . $mapa["Italia"] . "<br>";

    //esta rusia?
    if (array_key_exists("Rusia", $mapa)) {
        echo "Rusia esta en el array de mapa";
    } else {
        echo ("No esta");
    }

    //recorrer con foreach
    echo "<h4> Contenido del array: </h4>";
    foreach ($mapa as $pais => $capital) {
    echo "$pais => $capital<br>";
    }

    // Eliminar Francia
    unset($mapa["Francia"]);

    // Volver a mostrar
    echo "<h4>Después de eliminar Francia:</h4>";
    foreach ($mapa as $pais => $capital) {
        echo "$pais => $capital<br>";
    }

    // País cuya capital es Lisboa
    $inverso = array_flip($mapa);
    echo "País cuya capital es Lisboa: " . $inverso["Lisboa"] . "<br>";



    ?>


    <h3>f) Escribe una función que reciba un array de números, y un número, el límite. La
        función tiene que devolver un nuevo array que contenga solo los elementos del
        array original menores que el límite.  <h3>


    <?php

        function menoresQueLimite($numeros, $limite) {

            // Creamos un array vacio para guardar los numeros menores
            $resultado = array();

            // Recorremos todos los numeros del array original
            foreach ($numeros as $numero) {

                // Comprobamos si el numero es menor que el limite
                if ($numero < $limite) {

                    // Si es menor, lo aniadimos al nuevo array
                    $resultado[] = $numero;
                }
            }

            // Devolvemos el array con los numeros seleccionados
            return $resultado;
        }

        // Creamos un array de ejemplo
        $numeros = array(4, 12, 7, 20, 3, 15, 9);

        // Indicamos el limite que vamos a utilizar
        $limite = 10;

        // Llamamos a la funcion y guardamos el resultado
        $resultado = menoresQueLimite($numeros, $limite);

        // Mostramos el array original
        echo "<h5>Array original</h5>";
        echo implode(", ", $numeros);

        // Mostramos el limite utilizado
        echo "<h5>Limite</h5>";
        echo $limite;

        // Mostramos el nuevo array con los numeros menores
        echo "<h5>Numeros menores que el limite</h5>";
        echo implode(", ", $resultado);

    ?>

    
    <h3>g) Escribe una función que reciba una cadena y compruebe si es un palíndromo.
    Realiza varias llamadas a la función para comprobar su comportamiento.</h3>


   <?php
    function esPalindromo(string $cadena): bool
    {
        $limpia = strtolower(str_replace(" ", "", $cadena));
        return $limpia === strrev($limpia);
    }

    // Llamadas de prueba
    $pruebas = [
        "anita lava la tina",
        "hola",
        "oso",
        "radar",
        "abc",
    ];

    foreach ($pruebas as $p) {
    $resultado = esPalindromo($p) ? "SÍ" : "NO";
    echo "\"$p\" → $resultado\n";
    }


    ?>

    <h3>h) Un programa que conjugue un verbo terminado en -ar en tres tiempos verbales:</h3>

    <h2>Conjugacion de verbos</h2> 
    
    <?php

    // Creamos un array con diez verbos terminados en -ar
    $verbos = array(
        "amar", "cantar", "bailar", "estudiar", "trabajar",
        "saltar", "hablar", "mirar", "comprar", "caminar"
    );

    // Guardamos las terminaciones del presente
    $presente = array("o", "as", "a", "amos", "ais", "an");

    // Guardamos las terminaciones del pasado
    $pasado = array("e", "aste", "o", "amos", "asteis", "aron");

    // Guardamos las terminaciones del futuro
    $futuro = array("are", "aras", "ara", "aremos", "areis", "aran");

    // Guardamos los pronombres personales
    $personas = array(
        "Yo", "Tu", "El/Ella", "Nosotros",
        "Vosotros", "Ellos/Ellas"
    );

    // Funcion que muestra un verbo con sus terminaciones
    function conjugar($raiz, $terminaciones, $personas) {

        // Recorremos todas las terminaciones del tiempo verbal
        for ($i = 0; $i < count($terminaciones); $i = $i + 1) {

            // Mostramos el pronombre personal
            echo $personas[$i] . ": ";

            // Unimos la raiz del verbo con su terminacion
            echo $raiz . $terminaciones[$i] . "<br>";
        }
    }

    // Elegimos un verbo aleatorio del array
    $posicion = array_rand($verbos);

    // Guardamos el verbo elegido
    $verbo = $verbos[$posicion];

    // Quitamos las dos ultimas letras (-ar) para obtener la raiz
    $raiz = substr($verbo, 0, -2);

    // Mostramos el verbo seleccionado
    echo "<h2>Verbo elegido: " . $verbo . "</h2>";

    // Mostramos el presente
    echo "<h3>Presente</h3>";
    conjugar($raiz, $presente, $personas);

    // Mostramos el pasado
    echo "<h3>Pasado</h3>";
    conjugar($raiz, $pasado, $personas);

    // Mostramos el futuro
    echo "<h3>Futuro</h3>";
    conjugar($raiz, $futuro, $personas);

    ?>

</body>
</html>
