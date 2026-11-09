<?php
// CHULETA DE EXAMEN - PHP UNIDAD 3
// Archivo de consulta: busca por actividad o palabra con Ctrl + F.
// Cada ejercicio es INDEPENDIENTE. Copia el bloque necesario.
// Los titulos usan palabras clave para encontrar soluciones con Ctrl + F.
__halt_compiler();
?>


============================================================================
 ACTIVIDAD 3.1  |  BUCLES, SERIES Y NUMEROS
============================================================================


----------------------------------------------------------------------------
 3.1 | SUMAR NUMEROS PARES ENTRE 10 Y 100
----------------------------------------------------------------------------
<?php
	$suma = 0;
	for($i=10;$i<=100;$i++)
	{
		if($i%2==0)
		$suma+=$i;
	}
	echo "El resultado de la suma es $suma";
?>


----------------------------------------------------------------------------
 3.1 | COMPROBAR SI UN NUMERO ES CAPICUA
----------------------------------------------------------------------------
<?php
	$numero = 313;

	$unidad = $numero%10;
	// Redondea hacia abajo.
	$centena = floor($numero/100);

	if ($unidad == $centena)
	{
		echo "El numero $numero es capicua<br />";
	}
	else
	{
		echo "El numero $numero NO es capicua<br />";
	}

	//Capicua generico
	$numero = 4774;
	$inverso = 0;
	$aux = $numero;
	while ( $aux != 0)
	{
		$resto = $aux % 10;
		$inverso = $inverso * 10 + $resto;
		$aux = (int)($aux / 10);
	}
	if ( $numero == $inverso )
		echo "El numero $numero es capicua<br />";
	else
		echo "El numero $numero NO es capicua<br />";

?>


----------------------------------------------------------------------------
 3.1 | BUSCAR NUMEROS CAPICUA DE 3 CIFRAS
----------------------------------------------------------------------------
<?php
	for ($i=100;$i<=999;$i++){
		$centena=(int)($i/100);
		$unidad= $i%10;
		if ($centena==$unidad)
			echo $i."<br>";
	}
?>


----------------------------------------------------------------------------
 3.1 | BUSCAR NUMEROS CAPICUA DE 3 CIFRAS - ALTERNATIVA
----------------------------------------------------------------------------
<?php
	$numero = 100;
	while ($numero <= 999)
	{
		$inverso = 0;
		$aux = $numero;
		while ( $aux != 0)
		{
			$resto = $aux % 10;
			$inverso = $inverso * 10 + $resto;
			$aux = (int)($aux / 10);
		}
		if ( $numero == $inverso )
		echo "$numero, ";
		$numero++;
	}
?>


----------------------------------------------------------------------------
 3.1 | SUMA DE DIGITOS IGUAL AL PRODUCTO
----------------------------------------------------------------------------
<?php
	for ($i=100;$i<999;$i++){
		$centena = (int)($i/100);
		$decena = (int)(($i%100)/10);
		$unidad = $i%10;
		$suma=$unidad+$decena+$centena;
		$producto=$unidad*$decena*$centena;
		if ($suma==$producto)
			echo $i."<br>";
	}
?>


----------------------------------------------------------------------------
 3.1 | E-FIBON1
----------------------------------------------------------------------------
<!-- Serie de numeros de Fibonacci de los numeros menores de 200, usando un bucle while. -->

<?php
	$num1 = 0;
    $num2 = 1;

	echo $num1."<br>";
	echo $num2."<br>";
      while ($num1 + $num2 < 200) {

        $suma = $num1 + $num2;
        $num1 = $num2;
        $num2 = $suma;

        echo $suma. "<br>";

    };

?>


----------------------------------------------------------------------------
 3.1 | SERIE DE FIBONACCI - ALTERNATIVA
----------------------------------------------------------------------------
<?php
	$numero = 0;
	$numero2 = 1;
	echo $numero."<br>";
	$i=0;
	while ($numero2 < 200) {
		echo $numero2."<br>";
		$numero2 += $numero;
		$numero = $numero2 - $numero;
		$i++;
	}
	echo "<br> son $i terminos";
?>


----------------------------------------------------------------------------
 3.1 | GENERAR SERIE CON POTENCIAS
----------------------------------------------------------------------------
<?php
	for ($i=1,$z=2;$i<=10;$i++){
		echo "$i/$z, ";
		$z=2*$z;
	}
?>


----------------------------------------------------------------------------
 3.1 | TABLA DE MULTIPLICAR CON FILAS DE COLORES
----------------------------------------------------------------------------
<?php
	echo "<table border='1'>";
	$numero=5;

	for($i=1;$i <= 10;$i++){
		$res=$numero*$i;
		if ($i%2==0)
			{$color="red";}
		else
			{$color="blue";}

		echo"<tr bgcolor=$color>";
		echo "<td> $numero </td>";
		echo "<td>x</td>";
		echo "<td>$i</td>";
		echo "<td>=</td>";
		echo "<td>$res</td>";
		echo"</tr>";
	}
	echo "</table>";
?>


----------------------------------------------------------------------------
 3.1 | DIBUJAR TRIANGULO CRECIENTE
----------------------------------------------------------------------------
<?php
	for ($i=1;$i<=10;$i++){
		for ($z=1;$z<=$i;$z++)
			echo "$z ";
		echo "<br>";
	}
?>


----------------------------------------------------------------------------
 3.1 | DIBUJAR TRIANGULO DECRECIENTE
----------------------------------------------------------------------------
<?php
	for ($i=10;$i>=1;$i--){
		for ($z=$i;$z>=1;$z--)
			echo "$z ";
		echo "<br>";
	}
?>


----------------------------------------------------------------------------
 3.1 | COMPROBAR SI UN NUMERO ES PRIMO
----------------------------------------------------------------------------
<?php
	$n=67;
	$primo=true;
	for ($i=2;$i<$n;$i++){
		//echo $i."<br>";
		if ($n%$i==0){
			$primo=false;
			break;
		}
	}
	if ($primo && $n!=1) echo $n." es numero primo.<br>";
	else echo $n." no es numero primo.<br>";
?>


----------------------------------------------------------------------------
 3.1 | MOSTRAR NUMEROS PRIMOS ENTRE 3 Y 999
----------------------------------------------------------------------------
<?php
	//12.- Obtener los numeros primos entre 3 y 999.
	for($numero=3; $numero<=999;$numero++)
	{
		$primo = true;
		// Calcula la raiz cuadrada.
		for ($i = 2; $i <= sqrt($numero) && $primo; $i++)
		{
			if ($numero % $i == 0)
			{
				$primo = false;
			}
		}
		echo $primo ? "$numero es primo<br/>" : "";
	}

?>


----------------------------------------------------------------------------
 3.1 | CALCULAR PRECIO VIAJE DESCUENTO Y RECARGO
----------------------------------------------------------------------------
<?php
	$distancia=40;
	$estancia=8;
	define ("PKM",2.5);
	define ("PEST",10);
	$pvp=2*$distancia*PKM+$estancia*PEST;
	if ($estancia>7 && $distancia>800)
		$pvp=0.70*$pvp;
	if ($distancia<50)
		$pvp=1.10*$pvp;
	echo "Su viaje de $estancia dias a $distancia km. tiene un coste total de $pvp €.";
?>


============================================================================
 ACTIVIDAD 3.2  |  FACTORIAL Y FECHA
============================================================================


----------------------------------------------------------------------------
 3.2 | CALCULAR FACTORIAL DE UN NUMERO
----------------------------------------------------------------------------
<?php
    $numero = 5;
	$factorial = 1;
    if (!is_int($numero) || $numero<0)
		echo "El factorial no esta definido para $numero";
	else {
		for ($i = 1; $i <= $numero; $i++){
			$factorial = $factorial * $i;
		}
		echo "Factorial de $numero  = $factorial";
	}
?>


