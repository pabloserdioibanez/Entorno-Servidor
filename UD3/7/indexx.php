<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chuleta examen: funciones, arrays y formularios</title>
</head>
<body>

<?php
/*
================================================================================
 INDICE (usa Ctrl+F y busca el codigo, por ejemplo  F3.  o  A6.  o  C4. )
================================================================================

 0. CHULETA DE SINTAXIS RAPIDA (esta misma cabecera)

 FUNCIONES
   F1.  parametros, valor por defecto, tipos y return
   F2.  recursividad (factorial, fibonacci, suma de digitos)
   F3.  devolver varios valores (array asociativo) y desestructurar
   F4.  paso por referencia (intercambiar, modificar un array)
   F5.  numero variable de argumentos (...$numeros)
   F6.  funciones anonimas y callbacks (array_map, array_filter, usort...)
   F7.  funciones clasicas (mcd, mcm, bisiesto, nota en texto, binario, perfecto)
   F8.  funciones que GENERAN HTML (select, radios, tabla)  <- muy util en formularios

 ARRAYS
   A1.  funciones de arrays con ejemplo (slice, splice, unique, diff, range...)
   A2.  algoritmos a mano (maximo y posicion, segundo mayor, invertir, rotar)
   A3.  contar frecuencias y palabras de una frase
   A4.  array asociativo: agenda (alta, baja, modificar, buscar)
   A5.  ordenar (sort, asort, ksort, usort con varios criterios)
   A6.  arrays multidimensionales (notas de alumnos y matriz 3x3)
   A7.  carrito de la compra (array de arrays + total + iva)
   A8.  aleatorios (loteria sin repetir, baraja, dos dados)
   A9.  pila y cola (push, pop, shift, unshift)

 FORMULARIOS
   C0.  PLANTILLA BASE para copiar (formulario + validacion + resultado)
   C1.  conversor de unidades (select generado con funcion)
   C2.  validar un DNI (regex + letra)
   C3.  pedido de pizza (radio + checkbox + select con arrays de precios)
   C4.  formulario en 2 pasos: pedir N y luego N campos (notas de N alumnos)
   C5.  adivina el numero (campos hidden)
   C6.  select multiple + radios generados con funcion
   C7.  registro con funciones de validacion reutilizables (usuario, pass, fecha)
   C8.  subir un fichero ($_FILES)
   C9.  tabla dinamica: filas x columnas pedidas por formulario
   C10. dias de un mes (selects de mes y anio)
   C11. enviar a otro archivo, redirigir con header() e include

================================================================================
 0. CHULETA DE SINTAXIS RAPIDA
================================================================================

 --- FUNCIONES --------------------------------------------------------------
   function nombre($a, $b = 5) { ... return $x; }     $b es opcional (va al final)
   function nombre(int $a, string $b): float { }      tipos (php 7+)
   function nombre(&$x) { }                           por referencia: modifica la de fuera
   function nombre(...$lista) { }                     $lista es un array con todos los args
   function nombre(): void { }                        no devuelve nada
   $f = function($x) { return $x * 2; };              funcion anonima
   $f = fn($x) => $x * 2;                             funcion flecha (php 7.4+)
   global $var;   static $var = 0;                    ambito: global / se conserva entre llamadas
   return array(a, b)  ->  [$a, $b] = funcion();      devolver varios valores

 --- ARRAYS -----------------------------------------------------------------
   $a = [1, 2, 3];   $a[] = 4;   $a["clave"] = "valor";
   count($a)   isset($a["k"])   array_key_exists("k", $a)   in_array(x, $a)
   array_search(valor, $a)   -> devuelve la CLAVE o false (comparar con !== false)
   unset($a["k"])            -> borra, NO reindexa. Para reindexar: array_values($a)
   array_push / array_pop    -> final         array_unshift / array_shift -> principio
   sort rsort                -> por valor, pierden las claves
   asort arsort              -> por valor, mantienen la clave
   ksort krsort              -> por clave
   usort($a, fn($x, $y) => $x <=> $y)      -> orden personalizado (pierde claves)
   implode(", ", $a)   explode(",", $texto)
   array_sum  array_product  min  max  array_unique  array_reverse  array_merge
   array_keys  array_values  array_flip  array_slice  array_splice  array_column
   array_map  array_filter  array_reduce  range(1, 10)  shuffle  array_rand
   foreach ($a as $valor)      foreach ($a as $clave => $valor)
   foreach ($a as &$v) { }  unset($v);   (modificar con referencia, SIEMPRE unset despues)
   print_r($a) dentro de pre  para depurar

 --- FORMULARIOS ------------------------------------------------------------
   form action="#ancla" method="post"       envia al mismo archivo
   cada campo necesita name="..."           ese name es la clave en $_POST["..."]
   hidden name="ej" value="x"               para saber que formulario se envio

   campo               HTML                                   PHP
   texto               input type=text name=n                 $_POST["n"]
   numero              input type=number name=n               $_POST["n"] (llega como texto)
   password            input type=password name=n             $_POST["n"]
   radio               input type=radio name=n value=a        $_POST["n"] (si no marcas, NO existe)
   checkbox simple     input type=checkbox name=n             isset($_POST["n"])
   checkbox multiple   input type=checkbox name=n[] value=a   $_POST["n"] es un ARRAY (o no existe)
   select              select name=n option value=a           $_POST["n"]
   select multiple     select name=n[] multiple               $_POST["n"] es un ARRAY
   textarea            textarea name=n                        $_POST["n"]
   fichero             input type=file name=n                 $_FILES["n"]  (+ enctype multipart)
   varios inputs       input name=notas[]  (repetido)         $_POST["notas"] es un array

   validar:  filter_var($x, FILTER_VALIDATE_INT)     entero  (false si no vale, el 0 SI vale)
             filter_var($x, FILTER_VALIDATE_FLOAT)   decimal
             filter_var($x, FILTER_VALIDATE_EMAIL)   email
             preg_match("/patron/", $x)              expresion regular (1 = encaja)
             trim($x)                                quita espacios
             htmlspecialchars($x)                    SIEMPRE al mostrar lo que escribe el usuario

   mantener lo escrito:  en el value del input, hacer echo de htmlspecialchars($valor)
                         en radio / checkbox / option: poner  checked / selected  con un ternario
                         (mira C0 y C3 para ver como se hace)

 --- TRUCOS DE SINTAXIS HTML + PHP -------------------------------------------
   sintaxis alternativa (muy comoda para mezclar con html):
       if (cond):  elseif (cond):  else:  endif;
       foreach ($a as $x):  endforeach;      for (...):  endfor;
   el cierre de php nunca dentro de un comentario con //

 --- ERRORES CLASICOS --------------------------------------------------------
   - leer $_POST["x"] sin isset (o sin ??)         -> undefined array key
   - strpos / array_search / filter_var sin !== false
   - un radio o checkbox sin marcar no llega a $_POST
   - olvidar name="x[]" en checkbox multiple (solo llegaria el ultimo)
   - olvidar el & en foreach por referencia, o el unset($v) posterior
   - dividir entre 0
   - usar unset en array indexado y luego for con count (quedan huecos): array_values
   - poner header("Location: ...") despues de haber escrito html (error "headers already sent")
================================================================================
*/
?>


<!-- ########################################################################
     ########################   F U N C I O N E S   ########################
     ######################################################################## -->
<h1>FUNCIONES</h1>

<!-- ============================================================ -->
<h2 id="F1">F1. parametros, valor por defecto, tipos y return</h2>
<?php
// enunciado: crear funciones con parametros opcionales, con tipos y sin return

// $saludo es opcional: si no se pasa, vale "Hola". Los opcionales van SIEMPRE al final.
// string / int / float / bool / array delante del parametro = tipo esperado
// : string despues de los parentesis = tipo que devuelve
function saludar(string $nombre, string $saludo = "Hola"): string {
    return $saludo . ", " . $nombre;
}

// : void = no devuelve nada, solo hace algo (aqui, mostrar)
function mostrarLinea(string $texto): void {
    echo $texto . "<br>";
}

// una funcion puede tener varios return: en cuanto ejecuta uno, termina
function signo(int $n): string {
    if ($n > 0) {
        return "positivo";
    }
    if ($n < 0) {
        return "negativo";
    }
    return "cero";
}

mostrarLinea(saludar("Ana"));                  // Hola, Ana
mostrarLinea(saludar("Luis", "Buenas"));       // Buenas, Luis
mostrarLinea("7 es " . signo(7) . ", -2 es " . signo(-2) . ", 0 es " . signo(0));

// php 8+: argumentos con nombre, se pueden pasar en cualquier orden:
//   saludar(saludo: "Buenas", nombre: "Pepe");
?>

