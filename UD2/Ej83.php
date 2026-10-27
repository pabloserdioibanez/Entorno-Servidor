<?php
// 1. Declaramos la variable inicial como cadena de texto (string)
$s = "42.7";

// 2. Forzamos la conversión de la variable a tipo entero
// settype altera la variable original directamente en la memoria
settype($s, "integer");

// 3. Mostramos el resultado usando printf. 
// Usamos %s para insertar texto (el resultado de gettype) y %d para insertar un número entero
printf("Conversión a integer -> Tipo: %s, Valor: %d<br><br>", gettype($s), $s);

// 4. Reiniciamos la variable partiendo de nuevo del string original
$s = "42.7";

// 5. Forzamos la conversión a tipo decimal (float)
settype($s, "float");

// 6. Mostramos el resultado. 
// Aquí usamos %f para insertar un número con decimales (float)
printf("Conversión a float -> Tipo: %s, Valor: %f<br>", gettype($s), $s);
?>