----------------------------------------------------------------------------
 3.2 | MOSTRAR FECHA EN CASTELLANO CON MATCH
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Fecha en castellano</title>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Madrid');
			// Formatea una fecha: d=dia, m=mes, Y=anio, l=dia semana.
			$numero_mes = date("m");
			$numero_dia_semana = date("N");
			$mes = match($numero_mes){
				"1" => "Enero",
				"2" => "Febrero",
				"3" => "Marzo",
				"4" => "Abril",
				"5" => "Mayo",
				"6" => "Junio",
				"7" => "Julio",
				"8" => "Agosto",
				"9" => "Septiembre",
				"10" => "Octubre",
				"11" => "Noviembre",
				"12" => "Diciembre",
				default => "Dia invalido",
			};
			$dia_semana = match($numero_dia_semana){
				"1" => "Lunes",
				"2" => "Martes",
				"3" => "Miercoles",
				"4" => "Jueves",
				"5" => "Viernes",
				"6" => "Sabado",
				"7" => "Domingo",
				default => "Dia invalido",
			};
			print "Hoy es: ".$dia_semana.", ".date("j")." de ".$mes." de ".date("Y");
		?>
	</body>
</html>


----------------------------------------------------------------------------
 3.2 | MOSTRAR FECHA EN CASTELLANO
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Fecha en castellano</title>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Madrid');
			// Formatea una fecha: d=dia, m=mes, Y=anio, l=dia semana.
			$numero_mes = date("m");
			$numero_dia_semana = date("N");
			switch($numero_mes){
				case 1: $mes = "Enero";
					break;
				case 2: $mes = "Febrero";
					break;
				case 3: $mes = "Marzo";
					break;
				case 4: $mes = "Abril";
					break;
				case 5: $mes = "Mayo";
					break;
				case 6: $mes = "Junio";
					break;
				case 7: $mes = "Julio";
					break;
				case 8: $mes = "Agosto";
					break;
				case 9: $mes = "Septiembre";
					break;
				case 10: $mes = "Octubre";
					break;
				case 11: $mes = "Noviembre";
					break;
				case 12: $mes = "Diciembre";
					break;
			}
			switch($numero_dia_semana){
				case 1: $dia_semana = "Lunes";
					break;
				case 2: $dia_semana = "Martes";
					break;
				case 3: $dia_semana = "Miercoles";
					break;
				case 4: $dia_semana = "Jueves";
					break;
				case 5: $dia_semana = "Viernes";
					break;
				case 6: $dia_semana = "Sabado";
					break;
				case 7: $dia_semana = "Domingo";
					break;
			}
			print "Hoy es: ".$dia_semana.", ".date("j")." de ".$mes." de ".date("Y");
		?>
	</body>
</html>


============================================================================
 ACTIVIDAD 3.3  |  FUNCIONES
============================================================================


----------------------------------------------------------------------------
 3.3 | VALIDAR FECHA
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <title>Comprobar Fecha</title>
    </head>
    <body>
        <?php
            // function define una funcion reutilizable; return devuelve su resultado.
            function comprobarFecha($fecha)
            {
                // Extrae una parte de una cadena.
                $dia = (int) substr(($fecha), 0, 2);
                $mes = (int) substr(($fecha), 3, 2);
                $ano = (int) substr(($fecha), 6, 4);

                // Comprueba si una fecha es valida.
                return checkdate($mes, $dia, $ano);
            }

            $fecha = "22-09-2023";
            echo "La fecha $fecha es";
            echo comprobarFecha($fecha) ? " correcta" : " incorrecta";

            $fecha = "30-02-2023";
            echo "<br />La fecha $fecha es";
            echo comprobarFecha($fecha) ? " correcta" : " incorrecta";

        ?>
    </body>
</html>


----------------------------------------------------------------------------
 3.3 | CONVERTIR FECHA A CASTELLANO
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Fecha en castellano</title>
	</head>
	<body>
		<?php
			include 'funciones.php';
			print "Hoy es: ".fecha();
		?>
	</body>
</html>


----------------------------------------------------------------------------
 3.3 | EJEMPLOS DE FUNCIONES PHP
----------------------------------------------------------------------------
<?php
	//Funcion que devuelve un texto con la fecha actual en castellano
	// function define una funcion reutilizable; return devuelve su resultado.
	function fecha(){
		date_default_timezone_set('Europe/Madrid');
		// Formatea una fecha: d=dia, m=mes, Y=anio, l=dia semana.
		$numero_mes = date("m");
		$numero_dia_semana = date("N");
		switch($numero_mes){
			case 1: $mes = "Enero";
				break;
			case 2: $mes = "Febrero";
				break;
			case 3: $mes = "Marzo";
				break;
			case 4: $mes = "Abril";
				break;
			case 5: $mes = "Mayo";
				break;
			case 6: $mes = "Junio";
				break;
			case 7: $mes = "Julio";
				break;
			case 8: $mes = "Agosto";
				break;
			case 9: $mes = "Septiembre";
				break;
			case 10: $mes = "Octubre";
				break;
			case 11: $mes = "Noviembre";
				break;
			case 12: $mes = "Diciembre";
				break;
		}
		switch($numero_dia_semana){
			case 1: $dia_semana = "Lunes";
				break;
			case 2: $dia_semana = "Martes";
				break;
			case 3: $dia_semana = "Miercoles";
				break;
			case 4: $dia_semana = "Jueves";
				break;
			case 5: $dia_semana = "Viernes";
				break;
			case 6: $dia_semana = "Sabado";
				break;
			case 7: $dia_semana = "Domingo";
				break;
		}
		return $dia_semana.", ".date("j")." de ".$mes." de ".date("Y");
	}
?>


----------------------------------------------------------------------------
 3.3 | FUNCION FACTORIAL
----------------------------------------------------------------------------
<?php
    // function define una funcion reutilizable; return devuelve su resultado.
    function factorial ($numero) {
		$factorial = 1;
		if (!is_integer($numero) || $numero<0)
			return -1;
		else {
			for ($i = 1; $i <= $numero; $i++){
				$factorial = $factorial * $i;
			}
			return $factorial;
		}
	}

	$numero = -3;
	echo "<br>Factorial de $numero  = ".factorial($numero);
	$numero = "hola";
	echo "<br>Factorial de $numero  = ".factorial($numero);
	$numero = 0;
	echo "<br>Factorial de $numero  = ".factorial($numero);
	$numero = 5;
	echo "<br>Factorial de $numero  = ".factorial($numero);
	$numero = 20;
	echo "<br>Factorial de $numero  = ".factorial($numero);
?>


----------------------------------------------------------------------------
 3.3 | FUNCION IMPRIMIR
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <title>Funcion imprimir</title>
    </head>
    <body>
        <?php
            // function define una funcion reutilizable; return devuelve su resultado.
            function muestraMensaje($mensaje)
            {
                return "El mensaje pasado como parametro es: <strong>$mensaje</strong>";
            }
            echo muestraMensaje("Estamos en clase de DWES");
        ?>
    </body>
</html>


----------------------------------------------------------------------------
 3.3 | FUNCION POTENCIA
----------------------------------------------------------------------------
<?php
    // function define una funcion reutilizable; return devuelve su resultado.
    function potencia ($base, $exponente=2) {
		if (!is_integer($base) || !is_integer($exponente) || $exponente<0)
			return false;
		else {
			$resultado = 1;
			for ($i = 1; $i <= $exponente; $i++)
				$resultado = $resultado * $base;
			return $resultado;
		}
	}

	$base = 2;
	$exponente = 3;
	$resultado=potencia($base, $exponente);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
	$base = 4;
	$exponente = 2;
	$resultado=potencia($base);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
	$base = -3;
	$exponente = 0;
	$resultado=potencia($base, $exponente);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
	$base = -2;
	$exponente = 3;
	$resultado=potencia($base, $exponente);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
	$base = 2;
	$exponente = -1;
	$resultado=potencia($base, $exponente);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
	$base = "hola";
	$exponente = 4;
	$resultado=potencia($base, $exponente);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
	$base = 2;
	$exponente = "z";
	$resultado=potencia($base, $exponente);
	if ($resultado)
		echo "<br>Potencia: ($base)^$exponente  = ".$resultado;
	else
		echo "<br>Error en los datos de entrada: ($base)^$exponente";