<!-- ============================================================ -->
<h2 id="F2">F2. recursividad (una funcion que se llama a si misma)</h2>
<?php
// regla de oro: SIEMPRE un caso base (donde para) y un caso recursivo (se llama con algo mas pequeno)

// factorial: 5! = 5 * 4!   y   1! = 1 (caso base)
function factorialRec(int $n): int {
    if ($n <= 1) {
        return 1;                       // caso base
    }
    return $n * factorialRec($n - 1);   // caso recursivo
}

// fibonacci: fib(n) = fib(n-1) + fib(n-2), con fib(0)=0 y fib(1)=1
function fibonacciRec(int $n): int {
    if ($n < 2) {
        return $n;                      // caso base
    }
    return fibonacciRec($n - 1) + fibonacciRec($n - 2);
}

// suma de digitos: 1234 -> 4 + suma(123)  (intdiv quita la ultima cifra)
function sumaDigitosRec(int $n): int {
    if ($n < 10) {
        return $n;
    }
    return ($n % 10) + sumaDigitosRec(intdiv($n, 10));
}

// potencia: base^exp = base * base^(exp-1)
function potenciaRec(int $base, int $exp): int {
    if ($exp === 0) {
        return 1;
    }
    return $base * potenciaRec($base, $exp - 1);
}

echo "5! = " . factorialRec(5) . "<br>";
echo "fibonacci(10) = " . fibonacciRec(10) . "<br>";
echo "suma de digitos de 1234 = " . sumaDigitosRec(1234) . "<br>";
echo "2^10 = " . potenciaRec(2, 10);
?>

<!-- ============================================================ -->
<h2 id="F3">F3. devolver varios valores (array) y desestructurar</h2>
<?php
// una funcion solo hace UN return, pero ese valor puede ser un array con todo lo que quieras

// array asociativo: se accede por nombre, mas claro que $resultado[0], $resultado[1]...
function estadisticas(array $nums): array {
    if (count($nums) === 0) {
        return array();  // evitamos dividir entre 0
    }
    return array(
        "minimo" => min($nums),
        "maximo" => max($nums),
        "suma"   => array_sum($nums),
        "media"  => array_sum($nums) / count($nums)
    );
}

// array indexado: lo recibimos con list / corchetes
function divisionCompleta(int $a, int $b): array {
    return array(intdiv($a, $b), $a % $b);   // cociente y resto
}

$datos = array(4, 12, 7, 20, 3);
$est = estadisticas($datos);

echo "media: " . $est["media"] . " | maximo: " . $est["maximo"] . "<br>";

// recorrer todo el resultado
foreach ($est as $nombre => $valor) {
    echo "$nombre = $valor<br>";
}

// desestructurar: sacar valores del array a variables sueltas
[$cociente, $resto] = divisionCompleta(17, 5);
echo "17 entre 5: cociente $cociente, resto $resto<br>";

// desestructurar asociativo (php 7.1+)
["minimo" => $mi, "maximo" => $ma] = $est;
echo "minimo $mi y maximo $ma";
?>

<!-- ============================================================ -->
<h2 id="F4">F4. paso por referencia (&)</h2>
<?php
// sin &: la funcion recibe una COPIA (lo de fuera no cambia)
// con &: la funcion recibe la variable ORIGINAL (lo de fuera cambia)

function intercambiar(&$a, &$b): void {
    $temporal = $a;
    $a = $b;
    $b = $temporal;
}

// modificar todos los elementos de un array: foreach con &$v + unset($v) al final
function duplicarTodos(array &$lista): void {
    foreach ($lista as &$v) {
        $v = $v * 2;
    }
    unset($v);   // IMPORTANTE: rompe la referencia que queda al terminar el foreach
}

// quitar los negativos del array original y devolver cuantos se quitaron
function quitarNegativos(array &$lista): int {
    $antes = count($lista);
    $lista = array_values(array_filter($lista, fn($n) => $n >= 0));  // reindexa
    return $antes - count($lista);
}

// anadir un elemento solo si no esta ya
function anadirSinRepetir(array &$lista, $elemento): bool {
    if (in_array($elemento, $lista)) {
        return false;
    }
    $lista[] = $elemento;
    return true;
}

$x = 5;
$y = 9;
intercambiar($x, $y);
echo "tras intercambiar: x=$x y=$y<br>";

$numeros = array(1, -4, 3, -7, 5);
duplicarTodos($numeros);
echo "duplicados: " . implode(", ", $numeros) . "<br>";   // 2, -8, 6, -14, 10

$quitados = quitarNegativos($numeros);
echo "quitados $quitados negativos: " . implode(", ", $numeros) . "<br>";

anadirSinRepetir($numeros, 6);    // ya esta
anadirSinRepetir($numeros, 99);   // se anade
echo "tras anadir: " . implode(", ", $numeros);
?>

<!-- ============================================================ -->
<h2 id="F5">F5. numero variable de argumentos (...$numeros)</h2>
<?php
// ...$numeros recoge TODOS los argumentos que se pasen en un array
function sumaTodos(...$numeros): float {
    return array_sum($numeros);
}

function mediaDe(...$numeros): float {
    if (count($numeros) === 0) {
        return 0;
    }
    return array_sum($numeros) / count($numeros);
}

// parametro normal + variable: el variable va el ultimo
function listar(string $titulo, ...$items): string {
    return $titulo . ": " . implode(", ", $items);
}

echo "suma(1,2,3) = " . sumaTodos(1, 2, 3) . "<br>";
echo "suma(10,20,30,40,50) = " . sumaTodos(10, 20, 30, 40, 50) . "<br>";
echo "media(4,8,6) = " . mediaDe(4, 8, 6) . "<br>";
echo listar("Frutas", "pera", "uva", "kiwi") . "<br>";

// al reves: el operador ... tambien "abre" un array al llamar a la funcion
$lista = array(5, 5, 5);
echo "suma del array con ...: " . sumaTodos(...$lista);

// alternativa antigua: func_get_args() devuelve los argumentos como array
?>

<!-- ============================================================ -->
<h2 id="F6">F6. funciones anonimas y callbacks</h2>
<?php
// callback = funcion que se pasa a otra funcion para que la use

$nums = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

// funcion anonima guardada en una variable
$cuadrado = function ($n) {
    return $n * $n;
};

// funcion flecha: una sola expresion, usa variables de fuera automaticamente
$iva = 21;
$conIva = fn($precio) => $precio * (1 + $iva / 100);

echo "cuadrado de 6: " . $cuadrado(6) . "<br>";
echo "100 con iva: " . $conIva(100) . "<br>";

// array_map: aplica la funcion a CADA elemento y devuelve otro array
echo "cuadrados: " . implode(", ", array_map($cuadrado, $nums)) . "<br>";

// array_filter: se queda con los que cumplen la condicion (CONSERVA las claves)
$pares = array_filter($nums, fn($n) => $n % 2 === 0);
echo "pares: " . implode(", ", $pares) . "<br>";
echo "pares reindexados: " . implode(", ", array_values($pares)) . "<br>";

// array_reduce: reduce el array a un unico valor ($acum = lo acumulado hasta ahora)
$producto = array_reduce($nums, fn($acum, $n) => $acum * $n, 1);
echo "producto de 1 a 10: $producto<br>";

// usort: ordenar con tu propio criterio. <=> devuelve -1, 0 o 1
$palabras = array("pera", "kiwi", "manzana", "uva");
usort($palabras, fn($a, $b) => strlen($a) <=> strlen($b));   // por longitud
echo "por longitud: " . implode(", ", $palabras) . "<br>";

// pasar una funcion como parametro a TU funcion (callable)
function aplicarATodos(array $lista, callable $funcion): array {
    $resultado = array();
    foreach ($lista as $elemento) {
        $resultado[] = $funcion($elemento);
    }
    return $resultado;
}
echo "dobles: " . implode(", ", aplicarATodos(array(1, 2, 3), fn($n) => $n * 2));
?>

<!-- ============================================================ -->
<h2 id="F7">F7. funciones clasicas de examen</h2>
<?php
// maximo comun divisor (algoritmo de euclides)
function mcd(int $a, int $b): int {
    while ($b != 0) {
        $temporal = $b;
        $b = $a % $b;
        $a = $temporal;
    }
    return $a;
}

// minimo comun multiplo: (a * b) / mcd
function mcm(int $a, int $b): int {
    return intdiv($a * $b, mcd($a, $b));
}

// bisiesto: divisible por 4 Y (no divisible por 100 O divisible por 400)
function esBisiesto(int $anio): bool {
    return ($anio % 4 == 0 && $anio % 100 != 0) || $anio % 400 == 0;
}

