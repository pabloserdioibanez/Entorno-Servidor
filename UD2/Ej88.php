<?php
// Declaramos las cadenas
$e1 = "007";
$e2 = "7e2";
$e3 = "12abc";

$cadenas = [$e1, $e2, $e3];

foreach ($cadenas as $cadena) {
    // Usamos printf y el operador ternario para mostrar el resultado de is_numeric
    printf("¿Es '%s' numérica? %s<br>", $cadena, is_numeric($cadena) ? "Si" : "No");
    
    if (is_numeric($cadena)) {

        // Conversión a float mediante casting
        $valor = (float)$cadena;
        
        // %.2f formatea el float con exactamente 2 decimales
        printf("Valor convertido a float: %.2f<br><br>", $valor);

    } else {
        // print requiere concatenación con punto
        print "Aviso: La cadena '" . $cadena . "' no es numérica.<br><br>";
    }
}
?>