?>


----------------------------------------------------------------------------
 3.3 | FUNCION SUMAR
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <title>Funcion suma</title>
    </head>
    <body>
        <?php
            // function define una funcion reutilizable; return devuelve su resultado.
            function sumar($a, int $b)
            {
                return $a + $b;
            }

            echo sumar(5,3);
        ?>
    </body>
</html>


----------------------------------------------------------------------------
 3.3 | COMPROBACIONES Y VALIDACIONES
----------------------------------------------------------------------------
<?php
	// function define una funcion reutilizable; return devuelve su resultado.
	function is_primo ($n){
		if ($n>1){
			$primo=true;
			for ($i=2;$i<$n;$i++)
				if ($n%$i==0){
					$primo=false;
					break;
				}
		}
		else
			$primo=false;
		return $primo;
	}

	function is_capicua ($i){
		if ($i>99 && $i<1000) {
			$centena=(int)($i/100);
			$unidad= $i%10;
			if ($centena==$unidad)
				$capicua=true;
			else
				$capicua=false;
			return $capicua;
		}
		else
			return false;
	}

	function redondear ($n){
		if (!is_float($n))
			return false;
		else {
			$decimal=(int)($n*10)%10;
			if ($decimal>=5)
				$n=(int)$n+1;
			else
				$n=(int)$n;
			return $n;
		}
	}

	function truncar ($n){
		// Comprueba si el valor representa un numero.
		if (!is_numeric($n))
			return false;
		else {
			$n=(int)$n;
			return $n;
		}
	}

	function digitos ($n){
		if (!is_numeric($n))
			return false;
		else {
			// Devuelve el numero de caracteres de una cadena.
			$digitos=strlen($n);
			if (is_float($n))
				$digitos=$digitos-1;
			return $digitos;
		}
	}

	$numero=757.65;
	$truncado=truncar($numero);
	echo "$numero truncado seria: $truncado <br>";
	$redondeado=redondear($numero);
	echo "$numero redondeado seria: $redondeado <br>";
	$capicua=is_capicua($truncado);
	if ($capicua) echo "$truncado es capicua <br>";
	$primo=is_primo($truncado);
	if ($primo) echo "$truncado es primo <br>";
	$n_digitos=digitos($numero);
	echo "$numero tiene $n_digitos digitos <br>";
?>


============================================================================
 ACTIVIDAD 3.4  |  FUNCIONES PRACTICAS Y VALIDACIONES
============================================================================


----------------------------------------------------------------------------
 3.4 | CALCULAR IMC E INTERPRETAR RESULTADO
----------------------------------------------------------------------------
<?php

// Funcion que calcula el Indice de Masa Corporal
// function define una funcion reutilizable; return devuelve su resultado.
function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura);
    return $imc;
}

// Funcion que interpreta el IMC y devuelve su categoria
function interpretarIMC($imc) {
    if ($imc < 18.5) {
        return "Bajo peso";
    } elseif ($imc < 25) {
        return "Peso normal";
    } elseif ($imc < 30) {
        return "Sobrepeso";
    } else {
        return "Obesidad";
    }
}

// Programa principal
echo "=== CALCULADORA DE IMC ===<br><br>";

// Caso 1: Persona con peso normal
$nombre1 = "Juan";
$peso1 = 70;
$altura1 = 1.75;

$imc1 = calcularIMC($peso1, $altura1);

echo "Paciente: $nombre1<br>";
echo "Peso: $peso1 kg<br>";
echo "Altura: $altura1 m<br>";
// Da formato a un numero y sus decimales.
echo "IMC: " . number_format($imc1, 2) . "<br>";
echo "Diagnostico: " . interpretarIMC($imc1) . "<br>";
echo "-----------------------------------<br><br>";

?>


----------------------------------------------------------------------------
 3.4 | VALIDAR CONTRASENA MAYUSCULA MINUSCULA NUMERO
----------------------------------------------------------------------------
<?php
/**
 * Comprueba que la cadena contiene al menos una letra minuscula.
 * Si al pasar a mayusculas el texto cambia, habia alguna minuscula.
 */
// function define una funcion reutilizable; return devuelve su resultado.
function tieneMinuscula(string $texto): bool
{
    // Convierte el texto a mayusculas.
    return $texto !== strtoupper($texto);
}

/**
 * Comprueba que la cadena contiene al menos una letra mayuscula.
 * Si al pasar a minusculas el texto cambia, habia alguna mayuscula.
 */
function tieneMayuscula(string $texto): bool
{
    // Convierte el texto a minusculas.
    return $texto !== strtolower($texto);
}

/**
 * Comprueba que la cadena contiene al menos un digito.
 * Se busca cada digito del 0 al 9 con strpos.
 * Ojo: strpos devuelve 0 si esta en la primera posicion,
 * por eso se compara con !== false.
 */
function tieneNumero(string $texto): bool
{
    for ($digito = 0; $digito <= 9; $digito++) {
        // Busca la posicion de un texto dentro de otro.
        if (strpos($texto, (string)$digito) !== false) {
            return true;
        }
    }
    return false;
}

/**
 * Valida una contrasena segun todos los requisitos.
 * Devuelve true si es valida y false en caso contrario.
 */
function validarContrasena(string $contrasena): bool
{
    return mb_strlen($contrasena) >= 8
        && tieneMinuscula($contrasena)
        && tieneMayuscula($contrasena)
        && tieneNumero($contrasena);
}

// ---------------------------------------------------------------
// Ejemplo de uso
// ---------------------------------------------------------------
echo "=== VALIDADOR DE CONTRASENAS ===<br>";
$pass = "Abc12345";
echo "Contrasena: '$pass'<br>";
// Devuelve el numero de caracteres de una cadena.
echo "Longitud: " . strlen($pass) . " caracteres<br>";
echo "Tiene minuscula: " . (tieneMinuscula($pass) ? "Si" : "No") . "<br>";
echo "Tiene mayuscula: " . (tieneMayuscula($pass) ? "Si" : "No") . "<br>";
echo "Tiene numero: " . (tieneNumero($pass) ? "Si" : "No") . "<br>";
echo "Estado: " . (validarContrasena($pass) ? "VALIDA" : "NO VALIDA") . "<br>";


----------------------------------------------------------------------------
 3.4 | VALIDAR CONTRASENA MAYUSCULA MINUSCULA NUMERO - ALTERNATIVA
----------------------------------------------------------------------------
<?php

// Comprueba si la contrasena contiene alguna letra minuscula
// function define una funcion reutilizable; return devuelve su resultado.
function tieneMinuscula($texto) {
    // Comprueba si el texto cumple un patron (expresion regular).
    return preg_match('/[a-z]/', $texto) === 1;
}

// Comprueba si la contrasena contiene alguna letra mayuscula
function tieneMayuscula($texto) {
    return preg_match('/[A-Z]/', $texto) === 1;
}

// Comprueba si la contrasena contiene algun numero
function tieneNumero($texto) {
    return preg_match('/[0-9]/', $texto) === 1;
}

// Valida todos los requisitos de la contrasena
function validarContrasena($contrasena) {
    // Devuelve el numero de caracteres de una cadena.
    if (strlen($contrasena) < 8) {
        return false;
    }

    if (!tieneMinuscula($contrasena)) {
        return false;
    }

    if (!tieneMayuscula($contrasena)) {
        return false;
    }

    if (!tieneNumero($contrasena)) {
        return false;
    }

    return true;
}

// Programa principal
echo "=== VALIDADOR DE CONTRASENAS ===<br>";

$pass = "Abc12345";

echo "Contrasena: '$pass'<br>";
echo "Longitud: " . strlen($pass) . " caracteres<br>";

echo "Tiene minuscula: "
    . (tieneMinuscula($pass) ? "Si" : "No") . "<br>";

echo "Tiene mayuscula: "
    . (tieneMayuscula($pass) ? "Si" : "No") . "<br>";