// nota numerica -> texto
function notaEnTexto(float $nota): string {
    if ($nota < 0 || $nota > 10) {
        return "nota no valida";
    } else if ($nota < 5) {
        return "suspenso";
    } else if ($nota < 6) {
        return "suficiente";
    } else if ($nota < 7) {
        return "bien";
    } else if ($nota < 9) {
        return "notable";
    }
    return "sobresaliente";
}

// decimal a binario a mano (dividir entre 2 y guardar restos al reves)
function aBinario(int $n): string {
    if ($n === 0) {
        return "0";
    }
    $binario = "";
    while ($n > 0) {
        $binario = ($n % 2) . $binario;   // el resto se pega por la IZQUIERDA
        $n = intdiv($n, 2);
    }
    return $binario;   // atajo: decbin($n)
}

// numero perfecto: la suma de sus divisores (sin contarse el) es el propio numero. 6 = 1+2+3
function esPerfecto(int $n): bool {
    $suma = 0;
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) {
            $suma += $i;
        }
    }
    return $n > 1 && $suma === $n;
}

// invertir un numero con matematicas (sin strrev): 123 -> 321
function invertirNumero(int $n): int {
    $inverso = 0;
    while ($n > 0) {
        $inverso = $inverso * 10 + $n % 10;   // anadimos la ultima cifra
        $n = intdiv($n, 10);
    }
    return $inverso;
}

echo "mcd(12, 18) = " . mcd(12, 18) . " | mcm(4, 6) = " . mcm(4, 6) . "<br>";
echo "2024 bisiesto? " . (esBisiesto(2024) ? "si" : "no") . " | 1900? " . (esBisiesto(1900) ? "si" : "no") . "<br>";
echo "nota 7.5: " . notaEnTexto(7.5) . "<br>";
echo "10 en binario: " . aBinario(10) . "<br>";
echo "perfectos hasta 500: ";
for ($n = 1; $n <= 500; $n++) {
    if (esPerfecto($n)) {
        echo $n . " ";
    }
}
echo "<br>invertir 12345: " . invertirNumero(12345);
?>

<!-- ============================================================ -->
<h2 id="F8">F8. funciones que generan HTML (select, radios, tabla)</h2>
<?php
// estas funciones se reutilizan en los formularios (C1, C6, C10)
// idea: en vez de escribir 12 option a mano, se genera con un array

// genera un select. $opciones = array(valor => texto). $seleccionado = valor marcado
function crearSelect(string $name, array $opciones, $seleccionado = ""): string {
    $html = "<select name=\"$name\">";
    foreach ($opciones as $valor => $texto) {
        // comparamos como texto: los valores de POST siempre llegan como texto
        $marcado = ((string) $valor === (string) $seleccionado) ? " selected" : "";
        $html .= "<option value=\"" . htmlspecialchars((string) $valor) . "\"$marcado>"
               . htmlspecialchars((string) $texto) . "</option>";
    }
    return $html . "</select>";
}

// genera botones de radio (todos con el mismo name)
function crearRadios(string $name, array $opciones, $seleccionado = ""): string {
    $html = "";
    foreach ($opciones as $valor => $texto) {
        $marcado = ((string) $valor === (string) $seleccionado) ? " checked" : "";
        $html .= "<label><input type=\"radio\" name=\"$name\" value=\""
               . htmlspecialchars((string) $valor) . "\"$marcado> "
               . htmlspecialchars((string) $texto) . "</label> ";
    }
    return $html;
}

// genera una tabla a partir de cabeceras y filas (array de arrays)
function crearTabla(array $cabeceras, array $filas): string {
    $html = "<table border='1'><tr>";
    foreach ($cabeceras as $cabecera) {
        $html .= "<th>" . htmlspecialchars((string) $cabecera) . "</th>";
    }
    $html .= "</tr>";
    foreach ($filas as $fila) {
        $html .= "<tr>";
        foreach ($fila as $celda) {
            $html .= "<td>" . htmlspecialchars((string) $celda) . "</td>";
        }
        $html .= "</tr>";
    }
    return $html . "</table>";
}

// utilidades para mostrar arrays rapido en cualquier ejercicio
function mostrarArray(array $a): string {
    return "[" . implode(", ", $a) . "]";
}
function mostrarAsoc(array $a): string {
    $partes = array();
    foreach ($a as $clave => $valor) {
        $partes[] = "$clave=>$valor";
    }
    return "[" . implode(", ", $partes) . "]";
}

// uso:
$listaMeses = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo");
echo crearSelect("mes", $listaMeses, 2) . "<br>";
echo crearRadios("talla", array("s" => "S", "m" => "M", "l" => "L"), "m") . "<br><br>";
echo crearTabla(array("Producto", "Precio"), array(array("Pan", 1.2), array("Leche", 0.9)));
?>

<hr>


<!-- ########################################################################
     ############################   A R R A Y S   ###########################
     ######################################################################## -->
<h1>ARRAYS</h1>

<!-- ============================================================ -->
<h2 id="A1">A1. funciones de arrays con ejemplo</h2>
<?php
$n = array(5, 3, 8, 3, 9, 1, 8);
echo "original: " . mostrarArray($n) . "<br>";

// recorrer de las 3 formas
for ($i = 0; $i < count($n); $i++) {        // por posicion
    echo $n[$i] . " ";
}
echo "<br>";
foreach ($n as $valor) {                     // solo valores
    echo $valor . " ";
}
echo "<br>";
foreach ($n as $posicion => $valor) {        // posicion y valor
    echo "[$posicion]=$valor ";
}
echo "<br><br>";

// array_slice(array, desde, cuantos): COPIA un trozo (no modifica el original)
echo "slice(1,3): " . mostrarArray(array_slice($n, 1, 3)) . "<br>";
echo "ultimos 2: " . mostrarArray(array_slice($n, -2)) . "<br>";

// array_splice(array, desde, cuantos, reemplazo): MODIFICA el original (quita / inserta)
$copia = $n;
array_splice($copia, 1, 2);                 // quita 2 elementos desde la posicion 1
echo "tras splice quitar: " . mostrarArray($copia) . "<br>";
$copia = $n;
array_splice($copia, 2, 0, array(100, 200)); // inserta sin quitar nada (cuantos = 0)
echo "tras splice insertar: " . mostrarArray($copia) . "<br>";

echo "unique (sin repetidos): " . mostrarArray(array_values(array_unique($n))) . "<br>";
echo "veces de cada uno: " . mostrarAsoc(array_count_values($n)) . "<br>";
echo "diff (estan en A y no en B): " . mostrarArray(array_diff($n, array(3, 8))) . "<br>";
echo "intersect (estan en los dos): " . mostrarArray(array_values(array_intersect($n, array(3, 8, 50)))) . "<br>";
echo "range(1,10,3): " . mostrarArray(range(1, 10, 3)) . "<br>";      // 1,4,7,10
echo "range('a','e'): " . mostrarArray(range('a', 'e')) . "<br>";
echo "array_fill(0,5,0): " . mostrarArray(array_fill(0, 5, 0)) . "<br>";
echo "array_sum: " . array_sum($n) . " | array_product: " . array_product(array(1, 2, 3, 4)) . "<br>";

// array_chunk: trocea en grupos de N
foreach (array_chunk($n, 3) as $grupo) {
    echo "grupo: " . mostrarArray($grupo) . " ";
}
echo "<br>";

// array_combine: claves de un array + valores de otro
$comb = array_combine(array("a", "b", "c"), array(1, 2, 3));
echo "combine: " . mostrarAsoc($comb) . "<br>";

// array_column: saca una columna de un array de arrays
$gente = array(array("nombre" => "Ana", "edad" => 20), array("nombre" => "Luis", "edad" => 30));
echo "column nombre: " . mostrarArray(array_column($gente, "nombre")) . "<br>";

// primera y ultima clave (php 7.3+)
echo "primera clave: " . array_key_first($n) . " | ultima: " . array_key_last($n) . "<br>";

// array_reverse con claves y rellenar con valor
echo "reverse: " . mostrarArray(array_reverse($n)) . "<br>";

// array_pad: rellenar hasta tener N elementos
echo "pad a 9: " . mostrarArray(array_pad($n, 9, 0));
?>

<!-- ============================================================ -->
<h2 id="A2">A2. algoritmos a mano (sin funciones magicas)</h2>
<?php
// el examen a veces PROHIBE usar max(), sort()... asi que hay que saberlo a mano

// posicion del maximo: guardamos la POSICION y comparamos contra el que hay ahi
function posicionMaximo(array $a): int {
    $pos = 0;
    for ($i = 1; $i < count($a); $i++) {
        if ($a[$i] > $a[$pos]) {
            $pos = $i;
        }
    }
    return $pos;
}

