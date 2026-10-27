<html>

<h1>Estara aprobado el alumno?</h1>
<br>


<?php

//datos
$nombreApellidos = "Pablo Serdio Ibañez";
$edad = 19;
$curso = "2º DAW";
$notaMedia = 7.8;
$matriculado = true;

echo "Si su nota es mayor o igual a 5 esta aprobado: <br>";

//Esta aprobado o suspendo
print $notaMedia >= 5.00 ? "<strong>Aprobado</strong>" : "<strong>Supenso</strong>";


?>


</html>