echo "Tiene numero: "
    . (tieneNumero($pass) ? "Si" : "No") . "<br>";

echo "Estado: "
    . (validarContrasena($pass) ? "VALIDA" : "NO VALIDA")
    . "<br>";

?>


----------------------------------------------------------------------------
 3.4 | SIMULAR CAJERO AUTOMATICO
----------------------------------------------------------------------------
<?php

// 1. Retira dinero si hay saldo suficiente
// function define una funcion reutilizable; return devuelve su resultado.
function retirarDinero(&$saldo, $cantidad) {
    if ($cantidad <= 0 || $saldo < $cantidad) {
        return false;
    }

    $saldo = $saldo - $cantidad;
    return true;
}

// 2. Anade dinero al saldo
function depositarDinero(&$saldo, $cantidad) {
    if ($cantidad <= 0) {
        return false;
    }

    $saldo = $saldo + $cantidad;
    return true;
}

// 3. Aplica una comision porcentual al saldo
function aplicarComision(&$saldo, $porcentaje) {
    if ($porcentaje < 0 || $porcentaje > 100) {
        return false;
    }

    $comision = $saldo * ($porcentaje / 100);
    $saldo = $saldo - $comision;

    return true;
}

// 4. Transfiere dinero entre dos cuentas
function transferir(&$saldoOrigen, &$saldoDestino, $cantidad) {
    if ($cantidad <= 0 || $saldoOrigen < $cantidad) {
        return false;
    }

    $saldoOrigen = $saldoOrigen - $cantidad;
    $saldoDestino = $saldoDestino + $cantidad;

    return true;
}

// Programa principal
$miCuenta = 1000;
$cuentaAmigo = 500;

echo "Saldo inicial: $" . $miCuenta . "<br>";

depositarDinero($miCuenta, 200);
echo "Despues de depositar $200: $" . $miCuenta . "<br>";

if (retirarDinero($miCuenta, 150)) {
    echo "Retiro exitoso. Saldo actual: $"
        . $miCuenta . "<br>";
} else {
    echo "No hay saldo suficiente para retirar.<br>";
}

aplicarComision($miCuenta, 2);
echo "Despues de comision del 2%: $"
    // Da formato a un numero y sus decimales.
    . number_format($miCuenta, 2, '.', '') . "<br>";

if (transferir($miCuenta, $cuentaAmigo, 300)) {
    echo "Transferencia exitosa<br>";
    echo "Mi cuenta: $"
        . number_format($miCuenta, 2, '.', '') . "<br>";
    echo "Cuenta amigo: $"
        . number_format($cuentaAmigo, 2, '.', '') . "<br>";
} else {
    echo "Transferencia rechazada: saldo insuficiente.<br>";
}

?>


----------------------------------------------------------------------------
 3.4 | GESTIONAR CUENTA CORRIENTE
----------------------------------------------------------------------------
<?php
// Pesos que se aplican a cada uno de los 10 digitos
const PESOS = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

/**
 * Comprueba que la cadena no esta vacia y todos sus caracteres son digitos.
 */
// function define una funcion reutilizable; return devuelve su resultado.
function esNumerica(string $texto): bool
{
    // Devuelve el numero de caracteres de una cadena.
    if (strlen($texto) === 0) {
        return false;
    }
    for ($i = 0; $i < strlen($texto); $i++) {
        // Extrae una parte de una cadena.
        // Busca la posicion de un texto dentro de otro.
        if (strpos('0123456789', substr($texto, $i, 1)) === false) {
            return false;
        }
    }
    return true;
}

/**
 * Comprueba la estructura: 23 caracteres, guiones en las posiciones
 * 4, 9 y 12, y el resto de bloques formados solo por digitos.
 */
function formatoValido(string $cc): bool
{
    if (strlen($cc) !== 23) {
        return false;
    }
    if (substr($cc, 4, 1) !== '-' || substr($cc, 9, 1) !== '-' || substr($cc, 12, 1) !== '-') {
        return false;
    }
    return esNumerica(substr($cc, 0, 4))
        && esNumerica(substr($cc, 5, 4))
        && esNumerica(substr($cc, 10, 2))
        && esNumerica(substr($cc, 13, 10));
}

/**
 * Calcula un digito de control a partir de 10 digitos:
 * suma de cada digito por su peso, 11 - (suma % 11),
 * y si da 11 se convierte en 0 y si da 10 en 1.
 */
function calcularDigito(string $digitos): int
{
    $suma = 0;
    for ($i = 0; $i < 10; $i++) {
        $suma += (int)substr($digitos, $i, 1) * PESOS[$i];
    }
    $resultado = 11 - ($suma % 11);
    if ($resultado === 11) {
        return 0;
    }
    if ($resultado === 10) {
        return 1;
    }
    return $resultado;
}

/**
 * Genera los dos digitos de control:
 *  - el primero con "00" + entidad + oficina
 *  - el segundo con el numero de cuenta
 */
function calcularDigitosControl(string $entidad, string $oficina, string $cuenta): string
{
    $primero = calcularDigito("00" . $entidad . $oficina);
    $segundo = calcularDigito($cuenta);
    return $primero . $segundo;
}

/**
 * Valida una cuenta corriente: el formato debe ser correcto y los digitos
 * de control indicados deben coincidir con los calculados.
 * Devuelve true si es valida y false en caso contrario.
 */
function validarCuenta(string $cc): bool
{
    if (!formatoValido($cc)) {
        return false;
    }
    $entidad = substr($cc, 0, 4);
    $oficina = substr($cc, 5, 4);
    $control = substr($cc, 10, 2);
    $cuenta  = substr($cc, 13, 10);

    return $control === calcularDigitosControl($entidad, $oficina, $cuenta);
}

// ---------------------------------------------------------------
// Ejemplo de uso
// ---------------------------------------------------------------
echo "=== VALIDADOR DE CUENTA CORRIENTE ===<br>";
$cc = "2077-0024-00-3102575766";
$entidad = substr($cc, 0, 4);
$oficina = substr($cc, 5, 4);
$control = substr($cc, 10, 2);
$cuenta  = substr($cc, 13, 10);
echo "Cuenta: $cc<br>";
echo "Entidad: $entidad<br>";
echo "Oficina: $oficina<br>";
echo "Numero de cuenta: $cuenta<br>";
echo "Digitos de control: $control<br>";
echo "Digitos de control calculados: " . calcularDigitosControl($entidad, $oficina, $cuenta) . "<br>";
echo "Estado: " . (validarCuenta($cc) ? "CORRECTA" : "INCORRECTA") . "<br>";
echo "<br/>";
$cc = "2077-0024-11-3102575766";
$entidad = substr($cc, 0, 4);
$oficina = substr($cc, 5, 4);
$control = substr($cc, 10, 2);
$cuenta  = substr($cc, 13, 10);
echo "Cuenta: $cc<br>";
echo "Entidad: $entidad<br>";
echo "Oficina: $oficina<br>";
echo "Numero de cuenta: $cuenta<br>";
echo "Digitos de control: $control<br>";
echo "Digitos de control calculados: " . calcularDigitosControl($entidad, $oficina, $cuenta) . "<br>";
echo "Estado: " . (validarCuenta($cc) ? "CORRECTA" : "INCORRECTA") . "<br>";
echo "<br/>";
$cc = "2077-0024-3102575766";
$entidad = substr($cc, 0, 4);
$oficina = substr($cc, 5, 4);
$control = substr($cc, 10, 2);
$cuenta  = substr($cc, 13, 10);
echo "Cuenta: $cc<br>";
echo "Entidad: $entidad<br>";
echo "Oficina: $oficina<br>";
echo "Numero de cuenta: $cuenta<br>";
echo "Digitos de control: $control<br>";
echo "Digitos de control calculados: " . calcularDigitosControl($entidad, $oficina, $cuenta) . "<br>";
echo "Estado: " . (validarCuenta($cc) ? "CORRECTA" : "INCORRECTA") . "<br>";


----------------------------------------------------------------------------
 3.4 | OPERACIONES CON CADENAS DE TEXTO