// segundo mayor (sin repetidos): quitamos duplicados, ordenamos de mayor a menor
function segundoMayor(array $a) {
    $unicos = array_unique($a);
    rsort($unicos);
    return $unicos[1] ?? null;   // si no hay segundo, null
}

// invertir un array a mano
function invertirManual(array $a): array {
    $resultado = array();
    for ($i = count($a) - 1; $i >= 0; $i--) {
        $resultado[] = $a[$i];
    }
    return $resultado;
}

// rotar a la derecha una posicion: el ultimo pasa a ser el primero
function rotarDerecha(array $a): array {
    $ultimo = array_pop($a);
    array_unshift($a, $ultimo);
    return $a;
}

// hay repetidos?
function hayRepetidos(array $a): bool {
    return count($a) !== count(array_unique($a));
}

// ordenacion por burbuja (comparar vecinos e intercambiarlos)
function burbuja(array $a): array {
    $n = count($a);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - 1 - $i; $j++) {
            if ($a[$j] > $a[$j + 1]) {
                $temporal = $a[$j];
                $a[$j] = $a[$j + 1];
                $a[$j + 1] = $temporal;
            }
        }
    }
    return $a;
}

$datos = array(14, 3, 27, 8, 27, 1);
$pos = posicionMaximo($datos);
echo "array: " . mostrarArray($datos) . "<br>";
echo "maximo " . $datos[$pos] . " en la posicion $pos<br>";
echo "segundo mayor: " . segundoMayor($datos) . "<br>";
echo "invertido: " . mostrarArray(invertirManual($datos)) . "<br>";
echo "rotado: " . mostrarArray(rotarDerecha($datos)) . "<br>";
echo "hay repetidos? " . (hayRepetidos($datos) ? "si" : "no") . "<br>";
echo "burbuja: " . mostrarArray(burbuja($datos));
?>

<!-- ============================================================ -->
<h2 id="A3">A3. contar frecuencias y palabras de una frase</h2>
<?php
// patron CLAVE: contador con array asociativo. $conteo[$dato] = ($conteo[$dato] ?? 0) + 1
$votos = array("rojo", "azul", "rojo", "verde", "azul", "rojo");
$conteo = array();
foreach ($votos as $voto) {
    $conteo[$voto] = ($conteo[$voto] ?? 0) + 1;   // si no existia, parte de 0
}
echo "conteo: " . mostrarAsoc($conteo) . "<br>";

arsort($conteo);   // de mas a menos manteniendo la clave
echo "el mas votado: " . array_key_first($conteo) . " con " . reset($conteo) . " votos<br><br>";

// contar palabras de una frase
$frase = "el perro y el gato y el loro";
$palabras = explode(" ", strtolower($frase));
$conteoPalabras = array_count_values($palabras);   // atajo de lo anterior
arsort($conteoPalabras);
foreach ($conteoPalabras as $palabra => $veces) {
    echo "$palabra: $veces<br>";
}

// separar pares e impares en dos arrays
$mezcla = array(1, 2, 3, 4, 5, 6, 7);
$losPares = array();
$losImpares = array();
foreach ($mezcla as $numero) {
    if ($numero % 2 == 0) {
        $losPares[] = $numero;
    } else {
        $losImpares[] = $numero;
    }
}
echo "<br>pares: " . mostrarArray($losPares) . " | impares: " . mostrarArray($losImpares);
?>

<!-- ============================================================ -->
<h2 id="A4">A4. array asociativo: agenda (alta, baja, modificar, buscar)</h2>
<?php
$agenda = array(
    "Ana"   => "600111222",
    "Luis"  => "600333444",
    "Marta" => "600555666"
);

// alta o modificacion: es LA MISMA instruccion (si la clave existe, la sobreescribe)
$agenda["Pedro"] = "600777888";
$agenda["Ana"] = "611000000";

// baja
unset($agenda["Luis"]);

// buscar por clave (nombre -> telefono)
$buscado = "Marta";
if (array_key_exists($buscado, $agenda)) {
    echo "telefono de $buscado: " . $agenda[$buscado] . "<br>";
} else {
    echo "$buscado no esta en la agenda<br>";
}

// buscar por valor (telefono -> nombre). array_search devuelve la clave o false
$quien = array_search("600777888", $agenda);
echo "el 600777888 es de: " . ($quien !== false ? $quien : "nadie") . "<br>";

// ordenar por nombre y mostrar en tabla
ksort($agenda);
echo "<table border='1'><tr><th>Nombre</th><th>Telefono</th></tr>";
foreach ($agenda as $nombre => $telefono) {
    echo "<tr><td>$nombre</td><td>$telefono</td></tr>";
}
echo "</table>";
echo "contactos: " . count($agenda);

// funcion con referencia para borrar y avisar
function borrarContacto(array &$agenda, string $nombre): bool {
    if (!array_key_exists($nombre, $agenda)) {
        return false;
    }
    unset($agenda[$nombre]);
    return true;
}
echo "<br>borrar Pedro: " . (borrarContacto($agenda, "Pedro") ? "ok" : "no existe");
echo " | borrar Zoe: " . (borrarContacto($agenda, "Zoe") ? "ok" : "no existe");
?>

<!-- ============================================================ -->
<h2 id="A5">A5. ordenar arrays</h2>
<?php
$precios = array("pan" => 1.2, "leche" => 0.9, "huevos" => 2.5, "arroz" => 1.0);

// cada demo con una COPIA porque estas funciones modifican el array original
$c = $precios; sort($c);   echo "sort  (valor, pierde claves): " . mostrarAsoc($c) . "<br>";
$c = $precios; rsort($c);  echo "rsort (valor desc, pierde claves): " . mostrarAsoc($c) . "<br>";
$c = $precios; asort($c);  echo "asort (valor, mantiene clave): " . mostrarAsoc($c) . "<br>";
$c = $precios; arsort($c); echo "arsort (valor desc, mantiene clave): " . mostrarAsoc($c) . "<br>";
$c = $precios; ksort($c);  echo "ksort (clave): " . mostrarAsoc($c) . "<br>";
$c = $precios; krsort($c); echo "krsort (clave desc): " . mostrarAsoc($c) . "<br><br>";

// usort con varios criterios: array de arrays
$alumnos = array(
    array("nombre" => "Marta", "nota" => 7),
    array("nombre" => "Ana",   "nota" => 9),
    array("nombre" => "Luis",  "nota" => 7),
    array("nombre" => "Zoe",   "nota" => 5)
);

// 1o nota de mayor a menor; si empatan, por nombre A-Z
// $a <=> $b : de menor a mayor.  $b <=> $a : de mayor a menor.  strcmp compara textos
usort($alumnos, function ($a, $b) {
    if ($a["nota"] == $b["nota"]) {
        return strcmp($a["nombre"], $b["nombre"]);
    }
    return $b["nota"] <=> $a["nota"];
});

foreach ($alumnos as $alumno) {
    echo $alumno["nombre"] . ": " . $alumno["nota"] . "<br>";
}
?>

<!-- ============================================================ -->
<h2 id="A6">A6. arrays multidimensionales (notas de alumnos y matriz)</h2>
<?php
// --- parte 1: array asociativo de arrays asociativos ---
$clase = array(
    "Ana"   => array("mates" => 7, "lengua" => 6, "ingles" => 9),
    "Luis"  => array("mates" => 4, "lengua" => 5, "ingles" => 6),
    "Marta" => array("mates" => 10, "lengua" => 8, "ingles" => 9)
);

$asignaturas = array_keys(reset($clase));   // nombres de las asignaturas (del primer alumno)

echo "<table border='1'><tr><th>Alumno</th>";
foreach ($asignaturas as $asig) {
    echo "<th>$asig</th>";
}
echo "<th>Media</th></tr>";

$mejorNombre = "";
$mejorMedia = -1;
$sumaPorAsig = array_fill_keys($asignaturas, 0);   // contadores a 0 para cada asignatura

foreach ($clase as $alumno => $notas) {
    echo "<tr><td>$alumno</td>";
    foreach ($notas as $asig => $nota) {
        echo "<td>$nota</td>";
        $sumaPorAsig[$asig] += $nota;               // acumulamos para la media de columna
    }
    $media = array_sum($notas) / count($notas);     // media de la fila
    echo "<td>" . number_format($media, 2) . "</td></tr>";

    if ($media > $mejorMedia) {
        $mejorMedia = $media;
        $mejorNombre = $alumno;
    }
}

echo "<tr><td><b>Media</b></td>";
foreach ($sumaPorAsig as $asig => $suma) {
    echo "<td>" . number_format($suma / count($clase), 2) . "</td>";
}
echo "<td></td></tr></table>";
echo "mejor alumno: $mejorNombre (" . number_format($mejorMedia, 2) . ")<br><br>";

