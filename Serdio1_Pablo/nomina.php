<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Examen DWES</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Ejercicio: 3 (Formularios) </h1>
</div>

<div id="contenido">
    <h1>Calculo de nomina</h1>
    <form action="" method="post">
        <label for="sueldobase">Sueldo base</label>
        <input type="text" id="sueldo" name="sueldo" required="yes">
        <br>
        <label for="extras">Extras:</label>
        <label for="noche">Noche</label>
        <input type="checkbox" id="noche" name="noche">
        <label for="festivo">Festivo</label>
        <input type="checkbox" id="festivo" name="festivo">
        <label for="horas">Horas</label>
        <input type="checkbox" id="horas" name="horas">
        <label for="peligro">Peligro</label>
        <input type="checkbox" id="peligro" name="peligro">      

        <br>
        <label for="hijos">Hijos:</label>
        <label for="uno">1</label>
        <input type="radio" id="uno" name="uno">
        <label for="dos">2</label>
        <input type="radio" id="dos" name="dos">
        <label for="tres">3 o mas</label>
        <input type="radio" id="tres" name="tres">
        
        


        <br>
        <input type="submit"  name="calcular" value="calcular">
        <input type="reset" name="limpiar" value="limpiar">
    </form>

    <?php
    $tabla = array("noche" => 100, 
    "festivos" => 50, 
    "horas extras" => 50, 
    "peligro" => 150);

    // foreach recorre un array; as $clave => $valor permite leer ambos.
    foreach ($tabla as $extra => $valor) {

    if (isset($_GET['calcular'])) {
        echo "El sueldo base es:  " .$_POST['sueldo']. " | Los extras son: " ,array_search($", $mapa), " | Y el importe de los hijos: " .(20 * $_GET['hijo']";
        echo "El total es: " .$total;
    }




   
    }




    /*
    $dinerototahijos = 0;

    if ($_GET["uno"] == 1) {
        $dinerototahijos = 1;
    }
    if ($_GET["dos"] == 2) {
        $dinerototahijos = 1;
    }
    if ($_GET["tres"] == 3) {
        $dinerototahijos = 3;
    }


    $dinerototalextras = 0;
    foreach ($tabla as $extra => $dinero){
        $dinerototalextras = $dinero + $dinerototalextras;
    }

    $total = 0;

    $total = $_GET[sueldo] + $dinerototalextras + (20 * $_GET['hijo']);

    if (isset($_GET['calcular']))
    {
        echo "El sueldo base es:  " .$_GET['sueldo']. " | Los extras son: " .$dinerototalextras. " | Y el importe de los hijos: " .(20 * $_GET['hijo']);
        echo "El total es: " .$total;
    }

    */

    ?>


</div>

<div id="pie">
</div>

</body>
</html>