----------------------------------------------------------------------------
<?php
echo "=== TRABAJAR CON CADENAS ===<br><br>";

// 1. Crear la variable
$cadena = "Comer algas es realmente sano";
echo "Cadena original: '$cadena'<br><br>";

// 2. Posicion de la palabra "algas" (la primera posicion es 0)
// Busca la posicion de un texto dentro de otro.
$posicion = strpos($cadena, "algas");
echo "Posicion de 'algas': $posicion<br><br>";

// 3. Reemplazar "realmente" por "muy"
// Sustituye una parte de un texto por otra.
$reemplazada = str_replace("realmente", "muy", $cadena);
echo "Cadena con el reemplazo: '$reemplazada'<br><br>";

// 4. Comprobar si existe la palabra "anacardo"
// strpos devuelve false si no la encuentra, y 0 si esta al principio,
// por eso se compara con !== false
echo "¿Existe 'anacardo'? " . (strpos($cadena, "anacardo") !== false ? "Si" : "No") . "<br><br>";

// 5. Invertir el orden del texto recorriendo la cadena de atras hacia delante
$invertida = "";
for ($i = mb_strlen($cadena) - 1; $i >= 0; $i--) {
    // Extrae una parte de una cadena.
    $invertida .= substr($cadena, $i, 1);
}
echo "Texto invertido: '$invertida'<br><br>";

// 6. Contar las vocales "e" recorriendo la cadena caracter a caracter
$contador = 0;
for ($i = 0; $i < mb_strlen($cadena); $i++) {
    if (substr($cadena, $i, 1) === "e") {
        $contador++;
    }
}
echo "Numero de vocales 'e': $contador<br>";


----------------------------------------------------------------------------
 3.4 | OPERACIONES CON CADENAS DE TEXTO - ALTERNATIVA
----------------------------------------------------------------------------
<?php
echo "=== TRABAJAR CON CADENAS ===<br><br>";

// 1. Crear la variable
$cadena = "Comer algas es realmente sano";
echo "Cadena original: '$cadena'<br><br>";

// 2. Posicion de la palabra "algas" (la primera posicion es 0)
// Busca la posicion de un texto dentro de otro.
$posicion = strpos($cadena, "algas");
echo "Posicion de 'algas': $posicion<br><br>";

// 3. Reemplazar "realmente" por "muy"
// Sustituye una parte de un texto por otra.
$reemplazada = str_replace("realmente", "muy", $cadena);
echo "Cadena con el reemplazo: '$reemplazada'<br><br>";

// 4. Comprobar si existe la palabra "anacardo"
// strpos devuelve false si no la encuentra, y 0 si esta al principio,
// por eso se compara con !== false
echo "¿Existe 'anacardo'? " . (strpos($cadena, "anacardo") !== false ? "Si" : "No") . "<br><br>";

// 5. Invertir el orden del texto
echo "Texto invertido: '" . strrev($cadena) . "'<br><br>";

// 6. Contar las vocales "e"
echo "Numero de vocales 'e': " . substr_count($cadena, "e") . "<br>";


============================================================================
 ACTIVIDAD 3.5  |  ARRAYS, CADENAS Y DATOS
============================================================================


----------------------------------------------------------------------------
 3.5 | RECORRER VARIABLES DE SERVIDOR SERVER - ALTERNATIVA
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Tabla</title>
		<style type="text/css">
			td, th {border: 1px solid grey; padding: 4px;}
			th {text-align:center;}
			table {border: 1px solid black;}
		</style>
	</head>
	<body>
		<table>
			<tbody>
				<tr>
					<th>Variable</th>
					<th>Valor</th>
				</tr>
				<?php
					// $_SERVER contiene datos del servidor y la peticion.
					// foreach recorre un array; as $clave => $valor permite leer ambos.
					foreach ($_SERVER as $variable => $valor) {
						print "<tr>";
						print "<td>".$variable."</td>";
						print "<td>".$valor."</td>";
						print "</tr>";
					}
				?>
			</tbody>
		</table>
	</body>
</html>


----------------------------------------------------------------------------
 3.5 | CONJUGAR VERBOS EN PRESENTE PASADO FUTURO
----------------------------------------------------------------------------
<?php

	$verbos = array ("amar","cantar","ayudar","hablar","bailar","cocinar","estudiar","escuchar","comprar","viajar");
	$term_presente = array ("o","as","a","amos","ais","an");
	$term_pasado = array ("e","aste","o","amos","asteis","aron");
	$term_futuro = array ("are","aras","ara","aremos","areis","aran");

	// Elige una clave aleatoria del array, no el valor.
	$verbo = $verbos[array_rand($verbos)];
	echo "<br>Verbo: $verbo";

	// Extrae una parte de una cadena.
	$raiz = substr($verbo,0,-2);
	echo "<br>Raiz: $raiz";

	// foreach recorre un array; as $clave => $valor permite leer ambos.
	foreach ($term_presente as $terminacion)
			$presente[] = "$raiz"."$terminacion";
	foreach ($term_pasado as $terminacion)
			$pasado[] = "$raiz"."$terminacion";
	foreach ($term_futuro as $terminacion)
			$futuro[] = "$raiz"."$terminacion";

	echo "<br>Presente: ";
	foreach ($presente as $tiempo) echo $tiempo." ";
	echo "<br>Pasado: ";
	foreach ($pasado as $tiempo) echo $tiempo." ";
	echo "<br>Futuro: ";
	foreach ($futuro as $tiempo) echo $tiempo." ";

?>


----------------------------------------------------------------------------
 3.5 | CALCULAR LETRA DEL DNI NIF
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <title>DNI</title>
    </head>
    <body>
        <?php
            $arrayLetras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X",
							"B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
            $dni         = "12345678";
            $resto       = $dni % 23;
            echo "El DNI completo es: $dni".$arrayLetras[$resto];
        ?>
    </body>
</html>


----------------------------------------------------------------------------
 3.5 | MOSTRAR FECHA EN CASTELLANO
----------------------------------------------------------------------------
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Fecha en castellano</title>
	</head>
	<body>
	<?php
	//Funcion que devuelve un texto con la fecha actual en castellano
	// function define una funcion reutilizable; return devuelve su resultado.
	function fecha(){
		date_default_timezone_set('Europe/Madrid');
		// Formatea una fecha: d=dia, m=mes, Y=anio, l=dia semana.
		$numero_mes = date("m");
		$numero_dia_semana = date("N");
		$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$dias=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
		$mes=$meses[$numero_mes-1];
		$dia_semana=$dias[$numero_dia_semana-1];
		return $dia_semana.", ".date("j")." de ".$mes." de ".date("Y");
	}

	//Programa principal
	print "Hoy es: ".fecha();
	?>
	</body>
</html>


----------------------------------------------------------------------------
 3.5 | FUSIONAR ARRAYS
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <title>Fusion de arrays</title>
    </head>
    <body>
        <?php
            // function define una funcion reutilizable; return devuelve su resultado.
            function cargar($numeroElementos)
            {
                for ($i = 0; $i < $numeroElementos; $i++)
                {
                    // Genera un numero entero aleatorio entre los limites.
                    $numeros[$i] = rand(0,99);
                }
                return $numeros;
            }

            function mostrar($array)
            {
                // foreach recorre un array; as $clave => $valor permite leer ambos.
                foreach ($array as $elemento)
                {
                    echo $elemento . " ";
                }
                echo "<br /><br />";
            }

            function ordenar($array)
            {
                // Cuenta los elementos de un array.
                $n = count($array);
                for ($i = 1; $i < $n; $i++)
                {
                    for ($j = 0; $j < ($n - $i); $j++)
                    {
                        if ($array[$j] > $array[$j + 1])
                        {
                            $aux           = $array[$j];
                            $array[$j]     = $array[$j + 1];
                            $array[$j + 1] = $aux;
                        }
                    }
                }
                return $array;
            }

            function mezclar($array1, $array2)
            {
                foreach ($array2 as $valor)
                {
                    $array1[] = $valor;
                }
                return $array1;
            }

            $array1 = cargar(20);
			$array2 = cargar(20);
			mostrar($array1);
			mostrar($array2);
			$array1=ordenar($array1);
			$array2=ordenar($array2);
			mostrar($array1);
			mostrar($array2);
			$array=mezclar($array1,$array2);
			mostrar($array);
			$array=ordenar($array);
			mostrar($array);
        ?>
    </body>
