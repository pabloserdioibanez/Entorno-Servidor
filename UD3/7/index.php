
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>

    <!-- Enunciado: Copia los formularios de los ejemplos facilitados en los apuntes, tanto el que
    utiliza el método POST como el que del método GET. Añádele un campo edad y
    observa la URL para poder apreciar cómo se produce el envío de los parámetros -->

    <h2>1.1)Formulario GET</h2>

    <form action="index.php" method="get">

        <!-- campo invisible: dice a php que formulario se envio -->
        <input type="hidden" name="ej" value="1get">

        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="number" name="edad" placeholder="Edad"><br>
        
        <input type="submit" value="Enviar datos">
        
    </form>

    <?php

    // $_GET es un array con los datos de la url (?ej=1get&nombre=Pablo&edad=20)
    // isset: comprueba que la clave existe; sin el, la primera carga daria "undefined array key"
    // === "1get": comprueba que viene de este formulario y no de otro
    // && : si isset falla, no evalua lo siguiente, por eso va primero
    if (isset($_GET["ej"]) && $_GET["ej"] === "1get") {
        $nombre = $_GET["nombre"];
        $edad = $_GET["edad"];


        //htmlspecialchars evita que se ejecute html o js escrito en el campo (xss)
        echo "<p>Nombre: " . htmlspecialchars($nombre) . "<br>Edad: " . htmlspecialchars($edad) . "</p>";
    
    }

    ?>

    <h2>1.2)Formulario POST</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="ej" value="1post">
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="number" name="edad" placeholder="Edad"><br>

        <input type="submit" value="Enviar datos">

    </form>

    <?php
    // igual que get, pero $_POST recoge los datos del cuerpo de la peticion (no salen en la url)
    if (isset($_POST["ej"]) && $_POST["ej"] === "1post") {
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];

        echo "<p>Nombre: " . htmlspecialchars($nombre) . "<br>Edad: " . htmlspecialchars($edad) . "</p>";
    }
    
    ?>
    
    <!-- Enunciado: Crea un formulario HTML para introducir el nombre del alumno y
      a escoger entre dos cosas-->



      <!-- SOLO PIDE HTML -->

    <h2>2.1)Formulario alumno y modulo GET</h2>

    <form action="index.php" method="get">

        <input type="hidden" name="ej" value="2get">
        <input type="text" name="nombre" placeholder="Nombre del alumno"><br>

        <!-- el value de la option es lo que se envia; el texto es lo que ve el usuario -->
        <select name="modulo">
            <option value="DWES">Desarrollo Web en Entorno Servidor</option>
            <option value="DWEC">Desarrollo Web en Entorno Cliente</option>
        </select><br>

        <input type="submit" value="Enviar datos">

    </form>



    <h2>2.2)Formulario alumno y modulo POST</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="ej" value="2post">
        <input type="text" name="nombre" placeholder="Nombre del alumno"><br>

        <!-- el value de la option es lo que se envia; el texto es lo que ve el usuario -->
        <select name="modulo">
            <option value="DWES">Desarrollo Web en Entorno Servidor</option>
            <option value="DWEC">Desarrollo Web en Entorno Cliente</option>
        </select><br>

        <input type="submit" value="Enviar datos">

    </form>



    <!-- Enunciado: Crea el fichero procesa.php para recoger los datos enviados por el formulario del
    ejercicio anterior y muéstralos por pantalla. Hazlo utilizando la variable $_GET y la
    variable $_POST -->
    
    <h2>3) Datos recibidos</h2>

    <?php
        // el value del select es un codigo; este array lo traduce al nombre completo
        $modulos = [
            "DWES" => "Desarrollo Web en Entorno Servidor",
            "DWEC" => "Desarrollo Web en Entorno Cliente"
        ];

        if (isset($_GET["ej"]) && $_GET["ej"] === "2get") {
            $nombre = $_GET["nombre"];

            // ??: si la clave no existe (url manipulada a mano), usa el valor de la derecha
            $modulo = $modulos[$_GET["modulo"]] ?? "Módulo desconocido";

            echo "<h3>Datos recibidos por GET</h3>";
            echo "<p>Alumno: " . htmlspecialchars($nombre) . "<br>Módulo: " . $modulo . "</p>";
        }

        if (isset($_POST["ej"]) && $_POST["ej"] === "2post") {
            $nombre = $_POST["nombre"];
            $modulo = $modulos[$_POST["modulo"]] ?? "Módulo desconocido";

            echo "<h3>Datos recibidos por POST</h3>";
            echo "<p>Alumno: " . htmlspecialchars($nombre) . "<br>Módulo: " . $modulo . "</p>";
        }
    ?>


    <!-- Enunciado: El formulario realizado en el ejercicio2 con el método GET modifícalo para que
    llame al ejercicio4.php y en este ejercicio4 en vez de utilizar la variable $_GET utiliza
    la variable $_REQUEST -->

    <h2>4) Formulario alumno y modulo (REQUEST)</h2>

    <form action="index.php" method="get">

        <input type="hidden" name="ej" value="4">
        <input type="text" name="nombre" placeholder="Nombre del alumno"><br>

        <select name="modulo">
            <option value="DWES">Desarrollo Web en Entorno Servidor</option>
            <option value="DWEC">Desarrollo Web en Entorno Cliente</option>
        </select><br>

        <input type="submit" value="Enviar datos">

    </form>

    <?php
    // $_REQUEST junta $_GET, $_POST y $_COOKIE: sirve igual vengan los datos por get o por post
    // $modulos es el array definido en el ejercicio 3
    if (isset($_REQUEST["ej"]) && $_REQUEST["ej"] === "4") {
        $nombre = $_REQUEST["nombre"];
        $modulo = $modulos[$_REQUEST["modulo"]] ?? "Módulo desconocido";

        echo "<p>Alumno: " . htmlspecialchars($nombre) . "<br>Módulo: " . $modulo . "</p>";
    }
    ?>



    <!-- Enunciado: Realizar una página web completa que contenga un formulario con el método post
    con un cuadro de texto y un botón. Al pulsar, informará de si el número es par o impar,
    con un enlace Volver -->

    <h2>5) COMPROBACIÓN DE SI ES PAR O IMPAR</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="ej" value="5">
        Elige un número entero: <input type="number" name="numero"><br><br>

        <input type="submit" value="Enviar datos">

    </form>

    <?php
    if (isset($_POST["ej"]) && $_POST["ej"] === "5") {
        $numero = $_POST["numero"];

        // filter_var devuelve el entero o false si no lo es
        // se compara con !== false porque el 0 es valido pero cuenta como false con !=
        if (filter_var($numero, FILTER_VALIDATE_INT) !== false) {
            $numero = (int)$numero;

            // % devuelve el resto de la division: si es 0, es par
            $tipo = ($numero % 2 == 0) ? "par" : "impar";

            echo "<p>El número $numero es $tipo</p>";
        } else {
            echo "<p>Debes introducir un número entero</p>";
        }

        // recarga la pagina sin datos, por lo que desaparece el resultado
        echo '<a href="index.php">Volver</a>';
    }
    ?>



    <!-- Enunciado: Realizar una página web que contenga un formulario con un cuadro de texto y un botón.
    Al pulsar, mostrará la tabla de multiplicar de ese número desde el 1 al 10, con enlace Volver -->

    <h2>6) TABLA DE MULTIPLICAR</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="ej" value="6">
        Elige un número entero: <input type="number" name="numero" value="10"><br><br>

        <input type="submit" value="Enviar datos">

    </form>

    <?php
    if (isset($_POST["ej"]) && $_POST["ej"] === "6") {
        $numero = $_POST["numero"];

        if (filter_var($numero, FILTER_VALIDATE_INT) !== false) {
            $numero = (int)$numero;

            echo "TABLA DE MULTIPLICAR DEL $numero:<br>";

            for ($i = 1; $i <= 10; $i++) {
                echo "$i x $numero = " . ($i * $numero) . "<br>";
            }
        } else {
            echo "<p>Debes introducir un número entero</p>";
        }

        echo '<br><a href="index.php">Volver</a>';
    }
    ?>



    <!-- Enunciado: Realizar una página web que contenga un formulario con dos cuadros de texto y un botón.
    Al pulsar, mostrará una lista de pares: desde el menor hasta el mayor el primer número del par,
    y desde el mayor hasta el menor el segundo, con enlace Volver -->

    <h2>7) LISTA DE PARES DE NÚMEROS</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="ej" value="7">
        Elige un número entero menor: <input type="number" name="menor"><br>
        Elige un número entero mayor: <input type="number" name="mayor"><br><br>

        <input type="submit" value="Enviar datos">

    </form>

    <?php
    if (isset($_POST["ej"]) && $_POST["ej"] === "7") {
        $menor = $_POST["menor"];
        $mayor = $_POST["mayor"];

        // se valida que sean enteros y que el menor no supere al mayor
        if (filter_var($menor, FILTER_VALIDATE_INT) !== false
            && filter_var($mayor, FILTER_VALIDATE_INT) !== false
            && (int)$menor <= (int)$mayor) {

            $menor = (int)$menor;
            $mayor = (int)$mayor;

            echo "LISTA DE PARES DE NÚMEROS DE $menor Y $mayor:<br>";

            // dos variables en el for: $i sube y $j baja a la vez
            for ($i = $menor, $j = $mayor; $i <= $mayor; $i++, $j--) {
                echo "($i,$j) ";
            }
        } else {
            echo "<p>Introduce dos enteros y que el menor no sea mayor que el mayor</p>";
        }

        echo '<br><br><a href="index.php">Volver</a>';
    }
    ?>



    <!-- Enunciado: Realizar una página web que contenga un formulario con dos cuadros de texto y cuatro
    botones de radio (suma, resta, producto, cociente). Al pulsar, mostrará el resultado de la operación
    seleccionada, con enlace Volver -->

    <h2>8) OPERACIONES</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="ej" value="8">
        Elige el primer número: <input type="number" name="num1"><br>
        Elige el segundo número: <input type="number" name="num2"><br>

        <!-- los radios comparten name: solo se puede marcar uno y se envia su value -->
        <fieldset>
            <legend>Seleccione la operación:</legend>
            Suma <input type="radio" name="operacion" value="suma" checked>
            Resta <input type="radio" name="operacion" value="resta">
            Producto <input type="radio" name="operacion" value="producto">
            Cociente <input type="radio" name="operacion" value="cociente">
        </fieldset><br>

        <input type="submit" value="Enviar datos">

    </form>

    <?php
    if (isset($_POST["ej"]) && $_POST["ej"] === "8") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operacion = $_POST["operacion"];

        // traduce el value del radio al texto de la frase (con su articulo)
        $nombres = [
            "suma" => "la suma",
            "resta" => "la resta",
            "producto" => "el producto",
            "cociente" => "el cociente"
        ];

        if (filter_var($num1, FILTER_VALIDATE_INT) !== false && filter_var($num2, FILTER_VALIDATE_INT) !== false) {
            $num1 = (int)$num1;
            $num2 = (int)$num2;

            switch ($operacion) {
                case "suma":
                    $resultado = $num1 + $num2;
                    break;
                case "resta":
                    $resultado = $num1 - $num2;
                    break;
                case "producto":
                    $resultado = $num1 * $num2;
                    break;
                case "cociente":
                    // dividir entre 0 da error en php
                    $resultado = ($num2 == 0) ? null : $num1 / $num2;
                    break;
            }

            if ($resultado === null) {
                echo "<p>No se puede dividir entre cero</p>";
            } else {
                echo "<p>El resultado de realizar $nombres[$operacion] de los números $num1 y $num2 es $resultado</p>";
            }
        } else {
            echo "<p>Debes introducir dos números enteros</p>";
        }

        echo '<a href="index.php">Volver</a>';
    }
    ?>

</body>
</html>
