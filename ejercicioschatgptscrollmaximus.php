<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Ejercicios chati</title>
</head>
<body>
    <h1> EJ 1 </h1>

    <?php
        $numeros = array();
        $totalPrimos = 0;

        // Generar 10 numeros aleatorios
        for ($i = 0 ; $i < 10 ; $i++)
        {
            $numeros[$i] = rand(1, 100);

            echo "Numero: " . $numeros[$i] . "\n";
        }

        // Funcion que devuelve true si es primo
        function esPrimo($numero)
        {
            if ($numero < 2)
            {
                return false;
            }

            for ($j = 2 ; $j < $numero ; $j++)
            {
                // Si el resto es 0, tiene un divisor
                if ($numero % $j == 0)
                {
                    return false;
                }
            }

            return true;
        }

        // Comprobar cada numero del array
        foreach ($numeros as $numero)
        {
            if (esPrimo($numero))
            {
                echo $numero . " es primo\n";

                $totalPrimos = $totalPrimos + 1;
            }
        }

        echo "Total de primos: " . $totalPrimos;
    ?>



    <h1> EJ 2 </h1>

    <?php
        // Devuelve 1 si encuentra una mayuscula
        function tieneMayuscula($texto)
        {
            return preg_match('/[A-Z]/', $texto) === 1;
        }

        // Devuelve 1 si encuentra una minuscula
        function tieneMinuscula($texto)
        {
            return preg_match('/[a-z]/', $texto) === 1;
        }

        // Devuelve 1 si encuentra un numero
        function tieneNumero($texto)
        {
            return preg_match('/[0-9]/', $texto) === 1;
        }

        // : bool indica que devuelve true o false
        function validarContrasena(string $contrasena): bool
        {
            // strlen() cuenta los caracteres
            if (strlen($contrasena) < 8)
            {
                return false;
            }

            if (!tieneMayuscula($contrasena))
            {
                return false;
            }

            if (!tieneMinuscula($contrasena))
            {
                return false;
            }

            if (!tieneNumero($contrasena))
            {
                return false;
            }

            return true;
        }

        $contrasena = "Hola1234";

        if (validarContrasena($contrasena))
        {
            echo "Contrasena valida";
        }
        else
        {
            echo "Contrasena no valida";
        }
    ?>
    


    <h1> EJ 3 </h1>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Calculadora</title>
    </head>
    <body>

        <form action="" method="post"> //si no se pone nada en action actua sobre la misma hoja

            <input type="number" name="numero1" step="any" required> // step sirve para permitir cualquier número con decimales
            <input type="number" name="numero2" step="any" required>

            <select name="operacion">
                <option value="suma">Sumar</option>
                <option value="resta">Restar</option>
                <option value="multiplicar">Multiplicar</option>
                <option value="dividir">Dividir</option>
            </select>

            <input type="submit" name="enviar" value="Calcular">

        </form>

        <?php

            // Comprobar si se ha enviado el formulario
            if (isset($_POST['enviar']))
            {
                // (float) convierte los datos a numeros decimales
                $num1 = (float) $_POST['numero1'];
                $num2 = (float) $_POST['numero2'];

                $operacion = $_POST['operacion'];

                switch ($operacion)
                {
                    case "suma":
                        $resultado = $num1 + $num2;
                        break;

                    case "resta":
                        $resultado = $num1 - $num2;
                        break;

                    case "multiplicar":
                        $resultado = $num1 * $num2;
                        break;

                    case "dividir":

                        if ($num2 == 0)
                        {
                            echo "No se puede dividir entre 0";
                            break;
                        }

                        $resultado = $num1 / $num2;
                        break;

                    default:
                        echo "Operacion no valida";
                        break;
                }

                // Mostrar solo si se ha calculado un resultado
                if (isset($resultado))
                {
                    echo "Resultado: " . $resultado;
                }
            }

        ?>

    </body>
    </html>


return	Termina una función	Cuando ya tienes un resultado o detectas un error
break	Sale de un bucle o switch	Cuando quieres dejar de repetir o terminar un caso
exit	Detiene todo el programa PHP	Cuando no quieres ejecutar nada más 

</body>
</html>