</html>


----------------------------------------------------------------------------
 3.5 | LIMITAR VALORES EN ARRAY
----------------------------------------------------------------------------
<?php
	// function define una funcion reutilizable; return devuelve su resultado.
	function limitar ($arraynum,$numero) {
		//echo "<br>"; print_r($arraynum); echo "<br>";

		// foreach recorre un array; as $clave => $valor permite leer ambos.
		foreach ($arraynum as $clave => $valor)
			if ($valor>=$numero) unset($arraynum[$clave]);
		//echo "<br>"; print_r($arraynum); echo "<br>";

		// Devuelve los valores de un array.
		$arraynum=array_values($arraynum);
		//echo "<br>"; print_r($arraynum); echo "<br>";

		return $arraynum;
	}

	$numeros = array (2,4,6,12,32,7,10,15,3,8,24);
//	$numeros = array (2.5,4,6.3,12,32.7,7,10,15.6,3,8,24);
	$limite = 10;
	// Muestra el contenido de una variable o array.
	echo "<br>Array inicial: "; print_r($numeros);
	$limitado=limitar($numeros,$limite);
	echo "<br>Array limitado: "; print_r($limitado);

?>


----------------------------------------------------------------------------
 3.5 | ARRAY MAPA
----------------------------------------------------------------------------
<?php
	$mapa=array("Espana"=>"Madrid",
				"Portugal"=>"Lisboa",
				"Francia"=>"Paris",
				"Italia"=>"Roma",
				"Alemania"=>"Berlin",
				"Grecia"=>"Atenas");

	// Muestra el contenido de una variable o array.
	print_r($mapa);
	echo $mapa["Italia"];
	if (array_key_exists("Rusia",$mapa)) echo "<br>Rusia esta en el mapa.";
	else echo "<br>Rusia no esta en el mapa.";
	echo "<br>";
	// foreach recorre un array; as $clave => $valor permite leer ambos.
	foreach ($mapa as $pais => $capital)
		echo "<br>$pais => $capital";
	unset ($mapa["Francia"]);
	echo "<br>";
	foreach ($mapa as $pais => $capital)
		echo "<br>$pais => $capital";
	echo "<br>";
	// Devuelve la clave de un valor encontrado en un array.
	echo "<br>".array_search("Lisboa",$mapa);

?>


----------------------------------------------------------------------------
 3.5 | COMPROBAR SI UNA PALABRA ES PALINDROMO
----------------------------------------------------------------------------
<?php
	// function define una funcion reutilizable; return devuelve su resultado.
	function palindromo ($az) {
		$az=str_split($az);
		// Muestra el contenido de una variable o array.
		echo "<br>array: "; print_r($az); echo "<br>";

		// foreach recorre un array; as $clave => $valor permite leer ambos.
		foreach ($az as $posicion => $caracter)
			if ($caracter==" ") unset($az[$posicion]);

//		Otra forma de quitar los espacios:
//		while ($key=array_search("a",$az))
//			unset($az[$key]);

		echo "<br>array: "; print_r($az); echo "<br>";

		// Devuelve los valores de un array.
		$az=array_values($az);
		echo "<br>array: "; print_r($az); echo "<br>";

		// Devuelve el array con orden invertido.
		$za=array_reverse($az);
		echo "<br>yarra: "; print_r($za); echo "<br>";

		if ($az==$za)
			return true;
		else
			return false;
	}

	function palindromo2 ($ay) {
		$ay=str_split($ay);
		echo "<br>array: "; print_r($ay); echo "<br>";

		// Cuenta los elementos de un array.
		for ($i=0;$i<count($ay);$i++)
			if ($ay[$i]==" ") unset($ay[$i]);
		echo "<br>array: "; print_r($ay); echo "<br>";

		reset($ay);
		for ($i=0;$i<count($ay);$i++) {
			$az[$i]=current($ay);
			next($ay);
		}
		echo "<br>array: "; print_r($az); echo "<br>";

		for ($i=0;$i<count($az);$i++)
			$za[$i]=$az[count($az)-1-$i];
		echo "<br>yarra: "; print_r($za); echo "<br>";

		if ($az==$za)
			return true;
		else
			return false;
	}

	function palindromo3 ($cad) {
		// Convierte el texto a minusculas.
		$cad=strtolower($cad);
		echo "<br>cadena: "; echo "$cad"; echo "<br>";

		// Sustituye una parte de un texto por otra.
		$cad=str_replace(" ","",$cad);
		echo "<br>cadena: "; echo "$cad"; echo "<br>";

		$cadrev=strrev($cad);
		echo "<br>cadena: "; echo "$cad"; echo "<br>";

		if ($cad==$cadrev)
			return true;
		else
			return false;
	}

	$cadena = "arriba la birra"; //"amad a la dama"

	if (palindromo($cadena))
		echo "<br>La cadena \"$cadena\" SI es un palindromo<br>";
	else
		echo "<br>La cadena \"$cadena\" NO es un palindromo<br>";

	if (palindromo2($cadena))
		echo "<br>La cadena \"$cadena\" SI es un palindromo<br>";
	else
		echo "<br>La cadena \"$cadena\" NO es un palindromo<br>";

	if (palindromo3($cadena))
		echo "<br>La cadena \"$cadena\" SI es un palindromo<br>";
	else
		echo "<br>La cadena \"$cadena\" NO es un palindromo<br>";
?>


----------------------------------------------------------------------------
 3.5 | RECORRER VARIABLES DE SERVIDOR SERVER
----------------------------------------------------------------------------
<?php
// $_SERVER contiene datos del servidor y la peticion.
// foreach recorre un array; as $clave => $valor permite leer ambos.
foreach ($_SERVER as $clave=>$valor)
	echo " $clave => $valor"."<br>";

?>


============================================================================
 ACTIVIDAD 3.7  |  FORMULARIOS GET / POST / REQUEST
============================================================================


----------------------------------------------------------------------------
 3.7 | FORMULARIO GET CON NOMBRE Y EDAD - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Ejemplo Formularios Get</title>
	</head>
	<body>
		<h1>Ejemplo de procesado de formularios</h1>
		<form action="ejemplo1.php" method="get">
			<label for="nombre">Introduzca su nombre:</label>
			<input type="text" id="nombre" name="nombre">
			<br/>
			<label for="apellido">Introduzca sus apellidos:</label>
			<input type="text" id="apellido" name="apellidos"><br/>
			<label for="edad">Introduzca su edad:</label>
			<input type="text" id="edad" name="edad"><br/>
			<input type="submit"  name="enviar" value="Enviar">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO POST CON NOMBRE Y EDAD - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Ejemplo Formularios post</title>
	</head>
	<body>
		<h1>Ejemplo de procesado de formularios</h1>
		<form action="ejemplo1.php" method="post">
			<label for="nombre">Introduzca su nombre:</label>
			<input type="text" id="nombre" name="nombre">
			<br/>
			<label for="apellido">Introduzca sus apellidos:</label>
			<input type="text" id="apellido" name="apellidos"><br/>
			<label for="edad">Introduzca su edad:</label>
			<input type="text" id="edad" name="edad"><br/>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO GET ALUMNO Y MODULO - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 2</title>
	</head>
	<body>
		<form action="ejercicio3_procesa_get.php" method="get">
			<label for="alumno">Introduzca nombre del alumno:</label>
			<input type="text" id="alumno" name="nombre">
			<br/>
			<label for=curso">Selecciona el Modulo:</label>
			<select name="curso" id="curso">
			<option value="dwes">Desarrollo Web en Entorno Servidor</option>
			<option value="dwec">Desarrollo Web en Entorno Cliente</option>
			</select><br/>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO POST ALUMNO Y MODULO - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 2</title>
	</head>
	<body>
		<form action="ejercicio3_procesa_post.php" method="post">
			<label for="alumno">Introduzca nombre del alumno:</label>
			<input type="text" id="alumno" name="nombre">
			<br/>
			<label for=curso">Selecciona el Modulo:</label>
			<select name="curso" id="curso">
			<option value="dwes">Desarrollo Web en Entorno Servidor</option>
			<option value="dwec">Desarrollo Web en Entorno Cliente</option>
			</select><br/>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO CON REQUEST ALUMNO Y MODULO - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 2 Request</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="ejercicio4.php" method="get">
			<label for="alumno">Introduzca nombre del alumno:</label>
			<input type="text" id="alumno" name="nombre">
			<br/>
			<label for=curso">Selecciona el Modulo:</label>
			<select name="curso" id="curso">
			<option value="dwes">Desarrollo Web en Entorno Servidor</option>
			<option value="dwec">Desarrollo Web en Entorno Cliente</option>
			</select><br/>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | RECIBIR DATOS DE FORMULARIO CON GET
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3 (procesa)</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_GET recibe parametros enviados en la URL.
            if (isset($_GET['enviar']))
            {
                echo "El alumno es ".$_GET['nombre']."<br/>";
                echo "El curso elegido es <strong>" . $_GET['curso'] . "</strong>";
            }

        ?>
        <br /><a href='ejercicio2_get.html'>Volver</a>

    </body>