// --- parte 2: matriz numerica ---
$matriz = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);
$tam = count($matriz);

// suma por filas, por columnas y diagonales
for ($f = 0; $f < $tam; $f++) {
    echo "suma fila $f: " . array_sum($matriz[$f]) . " | ";
}
echo "<br>";
for ($c = 0; $c < $tam; $c++) {
    $sumaCol = 0;
    for ($f = 0; $f < $tam; $f++) {
        $sumaCol += $matriz[$f][$c];
    }
    echo "suma columna $c: $sumaCol | ";
}

$diagPrincipal = 0;
$diagSecundaria = 0;
for ($i = 0; $i < $tam; $i++) {
    $diagPrincipal += $matriz[$i][$i];                 // 00, 11, 22
    $diagSecundaria += $matriz[$i][$tam - 1 - $i];     // 02, 11, 20
}
echo "<br>diagonal principal: $diagPrincipal | secundaria: $diagSecundaria<br>";

// traspuesta: filas pasan a columnas
$traspuesta = array();
for ($f = 0; $f < $tam; $f++) {
    for ($c = 0; $c < $tam; $c++) {
        $traspuesta[$c][$f] = $matriz[$f][$c];
    }
}
echo "traspuesta:<br>";
foreach ($traspuesta as $fila) {
    echo implode(" ", $fila) . "<br>";
}
?>

<!-- ============================================================ -->
<h2 id="A7">A7. carrito de la compra (array de arrays, total e iva)</h2>
<?php
$carrito = array(
    array("producto" => "Camiseta",  "precio" => 15.50, "cantidad" => 2),
    array("producto" => "Pantalon",  "precio" => 32.00, "cantidad" => 1),
    array("producto" => "Calcetines", "precio" => 4.25, "cantidad" => 3)
);

// anadir un producto con funcion (por referencia). Si ya existe, suma la cantidad.
function anadirAlCarrito(array &$carrito, string $producto, float $precio, int $cantidad): void {
    foreach ($carrito as &$linea) {
        if ($linea["producto"] === $producto) {
            $linea["cantidad"] += $cantidad;
            unset($linea);
            return;
        }
    }
    unset($linea);
    $carrito[] = array("producto" => $producto, "precio" => $precio, "cantidad" => $cantidad);
}

anadirAlCarrito($carrito, "Camiseta", 15.50, 1);    // ya existe: suma
anadirAlCarrito($carrito, "Gorra", 9.99, 1);        // nuevo

// quitar por posicion: unset + array_values para que no queden huecos
unset($carrito[1]);
$carrito = array_values($carrito);

$total = 0;
echo "<table border='1'><tr><th>Producto</th><th>Precio</th><th>Cant.</th><th>Subtotal</th></tr>";
foreach ($carrito as $linea) {
    $subtotal = $linea["precio"] * $linea["cantidad"];
    $total += $subtotal;
    // number_format(numero, decimales, separador decimal, separador miles)
    echo "<tr><td>" . $linea["producto"] . "</td><td>" . number_format($linea["precio"], 2, ",", ".")
       . "</td><td>" . $linea["cantidad"] . "</td><td>" . number_format($subtotal, 2, ",", ".") . "</td></tr>";
}
echo "</table>";

$iva = $total * 0.21;
echo "base: " . number_format($total, 2, ",", ".") . " | iva 21%: " . number_format($iva, 2, ",", ".")
   . " | total: " . number_format($total + $iva, 2, ",", ".") . "<br>";

// atajos con array_column
$precios = array_column($carrito, "precio");
echo "producto mas caro: " . max($precios) . " | mas barato: " . min($precios) . "<br>";
echo "unidades totales: " . array_sum(array_column($carrito, "cantidad"));
?>

<!-- ============================================================ -->
<h2 id="A8">A8. aleatorios (loteria, baraja, dos dados)</h2>
<?php
// loteria: 6 numeros del 1 al 49 SIN repetir
$loteria = array();
while (count($loteria) < 6) {
    $numero = rand(1, 49);
    if (!in_array($numero, $loteria)) {   // solo lo guardamos si no estaba
        $loteria[] = $numero;
    }
}
sort($loteria);
echo "loteria: " . mostrarArray($loteria) . "<br>";

// alternativa mas corta: barajar todos y coger los 6 primeros
$bombo = range(1, 49);
shuffle($bombo);
$alt = array_slice($bombo, 0, 6);
sort($alt);
echo "loteria (shuffle): " . mostrarArray($alt) . "<br><br>";

// baraja: palos x numeros con dos bucles anidados, barajar y repartir 5 cartas
$palos = array("Oros", "Copas", "Espadas", "Bastos");
$baraja = array();
foreach ($palos as $palo) {
    for ($valor = 1; $valor <= 12; $valor++) {
        $baraja[] = "$valor de $palo";
    }
}
shuffle($baraja);
$mano = array_slice($baraja, 0, 5);
echo "mi mano: " . implode(" | ", $mano) . "<br><br>";

// 1000 tiradas de dos dados: contar cuantas veces sale cada suma (2 a 12)
$sumas = array_fill_keys(range(2, 12), 0);   // [2=>0, 3=>0, ..., 12=>0]
for ($i = 0; $i < 1000; $i++) {
    $suma = rand(1, 6) + rand(1, 6);
    $sumas[$suma]++;
}
foreach ($sumas as $suma => $veces) {
    echo "suma $suma: $veces veces<br>";
}

// un elemento al azar de un array
$colores = array("rojo", "verde", "azul");
echo "color al azar: " . $colores[array_rand($colores)];
?>

<!-- ============================================================ -->
<h2 id="A9">A9. pila y cola</h2>
<?php
// PILA (LIFO: el ultimo en entrar es el primero en salir): array_push / array_pop
$pila = array();
array_push($pila, "A");
array_push($pila, "B");
array_push($pila, "C");
echo "saco de la pila: " . array_pop($pila) . "<br>";     // C
echo "pila ahora: " . mostrarArray($pila) . "<br>";

// COLA (FIFO: el primero en entrar es el primero en salir): array_push / array_shift
$cola = array();
array_push($cola, "Ana");
array_push($cola, "Luis");
array_push($cola, "Marta");
echo "atiendo a: " . array_shift($cola) . "<br>";         // Ana
echo "cola ahora: " . mostrarArray($cola) . "<br>";

// meter al principio
array_unshift($cola, "VIP");
echo "con VIP: " . mostrarArray($cola);
?>

<hr>


<!-- ########################################################################
     ########################   F O R M U L A R I O S   #####################
     ######################################################################## -->
<h1>FORMULARIOS</h1>

<!-- ============================================================ -->
<h2 id="C0">C0. PLANTILLA BASE (copiar y adaptar)</h2>
<!--
    ESQUELETO de CASI cualquier ejercicio de formulario:
      1. valores por defecto (para que el formulario funcione en la primera carga)
      2. si se envio este formulario (isset + hidden "ej"): recoger, validar, calcular
      3. el formulario (con value / checked / selected para no perder lo escrito)
      4. mostrar errores o resultado
    cambia "c0" por un nombre distinto en cada formulario de la pagina
-->

<?php
// 1. valores por defecto
$c0_nombre = "";
$c0_edad = "";
$c0_errores = array();
$c0_enviado = false;

// 2. recoger y validar
if (isset($_POST["ej"]) && $_POST["ej"] === "c0") {
    $c0_enviado = true;

    $c0_nombre = trim($_POST["nombre"] ?? "");   // ?? "" evita el undefined key
    $c0_edad = trim($_POST["edad"] ?? "");

    if ($c0_nombre === "") {
        $c0_errores[] = "El nombre no puede estar vacio";
    }
    if (filter_var($c0_edad, FILTER_VALIDATE_INT) === false || (int) $c0_edad < 0) {
        $c0_errores[] = "La edad debe ser un entero positivo";
    }
}
?>

<!-- 3. el formulario -->
<form action="#C0" method="post">
    <input type="hidden" name="ej" value="c0">
    Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($c0_nombre) ?>"><br>
    Edad: <input type="text" name="edad" value="<?= htmlspecialchars($c0_edad) ?>"><br>
    <input type="submit" value="Enviar">
</form>

