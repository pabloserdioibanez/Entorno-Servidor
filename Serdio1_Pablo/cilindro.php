<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Examen DWES</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Ejercicio: 1 (Funciones) </h1>
</div>

<div id="contenido">
	<h2>Contenido</h2>
    <?php

    define("PI", 3.14);

    // por defecto sera 5
    function volumen_cilindro($altura, $radio = 5) {

    // comprobar que son numeros positivos
    if ($radio <= 0 || $altura <= 0) {
        echo "Los numeros deben de ser mayores que 0, Invalido";
        return false;
    }
    
    //Volumen = PI * (radio * radio) * altura
    $volumen = PI * ( $radio * $radio ) * $altura;
    return "Para un radio " .$radio. " y una altura " .$altura. " el volumen es de: " .$volumen;

    }

    echo volumen_cilindro(1,4);
    echo "<br>";
    echo volumen_cilindro(9,0);
    echo "<br>";
    echo volumen_cilindro(6);
    
    ?>
</div>

<div id="pie">
</div>

</body>
</html>