</html>


----------------------------------------------------------------------------
 3.7 | RECIBIR DATOS DE FORMULARIO CON POST
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3 (procesa)</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_POST recibe datos enviados con method="post".
            if (isset($_POST['enviar']))
            {
                echo "El alumno es ".$_POST['nombre']."<br/>";
                echo "El curso elegido es <strong>" . $_POST['curso'] . "</strong>";
            }

        ?>
        <br /><a href='ejercicio2_get.html'>Volver</a>

    </body>
</html>


----------------------------------------------------------------------------
 3.7 | RECIBIR DATOS CON REQUEST
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4 (procesa)</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_REQUEST puede leer parametros GET, POST y COOKIE.
            if (isset($_REQUEST['enviar']))
            {
                echo "El alumno es ".$_REQUEST['nombre']."<br/>";
                echo "El curso elegido es <strong>" . $_REQUEST['curso'] . "</strong>";
            }

        ?>
        <br /><a href='ejercicio2_request.html'>Volver</a>
    </body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO COMPROBAR PAR O IMPAR - PROCESAR DATOS PHP
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5 (Resultado comprobar paridad)</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_POST recibe datos enviados con method="post".
            if (isset($_POST['enviar']))
            {
                //comprobamos que ha metido un numero y exista la variable
                if(isset($_POST['numero'])){
                    //comprobarmos si es multiplo de 2 -par
                    if( ($_POST['numero'] % 2)==0){
                        // construimos la pagina
                        echo "<h1>El numero ".$_POST['numero']. " es par</h1><br />";
                    }
                    else{
                        echo "<h1>El numero ".$_POST['numero']. " es impar</h1><br />";
                    }
                }
            }
        ?>
        <br /><a href='ejercicio5.html'>Volver</a>
    </body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO COMPROBAR PAR O IMPAR - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 5</title>
	</head>
	<body>
		<form action="ejercicio5_datos.php" method="post">
			<h1>COMPROBACION DE SI ES PAR O IMPAR</h1>
            <label for="numero">Elige un numero entero:</label>
			<input type="number" id="numero" name="numero" size="6">
			<br/> <br/>
			<input type="submit" name="enviar" value="Enviar datos">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO TABLA DE MULTIPLICAR - PROCESAR DATOS PHP
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 6 - Resultado de la construccion de la tabla de multiplicar</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_POST recibe datos enviados con method="post".
            if (isset($_POST['numero']))
            {
                // Comprobamos si existe el parametro numero pasado desde el formulario
                echo "TABLA DE MULTIPLICAR DEL " . $_POST['numero'] . ":<br/>";
                for ($x = 1; $x <= 10; $x++)
                {
                    $resultado = $x * $_POST['numero'];
                    echo "$x x " . $_POST['numero'] . " = $resultado<br/>";
                }
            }
        ?>
        <br><a href='ejercicio6.html'>Volver</a>
    </body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO TABLA DE MULTIPLICAR - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 6</title>
	</head>
	<body>
		<form action="ejercicio6_datos.php" method="post">
			<h1>TABLA DE MULTIPLICAR:</h1>
            <label for="numero">Elige un numero entero:</label>
			<input type="number" id="numero" name="numero" size="2"  min="1" max="10">
			<br/> <br/>
			<input type="submit" name="enviar" value="Enviar datos">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO MOSTRAR PARES DE NUMEROS - PROCESAR DATOS PHP
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7 - Resultado de la lista de pares de numeros</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_POST recibe datos enviados con method="post".
            if (isset($_POST['menor']) && isset($_POST['mayor']))
            {
                echo "LISTA DE PARES DE NUMEROS DE " . $_POST['menor'] . " Y " . $_POST['mayor'] . ":<br>";
                for ($x = $_POST['menor']; $x <= $_POST['mayor']; $x++)
                {
                    $aux = $_POST['mayor'] - ($x - $_POST['menor']);
                    echo "($x,$aux) ";
                }
            }
        ?>
        <br/><br/><a href='ejercicio7.html'>Volver</a>
    </body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO MOSTRAR PARES DE NUMEROS - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 7</title>
	</head>
	<body>
		<form action="ejercicio7_datos.php" method="post">
			<h1>LISTA DE PARES DE NUMEROS:</h1>
            <label for="numero1">Elige un numero entero menor:</label>
			<input type="number" id="numero1" name="menor" size="2">
			<br/>
            <label for="numero2">Elige un numero entero mayor:</label>
			<input type="number" id="numero2" name="mayor" size="2">
            <br/><br/>
			<input type="submit" name="enviar" value="Enviar datos">
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO CALCULADORA OPERACIONES - PROCESAR DATOS PHP
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 8 - Resultado de calcular una operacion</title>
    </head>
    <body>
        <?php
            // Comprueba si la variable existe y no es null.
            // $_POST recibe datos enviados con method="post".
            if (isset($_POST['primero']) && isset($_POST['segundo']) && isset($_POST['opera']))
            {
                if ($_POST['opera'] == "suma")
                {
                    echo "El resultado de realizar la suma de los numeros " . $_POST['primero'] . " y " . $_POST['segundo'] . " es " .
                        ($_POST['primero'] + $_POST['segundo']);
                }
                else if ($_POST['opera'] == "resta")
                {
                    echo "El resultado de realizar la resta de los numeros " . $_POST['primero'] . " y " . $_POST['segundo'] . " es " .
                        ($_POST['primero'] - $_POST['segundo']);
                }
                else if ($_POST['opera'] == "producto")
                {
                    echo "El resultado de realizar el producto de los numeros " . $_POST['primero'] . " y " . $_POST['segundo'] . " es " .
                        ($_POST['primero'] * $_POST['segundo']);
                }
                else if ($_POST['opera'] == "cociente")
                {
                    if ($_POST['segundo'] == 0)
                    {
                        echo "Imposible realizar una division por CERO.";
                    }
                    else
                    {
                        echo "El resultado de realizar el cociente de los numeros " . $_POST['primero'] . " y " . $_POST['segundo'] . " es " .
                            ($_POST['primero'] / $_POST['segundo']);
                    }
                }
                else
                {
                    echo "ERROR: Operacion incorrecta " . $_POST['opera'];
                }

            }
        ?>
        <br/><br/><a href='ejercicio8.html'>Volver</a>
    </body>
</html>