<?php
// 4. resultado o errores
if ($c0_enviado) {
    if (count($c0_errores) > 0) {
        echo "<ul>";
        foreach ($c0_errores as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Hola " . htmlspecialchars($c0_nombre) . ", tienes " . (int) $c0_edad . " anios</p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C1">C1. conversor de unidades (select generado con funcion)</h2>
<!-- enunciado: pedir un valor y elegir una conversion en un select. mostrar el resultado -->

<?php
$c1_modos = array(
    "c2f"     => "Celsius a Fahrenheit",
    "f2c"     => "Fahrenheit a Celsius",
    "eur2usd" => "Euros a Dolares (x1.08)",
    "km2mi"   => "Kilometros a millas"
);

// ?float = devuelve un float o null (null = modo desconocido)
function convertirUnidad(float $valor, string $modo): ?float {
    switch ($modo) {
        case "c2f":     return $valor * 9 / 5 + 32;
        case "f2c":     return ($valor - 32) * 5 / 9;
        case "eur2usd": return $valor * 1.08;
        case "km2mi":   return $valor * 0.621371;
        default:        return null;
    }
}
?>

<form action="#C1" method="post">
    <input type="hidden" name="ej" value="c1">
    Valor: <input type="text" name="valor" value="<?= htmlspecialchars($_POST["valor"] ?? "") ?>"><br>
    <!-- el select lo pinta la funcion F8 y deja marcada la opcion elegida -->
    <?= crearSelect("modo", $c1_modos, $_POST["modo"] ?? "") ?><br>
    <input type="submit" value="Convertir">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c1") {
    $c1_valor = filter_var($_POST["valor"] ?? "", FILTER_VALIDATE_FLOAT);   // false si no es numero

    if ($c1_valor === false) {
        echo "<p>Introduce un numero valido</p>";
    } else {
        $c1_modo = $_POST["modo"] ?? "";
        $c1_resultado = convertirUnidad($c1_valor, $c1_modo);

        if ($c1_resultado === null) {
            echo "<p>Conversion no valida</p>";
        } else {
            echo "<p>" . $c1_modos[$c1_modo] . ": " . number_format($c1_valor, 2) . " = <b>"
               . number_format($c1_resultado, 2) . "</b></p>";
        }
    }
}
?>

<!-- ============================================================ -->
<h2 id="C2">C2. validar un DNI (regex + letra)</h2>
<!-- enunciado: pedir un DNI (8 numeros y una letra) y comprobar formato y letra correcta -->

<?php
function letraDelDni(int $numero): string {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    return $letras[$numero % 23];      // un texto se lee como array: $texto[posicion]
}

function validarDni(string $dni): bool {
    // 8 digitos + 1 letra (mayuscula o minuscula)
    if (!preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
        return false;
    }
    $numero = (int) substr($dni, 0, 8);        // los 8 primeros caracteres
    $letra = strtoupper($dni[8]);              // el noveno caracter
    return letraDelDni($numero) === $letra;
}
?>

<form action="#C2" method="post">
    <input type="hidden" name="ej" value="c2">
    DNI: <input type="text" name="dni" maxlength="9" value="<?= htmlspecialchars($_POST["dni"] ?? "") ?>">
    <input type="submit" value="Validar">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c2") {
    $c2_dni = trim($_POST["dni"] ?? "");

    if (validarDni($c2_dni)) {
        echo "<p>El DNI " . htmlspecialchars($c2_dni) . " es <b>correcto</b></p>";
    } else if (preg_match("/^[0-9]{8}$/", $c2_dni)) {
        // solo pusieron los numeros: les decimos su letra
        echo "<p>Te falta la letra. Tu DNI completo es: " . $c2_dni . letraDelDni((int) $c2_dni) . "</p>";
    } else {
        echo "<p>DNI <b>incorrecto</b> (formato o letra)</p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C3">C3. pedido de pizza (radio + checkbox + select con arrays de precios)</h2>
<!-- enunciado: elegir tamano (radio), ingredientes (checkbox multiple) y bebida (select).
     calcular el precio. los precios estan en arrays asociativos, no en if gigantes -->

<?php
$c3_tamanos = array("pequena" => 8, "mediana" => 10, "grande" => 12);
$c3_ingredientes = array("queso" => 1, "jamon" => 1.5, "champinones" => 1, "pina" => 1.2);
$c3_bebidas = array("ninguna" => 0, "agua" => 1, "refresco" => 2, "cerveza" => 2.5);

// lo que estaba marcado (para no perderlo si hay error o al recargar)
$c3_tam_sel = "";
$c3_ing_sel = array();
$c3_beb_sel = "ninguna";
if (isset($_POST["ej"]) && $_POST["ej"] === "c3") {
    $c3_tam_sel = $_POST["tamano"] ?? "";
    $c3_ing_sel = (isset($_POST["ingredientes"]) && is_array($_POST["ingredientes"])) ? $_POST["ingredientes"] : array();
    $c3_beb_sel = $_POST["bebida"] ?? "ninguna";
}
?>

<form action="#C3" method="post">
    <input type="hidden" name="ej" value="c3">

    Tamano:
    <?php foreach ($c3_tamanos as $clave => $precio): ?>
        <label>
            <input type="radio" name="tamano" value="<?= $clave ?>" <?= $c3_tam_sel === $clave ? "checked" : "" ?>>
            <?= $clave ?> (<?= $precio ?> euros)
        </label>
    <?php endforeach; ?>
    <br>

    Ingredientes extra:
    <?php foreach ($c3_ingredientes as $clave => $precio): ?>
        <!-- name con [] para que lleguen todos juntos en un array -->
        <label>
            <input type="checkbox" name="ingredientes[]" value="<?= $clave ?>" <?= in_array($clave, $c3_ing_sel) ? "checked" : "" ?>>
            <?= $clave ?> (+<?= $precio ?>)
        </label>
    <?php endforeach; ?>
    <br>

    Bebida:
    <select name="bebida">
        <?php foreach ($c3_bebidas as $clave => $precio): ?>
            <option value="<?= $clave ?>" <?= $c3_beb_sel === $clave ? "selected" : "" ?>><?= $clave ?> (<?= $precio ?>)</option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Calcular pedido">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c3") {
    // array_key_exists: nos protege de que manipulen el formulario con valores inventados
    if (!array_key_exists($c3_tam_sel, $c3_tamanos)) {
        echo "<p>Debes elegir un tamano</p>";
    } else {
        $c3_total = $c3_tamanos[$c3_tam_sel];
        $c3_detalle = array("pizza " . $c3_tam_sel);

        foreach ($c3_ing_sel as $ingrediente) {
            if (array_key_exists($ingrediente, $c3_ingredientes)) {
                $c3_total += $c3_ingredientes[$ingrediente];
                $c3_detalle[] = $ingrediente;
            }
        }

        if (array_key_exists($c3_beb_sel, $c3_bebidas)) {
            $c3_total += $c3_bebidas[$c3_beb_sel];
            $c3_detalle[] = "bebida: " . $c3_beb_sel;
        }

        echo "<p>Pedido: " . htmlspecialchars(implode(", ", $c3_detalle)) . "<br>";
        echo "<b>Total: " . number_format($c3_total, 2) . " euros</b></p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C4">C4. formulario en 2 pasos (pedir N y luego N campos)</h2>
<!-- enunciado: primero se pregunta cuantos alumnos hay. despues aparece un formulario con
     tantos campos (nombre y nota) como alumnos. por ultimo se muestra la tabla y la media.
     claves: inputs con name="notas[]" (llegan como array) y un hidden "paso" para saber en que paso estamos.
     la sintaxis if: / elseif: / else: / endif; permite mezclar html y php limpiamente -->

<?php
$c4_paso = "1";
$c4_n = 0;
$c4_error = "";

if (isset($_POST["ej"]) && $_POST["ej"] === "c4") {
    $c4_paso = $_POST["paso"] ?? "1";
    $c4_n = (int) ($_POST["n"] ?? 0);

    // al llegar al paso 2 (y al 3, por si manipulan el formulario) comprobamos que N sea valido;
    // si no, volvemos al paso 1
    if (($c4_paso === "2" || $c4_paso === "3") && ($c4_n < 1 || $c4_n > 10)) {
        $c4_error = "Indica un numero de alumnos entre 1 y 10";
        $c4_paso = "1";
    }
}
?>

<?php if ($c4_paso === "1"): ?>

    <!-- PASO 1: preguntar N -->
    <?php if ($c4_error !== ""): ?>
        <p><b><?= $c4_error ?></b></p>
    <?php endif; ?>
    <form action="#C4" method="post">
        <input type="hidden" name="ej" value="c4">
        <input type="hidden" name="paso" value="2">
        Numero de alumnos (1-10): <input type="number" name="n">
        <input type="submit" value="Siguiente">
    </form>

<?php elseif ($c4_paso === "2"): ?>

    <!-- PASO 2: N filas de campos. los [] hacen que nombres y notas lleguen como arrays -->
    <form action="#C4" method="post">
        <input type="hidden" name="ej" value="c4">
        <input type="hidden" name="paso" value="3">
        <input type="hidden" name="n" value="<?= $c4_n ?>">
        <?php for ($i = 1; $i <= $c4_n; $i++): ?>
            Alumno <?= $i ?>:
            <input type="text" name="nombres[]" placeholder="Nombre">
            <input type="number" name="notas[]" step="0.1" min="0" max="10" placeholder="Nota"><br>
        <?php endfor; ?>
        <input type="submit" value="Calcular">
    </form>

<?php else: ?>

    <!-- PASO 3: procesar los arrays -->
    <?php
    $c4_nombres = (isset($_POST["nombres"]) && is_array($_POST["nombres"])) ? $_POST["nombres"] : array();
    $c4_notas = (isset($_POST["notas"]) && is_array($_POST["notas"])) ? $_POST["notas"] : array();

    $c4_filas = array();
    $c4_errores = array();
    $c4_suma = 0;
    $c4_aprobados = 0;

    for ($i = 0; $i < $c4_n; $i++) {
        $nombre = trim($c4_nombres[$i] ?? "");
        $nota = filter_var($c4_notas[$i] ?? "", FILTER_VALIDATE_FLOAT);

        if ($nombre === "" || $nota === false || $nota < 0 || $nota > 10) {
            $c4_errores[] = "La fila " . ($i + 1) . " es incorrecta (nombre vacio o nota fuera de 0-10)";
            continue;   // saltamos a la siguiente fila
        }

        $c4_suma += $nota;
        if ($nota >= 5) {
            $c4_aprobados++;
        }
        $c4_filas[] = array($nombre, $nota, $nota >= 5 ? "aprobado" : "suspenso");
    }

    if (count($c4_errores) > 0) {
        echo "<ul>";
        foreach ($c4_errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo crearTabla(array("Alumno", "Nota", "Resultado"), $c4_filas);
        echo "<p>Media: " . number_format($c4_suma / count($c4_filas), 2) . " | Aprobados: $c4_aprobados de " . count($c4_filas) . "</p>";
    }
    ?>
    <a href="?">Volver</a>

<?php endif; ?>

<!-- ============================================================ -->
<h2 id="C5">C5. adivina el numero (campos hidden)</h2>
<!-- enunciado: el programa piensa un numero del 1 al 100. el usuario lo intenta adivinar y se le
     dice si es mayor o menor, contando los intentos.
     clave: como php no recuerda nada entre envios, el numero secreto y los intentos
     viajan en campos hidden. (en la vida real se usaria $_SESSION) -->

<?php
$c5_secreto = rand(1, 100);   // solo se usa en la primera carga
$c5_intentos = 0;
$c5_mensaje = "";
$c5_fin = false;

if (isset($_POST["ej"]) && $_POST["ej"] === "c5") {
    $c5_secreto = (int) ($_POST["secreto"] ?? 0);       // recuperamos lo que viajo en hidden
    $c5_intentos = (int) ($_POST["intentos"] ?? 0);
    $c5_numero = filter_var($_POST["numero"] ?? "", FILTER_VALIDATE_INT);

    if ($c5_numero === false) {
        $c5_mensaje = "Escribe un numero entero";
    } else {
        $c5_intentos++;
        if ($c5_numero < $c5_secreto) {
            $c5_mensaje = "El numero es MAYOR que $c5_numero";
        } else if ($c5_numero > $c5_secreto) {
            $c5_mensaje = "El numero es MENOR que $c5_numero";
        } else {
            $c5_mensaje = "Correcto! Lo has adivinado en $c5_intentos intentos";
            $c5_fin = true;
        }
    }
}
?>

<?php if (!$c5_fin): ?>
    <form action="#C5" method="post">
        <input type="hidden" name="ej" value="c5">
        <input type="hidden" name="secreto" value="<?= $c5_secreto ?>">
        <input type="hidden" name="intentos" value="<?= $c5_intentos ?>">
        Tu numero (1-100): <input type="number" name="numero">
        <input type="submit" value="Probar">
    </form>
<?php endif; ?>
<p><?= htmlspecialchars($c5_mensaje) ?></p>
<?php if ($c5_fin): ?>
    <a href="?">Jugar otra vez</a>
<?php endif; ?>

<!-- ============================================================ -->
<h2 id="C6">C6. select multiple + radios generados con funcion</h2>
<!-- enunciado: elegir varios lenguajes (select multiple) y un nivel (radio) -->

<?php
$c6_lenguajes = array("php" => "PHP", "js" => "JavaScript", "java" => "Java", "py" => "Python");
$c6_niveles = array("bajo" => "Bajo", "medio" => "Medio", "alto" => "Alto");

$c6_sel = array();
$c6_nivel = "medio";   // nivel marcado por defecto
if (isset($_POST["ej"]) && $_POST["ej"] === "c6") {
    $c6_sel = (isset($_POST["lenguajes"]) && is_array($_POST["lenguajes"])) ? $_POST["lenguajes"] : array();
    $c6_nivel = $_POST["nivel"] ?? "medio";
}
?>

<form action="#C6" method="post">
    <input type="hidden" name="ej" value="c6">

    <!-- name con [] y atributo multiple: se eligen varios con Ctrl + clic -->
    Lenguajes: <br>
    <select name="lenguajes[]" multiple size="4">
        <?php foreach ($c6_lenguajes as $clave => $texto): ?>
            <option value="<?= $clave ?>" <?= in_array($clave, $c6_sel) ? "selected" : "" ?>><?= $texto ?></option>
        <?php endforeach; ?>
    </select><br>

    Nivel: <?= crearRadios("nivel", $c6_niveles, $c6_nivel) ?><br><br>
    <input type="submit" value="Enviar">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c6") {
    // nos quedamos solo con valores validos (por si manipulan el formulario)
    $c6_validos = array();
    foreach ($c6_sel as $clave) {
        if (array_key_exists($clave, $c6_lenguajes)) {
            $c6_validos[] = $c6_lenguajes[$clave];
        }
    }

    if (count($c6_validos) === 0) {
        echo "<p>No has elegido ningun lenguaje</p>";
    } else if (!array_key_exists($c6_nivel, $c6_niveles)) {
        echo "<p>Nivel no valido</p>";
    } else {
        echo "<p>Sabes: " . implode(", ", $c6_validos) . " (nivel " . $c6_niveles[$c6_nivel] . ")</p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C7">C7. registro con funciones de validacion reutilizables</h2>
<!-- enunciado: usuario (4-12 letras, numeros o _), contrasena (min 8) y repetirla, fecha de nacimiento
     (valida y mayor de edad). si hay errores se muestran todos y se mantiene lo escrito -->

<?php
// recoge un campo de POST como texto limpio (si no existe o es un array, devuelve "")
function valorPost(string $campo): string {
    $v = $_POST[$campo] ?? "";
    return is_array($v) ? "" : trim($v);
}

function validarUsuario(string $u): bool {
    return preg_match("/^[A-Za-z0-9_]{4,12}$/", $u) === 1;
}

// fecha en formato aaaa-mm-dd (asi la envia input type="date")
function fechaValida(string $f): bool {
    $p = explode("-", $f);
    return count($p) === 3 && ctype_digit($p[0]) && ctype_digit($p[1]) && ctype_digit($p[2])
        && checkdate((int) $p[1], (int) $p[2], (int) $p[0]);     // checkdate(MES, DIA, ANIO)
}

// edad a partir de aaaa-mm-dd
function calcularEdad(string $f): int {
    [$anio, $mes, $dia] = array_map("intval", explode("-", $f));
    $edad = (int) date("Y") - $anio;
    // si todavia no ha cumplido anos este anio, restamos 1
    if ((int) date("n") < $mes || ((int) date("n") === $mes && (int) date("j") < $dia)) {
        $edad--;
    }
    return $edad;
}

$c7_usuario = valorPost("usuario");
$c7_fecha = valorPost("fecha");
$c7_errores = array();
$c7_enviado = isset($_POST["ej"]) && $_POST["ej"] === "c7";

if ($c7_enviado) {
    $c7_pass1 = valorPost("pass1");
    $c7_pass2 = valorPost("pass2");

    if (!validarUsuario($c7_usuario)) {
        $c7_errores[] = "Usuario: de 4 a 12 caracteres (letras, numeros o _)";
    }
    if (strlen($c7_pass1) < 8) {
        $c7_errores[] = "La contrasena debe tener al menos 8 caracteres";
    }
    if ($c7_pass1 !== $c7_pass2) {
        $c7_errores[] = "Las contrasenas no coinciden";
    }
    if (!fechaValida($c7_fecha)) {
        $c7_errores[] = "La fecha de nacimiento no es valida";
    } else if (calcularEdad($c7_fecha) < 18) {
        $c7_errores[] = "Debes ser mayor de edad";
    }
}
?>

<form action="#C7" method="post">
    <input type="hidden" name="ej" value="c7">
    Usuario: <input type="text" name="usuario" value="<?= htmlspecialchars($c7_usuario) ?>"><br>
    <!-- las contrasenas NUNCA se vuelven a escribir en el value -->
    Contrasena: <input type="password" name="pass1"><br>
    Repetir: <input type="password" name="pass2"><br>
    Fecha nacimiento: <input type="date" name="fecha" value="<?= htmlspecialchars($c7_fecha) ?>"><br><br>
    <input type="submit" value="Registrarse">
</form>

<?php
if ($c7_enviado) {
    if (count($c7_errores) > 0) {
        echo "<ul>";
        foreach ($c7_errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Usuario <b>" . htmlspecialchars($c7_usuario) . "</b> registrado. Tienes "
           . calcularEdad($c7_fecha) . " anios.</p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C8">C8. subir un fichero ($_FILES)</h2>
<!-- enunciado: formulario para subir una imagen o pdf (maximo 1 MB) y guardarlo en la carpeta subidas.
     OBLIGATORIO en el form: method="post" y enctype="multipart/form-data"
     $_FILES["archivo"] es un array con: name, type, tmp_name, error, size -->

<form action="#C8" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ej" value="c8">
    <input type="file" name="archivo"><br><br>
    <input type="submit" value="Subir">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c8") {
    $c8_permitidas = array("jpg", "jpeg", "png", "pdf");
    $c8_maximo = 1024 * 1024;   // 1 MB en bytes

    if (!isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] === UPLOAD_ERR_NO_FILE) {
        echo "<p>No has elegido ningun fichero</p>";
    } else if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
        echo "<p>Error al subir el fichero (codigo " . $_FILES["archivo"]["error"] . ")</p>";
    } else {
        $c8_nombre = basename($_FILES["archivo"]["name"]);    // basename evita rutas maliciosas
        $c8_extension = strtolower(pathinfo($c8_nombre, PATHINFO_EXTENSION));

        if (!in_array($c8_extension, $c8_permitidas)) {
            echo "<p>Tipo no permitido. Solo: " . implode(", ", $c8_permitidas) . "</p>";
        } else if ($_FILES["archivo"]["size"] > $c8_maximo) {
            echo "<p>El fichero supera 1 MB</p>";
        } else {
            if (!is_dir("subidas")) {
                mkdir("subidas");                 // creamos la carpeta si no existe
            }
            // anteponemos la hora para que no se pisen ficheros con el mismo nombre
            $c8_destino = "subidas/" . time() . "_" . $c8_nombre;

            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $c8_destino)) {
                echo "<p>Subido: " . htmlspecialchars($c8_nombre) . " ("
                   . round($_FILES["archivo"]["size"] / 1024, 1) . " KB)</p>";
            } else {
                echo "<p>No se pudo guardar el fichero</p>";
            }
        }
    }
}
?>

<!-- ============================================================ -->
<h2 id="C9">C9. tabla dinamica: filas x columnas pedidas por formulario</h2>
<!-- enunciado: pedir filas y columnas (1 a 10). generar una matriz con numeros aleatorios del 1 al 9
     y mostrarla en una tabla con la suma de cada fila y el maximo de toda la matriz -->

<?php
function generarMatriz(int $filas, int $columnas): array {
    $m = array();
    for ($f = 0; $f < $filas; $f++) {
        for ($c = 0; $c < $columnas; $c++) {
            $m[$f][$c] = rand(1, 9);
        }
    }
    return $m;
}
?>

<form action="#C9" method="post">
    <input type="hidden" name="ej" value="c9">
    Filas (1-10): <input type="number" name="filas" value="<?= htmlspecialchars($_POST["filas"] ?? "3") ?>"><br>
    Columnas (1-10): <input type="number" name="columnas" value="<?= htmlspecialchars($_POST["columnas"] ?? "4") ?>"><br><br>
    <input type="submit" value="Generar">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c9") {
    $c9_rango = array("options" => array("min_range" => 1, "max_range" => 10));
    $c9_filas = filter_var($_POST["filas"] ?? "", FILTER_VALIDATE_INT, $c9_rango);
    $c9_columnas = filter_var($_POST["columnas"] ?? "", FILTER_VALIDATE_INT, $c9_rango);

    if ($c9_filas === false || $c9_columnas === false) {
        echo "<p>Filas y columnas deben ser enteros entre 1 y 10</p>";
    } else {
        $c9_matriz = generarMatriz($c9_filas, $c9_columnas);
        $c9_maximo = 0;

        echo "<table border='1'>";
        foreach ($c9_matriz as $fila) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>$valor</td>";
                if ($valor > $c9_maximo) {
                    $c9_maximo = $valor;
                }
            }
            echo "<td><b>" . array_sum($fila) . "</b></td></tr>";   // suma de la fila
        }
        echo "</table>";
        echo "<p>Maximo de la matriz: $c9_maximo</p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C10">C10. dias de un mes (selects de mes y anio)</h2>
<!-- enunciado: elegir mes y anio y mostrar cuantos dias tiene ese mes y que dia de la semana empieza.
     reutiliza crearSelect de F8 y date("t") que da los dias del mes -->

<?php
$c10_meses = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio",
                   7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre");
$c10_dias_semana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

// de 1990 a 2040: array con clave = valor para el select
$c10_anios = array();
for ($a = 1990; $a <= 2040; $a++) {
    $c10_anios[$a] = $a;
}
?>

<form action="#C10" method="post">
    <input type="hidden" name="ej" value="c10">
    Mes: <?= crearSelect("mes", $c10_meses, $_POST["mes"] ?? date("n")) ?>
    Anio: <?= crearSelect("anio", $c10_anios, $_POST["anio"] ?? date("Y")) ?>
    <input type="submit" value="Ver">
</form>

<?php
if (isset($_POST["ej"]) && $_POST["ej"] === "c10") {
    $c10_mes = filter_var($_POST["mes"] ?? "", FILTER_VALIDATE_INT);
    $c10_anio = filter_var($_POST["anio"] ?? "", FILTER_VALIDATE_INT);

    if ($c10_mes === false || $c10_anio === false || !checkdate($c10_mes, 1, $c10_anio)) {
        echo "<p>Mes o anio no validos</p>";
    } else {
        // mktime(hora, minuto, segundo, MES, DIA, ANIO) -> segundos del dia 1 de ese mes
        $c10_primero = mktime(0, 0, 0, $c10_mes, 1, $c10_anio);
        $c10_dias = (int) date("t", $c10_primero);          // t = dias del mes
        $c10_empieza = $c10_dias_semana[(int) date("w", $c10_primero)];   // w = 0 domingo ... 6 sabado

        echo "<p>" . $c10_meses[$c10_mes] . " de $c10_anio tiene <b>$c10_dias dias</b> y empieza en <b>$c10_empieza</b></p>";
    }
}
?>

<!-- ============================================================ -->
<h2 id="C11">C11. enviar a otro archivo, redirigir con header() e include</h2>
<!--
    SOLO COMENTARIO (es lo que cambia cuando el enunciado pide varios ficheros)

    ---------- formulario.php ----------
    form action="procesa.php" method="post"
        input type="text" name="nombre"
        input type="submit"
    /form

    ---------- procesa.php (solo php, sin html) ----------
    $nombre = $_POST["nombre"] ?? "";
    if (trim($nombre) === "") {
        header("Location: formulario.php?error=1");   // redirige y vuelve al formulario
        exit;                                         // IMPORTANTE: parar el script tras header
    }
    echo "Hola " . htmlspecialchars($nombre);
    echo '<a href="formulario.php">Volver</a>';

    ---------- en formulario.php, para mostrar el error ----------
    if (isset($_GET["error"])) { echo "El nombre es obligatorio"; }

    REGLAS:
    - header() debe ejecutarse ANTES de escribir cualquier html o echo (si no: "headers already sent")
    - siempre exit; despues de header("Location: ...")

    ---------- reutilizar funciones en varios archivos ----------
    require "funciones.php";        si falta el fichero, da error y se para
    include "funciones.php";        si falta, solo avisa y sigue
    require_once "funciones.php";   lo incluye UNA sola vez (evita "cannot redeclare function")

    ---------- datos por URL (GET) en un enlace ----------
    a href="ver.php?id=5&nombre=Ana"       en ver.php:  $_GET["id"]  $_GET["nombre"]
    http_build_query(array("id" => 5))     construye el texto de la url
-->
<p>(solo comentario: ver el codigo fuente de este apartado)</p>

</body>
</html>