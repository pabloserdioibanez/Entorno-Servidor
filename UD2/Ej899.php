<?php

function mostrarTipo($valor) {

printf(var_export($valor, true), 
       get_debug_type($valor),
       is_int: " , (is_int($valor) ? "sí" : "no") ,
       is_float: " , (is_float($valor) ? "sí" : "no") ,
       is_bool: " , (is_bool($valor) ? "sí" : "no") ,
       is_string: " , (is_string($valor) ? "sí" : "no"););

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