----------------------------------------------------------------------------
 3.7 | FORMULARIO CALCULADORA OPERACIONES - HTML
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<title>Ejercicio 8</title>
	</head>
	<body>
		<form action="ejercicio8_datos.php" method="post">
            <label for="numero1">Elige el primer numero:</label>
			<input type="number" id="numero1" name="primero" size="2">
			<br/>
            <label for="numero2">Elige el segundo numero:</label>
			<input type="number" id="numero2" name="segundo" size="2">
            <br/>
            <fieldset>
                <legend>Seleccione la operacion:</legend>
                <label for="suma">Suma</label>
                <input type="radio" id="suma" name="opera" value="suma"
                         checked>
                <label for="resta">Resta</label>
                <input type="radio" id="resta" name="opera" value="resta">
                <label for="producto">Producto</label>
                <input type="radio" id="producto" name="opera" value="producto">
                <label for="cociente">Cociente</label>
                <input type="radio" id="cociente" name="opera" value="cociente">
            </fieldset>
            <br/><br/>
			<input type="submit" name="enviar" value="Enviar datos">
		</form>
	</body>
</html>


============================================================================
 ACTIVIDAD 3.8  |  FORMULARIOS Y LOGIN
============================================================================


----------------------------------------------------------------------------
 3.8 | FORMULARIO DE FECHA
----------------------------------------------------------------------------
<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Ejemplo: Mostrar fecha completa a partir de dia, mes y ano introducidos -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Fecha completa a partir de dia, mes y ano</title>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Madrid');
			// Comprueba si un valor esta vacio (incluye 0 y "0").
			// $_POST recibe datos enviados con method="post".
			if (!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['anio'])) {
				// Comprueba si una fecha es valida.
				if (checkdate($_POST['mes'],$_POST['dia'],$_POST['anio'])){
					// Crea una marca de tiempo con hora, minuto, segundo, mes, dia y anio.
					$fecha = mktime(0,0,0,$_POST['mes'],$_POST['dia'],$_POST['anio']);
					// Formatea una fecha: d=dia, m=mes, Y=anio, l=dia semana.
					$numero_dia_semana = date("N", $fecha);
					switch($_POST['mes']){
						case 1: $mes = "Enero";
							break;
						case 2: $mes = "Febrero";
							break;
						case 3: $mes = "Marzo";
							break;
						case 4: $mes = "Abril";
							break;
						case 5: $mes = "Mayo";
							break;
						case 6: $mes = "Junio";
							break;
						case 7: $mes = "Julio";
							break;
						case 8: $mes = "Agosto";
							break;
						case 9: $mes = "Septiembre";
							break;
						case 10: $mes = "Octubre";
							break;
						case 11: $mes = "Noviembre";
							break;
						case 12: $mes = "Diciembre";
							break;
					}
					switch($numero_dia_semana){
						case 1: $dia_semana = "Lunes";
							break;
						case 2: $dia_semana = "Martes";
							break;
						case 3: $dia_semana = "Miercoles";
							break;
						case 4: $dia_semana = "Jueves";
							break;
						case 5: $dia_semana = "Viernes";
							break;
						case 6: $dia_semana = "Sabado";
							break;
						case 7: $dia_semana = "Domingo";
							break;
					}
					echo "<p><center>".$dia_semana.", ".date("j", $fecha)." de ".$mes." de ".date("Y", $fecha)."</center></p>";
				}else
					print "<center><span style='color:red'>La fecha introducida no es correcta!!</span></center>";
			}
		?>
		<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" align="center">
			<p>
			Dia:
			<input type="text" name="dia" value="<?php if(isset($_POST['dia'])) echo $_POST['dia'];?>" />
			<?php
				// Comprueba si la variable existe y no es null.
				if (isset($_POST['enviar']) && empty($_POST['dia']))
					echo "<span style='color:red'> &lt;-- Debe introducir un dia!!</span>"
			?></p>
			<p>
			Mes:
			<input type="text" name="mes" value="<?php if(isset($_POST['mes'])) echo $_POST['mes'];?>" />
			<?php
				if (isset($_POST['enviar']) && empty($_POST['mes']))
					echo "<span style='color:red'> &lt;-- Debe introducir un mes!!</span>"
			?></p>
			<p>
			Ano:
			<input type="text" name="anio" value="<?php if(isset($_POST['anio'])) echo $_POST['anio'];?>" />
			<?php
				if (isset($_POST['enviar']) && empty($_POST['anio']))
					echo "<span style='color:red'> &lt;-- Debe introducir un ano!!</span>"
			?></p>
			<p>
			<input type="submit" value="Enviar" name="enviar"/>
			</p>
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.8 | FORMULARIO DE FECHA - ALTERNATIVA
----------------------------------------------------------------------------
<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Ejemplo: Mostrar fecha completa a partir de dia, mes y ano introducidos -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Fecha completa a partir de dia, mes y ano</title>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Madrid');
			// Comprueba si un valor esta vacio (incluye 0 y "0").
			// $_POST recibe datos enviados con method="post".
			if (!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['anio'])) {
				// Comprueba si una fecha es valida.
				if (checkdate($_POST['mes'],$_POST['dia'],$_POST['anio'])){
					// Crea una marca de tiempo con hora, minuto, segundo, mes, dia y anio.
					$fecha = mktime(0,0,0,$_POST['mes'],$_POST['dia'],$_POST['anio']);
					// Formatea una fecha: d=dia, m=mes, Y=anio, l=dia semana.
					$numero_dia_semana = date("N", $fecha);
					$numero_mes = date("n", $fecha);
					$dias=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
					$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					$dia_semana=$dias[$numero_dia_semana-1];
					$mes=$meses[$numero_mes-1];
					echo "<p><center>".$dia_semana.", ".date("j", $fecha)." de ".$mes." de ".date("Y", $fecha)."</center></p>";
				}else
					print "<center><span style='color:red'>La fecha introducida no es correcta!!</span></center>";
			}
		?>
		<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" align="center">
			<p>
			Dia:
			<input type="number" name="dia" value="<?php if(isset($_POST['dia'])) echo $_POST['dia'];?>" />
			<?php
				// Comprueba si la variable existe y no es null.
				if (isset($_POST['enviar']) && empty($_POST['dia']))
					echo "<span style='color:red'> &lt;-- Debe introducir un dia!!</span>"
			?></p>
			<p>
			Mes:
			<input type="number" name="mes" value="<?php if(isset($_POST['mes'])) echo $_POST['mes'];?>" />
			<?php
				if (isset($_POST['enviar']) && empty($_POST['mes']))
					echo "<span style='color:red'> &lt;-- Debe introducir un mes!!</span>"
			?></p>
			<p>
			Ano:
			<input type="number" name="anio" value="<?php if(isset($_POST['anio'])) echo $_POST['anio'];?>" />
			<?php
				if (isset($_POST['enviar']) && empty($_POST['anio']))
					echo "<span style='color:red'> &lt;-- Debe introducir un ano!!</span>"
			?></p>
			<p>
			<input type="submit" value="Enviar" name="enviar"/>
			</p>
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.8 | FORMULARIO LOGIN USUARIO CONTRASENA
----------------------------------------------------------------------------
<?php
	// Comprueba si un valor esta vacio (incluye 0 y "0").
	// $_POST recibe datos enviados con method="post".
	if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
		if($_POST['usuario'] == "usuario" and $_POST["clave"] == "1234") {
			// Envia una cabecera HTTP; Location redirige a otra pagina.
			header("Location: loginprincipal.php");
		}else{
			$usuario=$_POST['usuario'];
			echo "<center><p>Usuario/contrasena incorrecto!</p></center>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST" align="center">
			<p>
			<label for = "usuario">Usuario</label>
			<input value = "<?php if(isset($usuario))echo $usuario;?>" id = "usuario" name = "usuario" type = "text">
			</p>
			<p>
			<label for = "clave">Clave</label>
			<input id = "clave" name = "clave" type = "password">
			</p>
			<p>
			<input type = "submit">
			</p>
		</form>
	</body>
</html>


----------------------------------------------------------------------------
 3.8 | LOGINPRINCIPAL
----------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<center><h3><p>Bienvenido al sistema</p></h3></center>
	</body>
</html>
