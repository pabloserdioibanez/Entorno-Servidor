<?php
function mostrarTipo($valor) {
    // var_export($valor, true) nos permite ver por pantalla exactamente qué es el valor 
    // (ej. muestra los strings vacíos como '' y los booleanos como true/false en vez de 1/nada)
    $valor_visual = var_export($valor, true);
    
    // Evaluamos cada comprobación con ternarios para devolver "sí" o "no"
    $es_int = is_int($valor) ? "sí" : "no";
    $es_float = is_float($valor) ? "sí" : "no";
    $es_bool = is_bool($valor) ? "sí" : "no";
    $es_string = is_string($valor) ? "sí" : "no";
    
    // Imprimimos la fila de resultados usando printf
    printf(
        "Valor: %-8s | Tipo: %-7s | is_int: %-2s | is_float: %-2s | is_bool: %-2s | is_string: %-2s<br>",
        $valor_visual,
        get_debug_type($valor),
        $es_int,
        $es_float,
        $es_bool,
        $es_string
    );
}

// Llamadas a la función con los valores indicados en el enunciado
mostrarTipo(0);
mostrarTipo(0.0);
mostrarTipo("0");
mostrarTipo(true);
mostrarTipo("");
mostrarTipo("123");
mostrarTipo(123.0);
?>