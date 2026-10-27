<?php
// 1. Declaramos la variable $x sin asignarle valor
// En PHP, hacer esto no la registra realmente en la memoria, por lo que actúa como no definida.
$x;

// 2. Comprobamos su estado inicial usando printf y el operador ternario
// Nota: is_null($x) lanzará un "Warning: Undefined variable" porque $x no tiene valor aún.
printf("--- Antes de asignar valor ---<br>");
printf("¿Está \$x definida (isset)? %s<br>", isset($x) ? "sí" : "no");
printf("¿Es \$x nula (is_null)? %s<br><br>", is_null($x) ? "sí" : "no");

// 3. Asignamos un valor a la variable
$x = "Hola clase";

// 4. Volvemos a comprobar su estado
printf("--- Después de asignar valor ---<br>");
printf("¿Está \$x definida (isset)? %s<br>", isset($x) ? "sí" : "no");
printf("¿Es \$x nula (is_null)? %s<br><br>", is_null($x) ? "sí" : "no");

// 5. Destruimos la variable con unset
unset($x);

// 6. Verificamos con isset antes de intentar mostrar su tipo
printf("--- Después de usar unset ---<br>");
printf("¿Está \$x definida (isset)? %s<br>", isset($x) ? "sí" : "no");

// Usamos if para evitar el error al pedir el tipo de una variable que no existe
if (isset($x)) {
    printf("El tipo de \$x es: %s<br>", gettype($x));
} else {
    printf("La variable ha sido destruida, no se puede obtener su tipo.<br>");
}
?>