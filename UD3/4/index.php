
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>

    <h1>a) Calculadora de IMC</h1>

    <?php
    // Funcion que calcula el IMC
    function calcularIMC($peso, $altura) {
        return $peso / ($altura * $altura);
    }

    // Funcion que interpreta el resultado del IMC
    function interpretarIMC($imc) {

        if ($imc < 18.5) {
            return "Bajo peso";
        } else if ($imc < 25) {
            return "Peso normal";
        } else if ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidad";
        }
    }


    echo "=== CALCULADORA DE IMC ===<br><br>";

    // Caso 1: Persona con peso normal
    $nombre1 = "Juan";
    $peso1 = 70;
    $altura1 = 1.75;

    $imc1 = calcularIMC($peso1, $altura1);

    echo "Paciente: " . $nombre1 . "<br>";
    echo "Peso: " . $peso1 . " kg<br>";
    echo "Altura: " . $altura1 . " m<br>";
    echo "IMC: " . number_format($imc1, 2) . "<br>";
    echo "Diagnostico: " . interpretarIMC($imc1) . "<br>";
    echo "-----------------------------------<br><br>";

    // Caso 2: Persona con bajo peso
    $nombre2 = "Ana";
    $peso2 = 45;
    $altura2 = 1.70;

    $imc2 = calcularIMC($peso2, $altura2);

    echo "Paciente: " . $nombre2 . "<br>";
    echo "Peso: " . $peso2 . " kg<br>";
    echo "Altura: " . $altura2 . " m<br>";
    echo "IMC: " . number_format($imc2, 2) . "<br>";
    echo "Diagnostico: " . interpretarIMC($imc2) . "<br>";
    echo "-----------------------------------<br><br>";

    // Caso 3: Persona con sobrepeso
    $nombre3 = "Carlos";
    $peso3 = 85;
    $altura3 = 1.75;

    $imc3 = calcularIMC($peso3, $altura3);

    echo "Paciente: " . $nombre3 . "<br>";
    echo "Peso: " . $peso3 . " kg<br>";
    echo "Altura: " . $altura3 . " m<br>";
    echo "IMC: " . number_format($imc3, 2) . "<br>";
    echo "Diagnostico: " . interpretarIMC($imc3) . "<br>";
    echo "-----------------------------------<br><br>";

    // Caso 4: Persona con obesidad
    $nombre4 = "Pedro";
    $peso4 = 100;
    $altura4 = 1.70;

    $imc4 = calcularIMC($peso4, $altura4);

    echo "Paciente: " . $nombre4 . "<br>";
    echo "Peso: " . $peso4 . " kg<br>";
    echo "Altura: " . $altura4 . " m<br>";
    echo "IMC: " . number_format($imc4, 2) . "<br>";
    echo "Diagnostico: " . interpretarIMC($imc4) . "<br>";
    ?>

    <h1>b) Validador de contrasenas</h1>

    <?php
    // Funcion que comprueba si hay alguna letra minuscula
    function tieneMinuscula($contrasena) {
        return preg_match("/[a-z]/", $contrasena) === 1;
    }

    // Funcion que comprueba si hay alguna letra mayuscula
    function tieneMayuscula($contrasena) {
        return preg_match("/[A-Z]/", $contrasena) === 1;
    }

    // Funcion que comprueba si hay algun numero
    function tieneNumero($contrasena) {
        return preg_match("/[0-9]/", $contrasena) === 1;
    }

    // Funcion que valida la contrasena completa
    function validarContrasena($contrasena) {
        return strlen($contrasena) >= 8
            && tieneMinuscula($contrasena)
            && tieneMayuscula($contrasena)
            && tieneNumero($contrasena);
    }

    // Probamos la contraseña
    echo "=== VALIDADOR DE CONTRASENAS ===<br>";
    $pass = "Abc12345";

    echo "Contrasena: '" . $pass . "'<br>";
    echo "Longitud: " . strlen($pass) . " caracteres<br>";
    echo "Tiene minuscula: " . (tieneMinuscula($pass) ? "Si" : "No") . "<br>";
    echo "Tiene mayuscula: " . (tieneMayuscula($pass) ? "Si" : "No") . "<br>";
    echo "Tiene numero: " . (tieneNumero($pass) ? "Si" : "No") . "<br>";
    echo "Estado: " . (validarContrasena($pass) ? "VALIDA" : "NO VALIDA") . "<br>";
    ?>

    <br>

    <h1>c) Cajero automatico</h1>

    <?php
    // Funcion que retira dinero si hay saldo suficiente
    function retirarDinero(&$saldo, $cantidad) {
        if ($cantidad <= 0 || $saldo < $cantidad) {
            return false;
        }

        $saldo = $saldo - $cantidad;
        return true;
    }

    // Funcion que deposita dinero
    function depositarDinero(&$saldo, $cantidad) {
        if ($cantidad > 0) {
            $saldo = $saldo + $cantidad;
        }
    }

    // Funcion que aplica una comision porcentual
    function aplicarComision(&$saldo, $porcentaje) {
        if ($porcentaje >= 0) {
            $saldo = $saldo - ($saldo * $porcentaje / 100);
        }
    }

    // Funcion que transfiere dinero entre dos cuentas
    function transferir(&$saldoOrigen, &$saldoDestino, $cantidad) {
        if ($cantidad <= 0 || $saldoOrigen < $cantidad) {
            return false;
        }

        $saldoOrigen = $saldoOrigen - $cantidad;
        $saldoDestino = $saldoDestino + $cantidad;

        return true;
    }

    // Saldos iniciales
    $miCuenta = 1000;
    $cuentaAmigo = 500;

    echo "Saldo inicial: $" . $miCuenta . "<br>";

    // Realizamos un ingreso
    depositarDinero($miCuenta, 200);
    echo "Despues de depositar $200: $" . $miCuenta . "<br>";

    // Realizamos una retirada
    if (retirarDinero($miCuenta, 150)) {
        echo "Retiro exitoso. Saldo actual: $" . $miCuenta . "<br>";
    } else {
        echo "No hay saldo suficiente.<br>";
    }

    // Aplicamos una comision del 2 por ciento
    aplicarComision($miCuenta, 2);
    echo "Despues de comision del 2%: $" . $miCuenta . "<br>";

    // Transferimos dinero a la cuenta del amigo
    if (transferir($miCuenta, $cuentaAmigo, 300)) {
        echo "Transferencia exitosa<br>";
        echo "Mi cuenta: $" . $miCuenta . "<br>";
        echo "Cuenta amigo: $" . $cuentaAmigo . "<br>";
    } else {
        echo "No se pudo realizar la transferencia.<br>";
    }
    ?>

    <br>

    <h1>d) Validador de cuenta corriente</h1>

    <?php
    // Funcion que comprueba si el formato de la cuenta es correcto
    function formatoValido($cuenta) {
        return preg_match(
            "/^[0-9]{4}-[0-9]{4}-[0-9]{2}-[0-9]{10}$/",
            $cuenta
        ) === 1;
    }

    // Funcion que calcula un digito de control a partir de 10 digitos
    function calcularDigito($numeros) {
        $pesos = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);
        $suma = 0;

        // Multiplicamos cada cifra por su peso
        for ($i = 0; $i < 10; $i = $i + 1) {
            $suma = $suma + ((int)$numeros[$i] * $pesos[$i]);
        }

        // Calculamos el digito de control
        $digito = 11 - ($suma % 11);

        if ($digito == 11) {
            $digito = 0;
        } else if ($digito == 10) {
            $digito = 1;
        }

        return $digito;
    }

    // Funcion que calcula los dos digitos de control
    function calcularDigitosControl($entidad, $oficina, $cuenta) {
        $primerosDigitos = "00" . $entidad . $oficina;

        $primerDigito = calcularDigito($primerosDigitos);
        $segundoDigito = calcularDigito($cuenta);

        return $primerDigito . $segundoDigito;
    }

    // Funcion que valida la cuenta corriente completa
    function validarCuenta($cuentaCorriente) {
        // Primero comprobamos el formato
        if (!formatoValido($cuentaCorriente)) {
            return false;
        }

        // Extraemos los datos de la cuenta
        $entidad = substr($cuentaCorriente, 0, 4);
        $oficina = substr($cuentaCorriente, 5, 4);
        $control = substr($cuentaCorriente, 10, 2);
        $cuenta = substr($cuentaCorriente, 13, 10);

        // Comparamos los digitos indicados con los calculados
        $controlCalculado = calcularDigitosControl(
            $entidad,
            $oficina,
            $cuenta
        );

        return $control === $controlCalculado;
    }

    // Probamos una cuenta corriente
    echo "=== VALIDADOR DE CUENTA CORRIENTE ===<br>";

    $cc = "2077-0024-00-3102575766";

    // Extraemos las partes de la cuenta
    $entidad = substr($cc, 0, 4);
    $oficina = substr($cc, 5, 4);
    $control = substr($cc, 10, 2);
    $cuenta = substr($cc, 13, 10);

    echo "Cuenta: " . $cc . "<br>";
    echo "Entidad: " . $entidad . "<br>";
    echo "Oficina: " . $oficina . "<br>";
    echo "Numero de cuenta: " . $cuenta . "<br>";
    echo "Digitos de control: " . $control . "<br>";

    // Solo calculamos los digitos si el formato es correcto
    if (formatoValido($cc)) {
        echo "Digitos de control calculados: "
            . calcularDigitosControl($entidad, $oficina, $cuenta) . "<br>";
    } else {
        echo "Formato incorrecto.<br>";
    }

    echo "Estado: " . (validarCuenta($cc) ? "CORRECTA" : "INCORRECTA") . "<br>";
    ?>

    <br>

    <h1>e) Trabajar con cadenas</h1>

    <?php
    // Creamos la cadena de texto
    $texto = "Comer algas es realmente sano";

    echo "Cadena original: " . $texto . "<br>";

    // Buscamos la posicion de la palabra algas
    $posicion = strpos($texto, "algas");
    echo "Posicion de algas: " . $posicion . "<br>";

    // Reemplazamos realmente por muy
    $textoModificado = str_replace("realmente", "muy", $texto);
    echo "Texto modificado: " . $textoModificado . "<br>";

    // Comprobamos si existe la palabra anacardo
    if (strpos($texto, "anacardo") !== false) {
        echo "La palabra anacardo existe en la cadena.<br>";
    } else {
        echo "La palabra anacardo no existe en la cadena.<br>";
    }

    // Invertimos el orden del texto
    echo "Texto invertido: " . strrev($texto) . "<br>";

    // Contamos las vocales e minusculas
    echo "Cantidad de vocales e: " . substr_count($texto, "e") . "<br>";
    ?>

</body>
</html>
