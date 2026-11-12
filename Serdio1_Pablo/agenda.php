<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Examen DWES</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Ejercicio: 2 (Arrays) </h1>
</div>

<div id="contenido">
	<h2>Contenido</h2>

    <?php

    $agenda = array("Marta"=>"675223344",
    "Alberto"=>"654321123",
    "Luis"=>"642335334",
    "Kiko"=>"642335336",
    "Sandra"=>"642335337",
    "Rocío"=>"642335390");

    

    function listar($agenda) {
        print_r($agenda);
    }

    listar($agenda);


    // NO ENTIENDO POR QUE FALLA PERO SI ENTIENDO EL PROCESO   <--------


    foreach ($agenda as $nombre => $telefono) {
        echo "<table border='4'>";
        echo "<tr> Contacto </td>";
        echo "<tr> Número </td>";
        echo "<td> $nombre </td>";
        echo "<td> $telefono </td>";
        echo"</tr>";
        echo "</table>";
    }



    function buscar($agenda, $nombre) {
        if (array_key_exists($nombre, $agenda)) {
            $telefono = $agenda[$nombre];
            return $nombre . " se encuentra en la agenda, bajo el numero " . $telefono;
        }

        return "DESCONOCIDO";
    }

    echo buscar($agenda, "Alberto");



    

    function anadir($nombre, $telefono) {
        
    return "Has añadido a " .$nombre. " por el telefono " .$telefono;

    }



    anadir("Paco", 612731727);





    function eliminar($nombre, $telefono) {

    return "Has eliminado a " .$nombre. " por el telefono " .$telefono;

    }

    eliminar("Kiko", 642335336);


    
    ?>

    
</div>

<div id="pie">
</div>

</body>
</html>