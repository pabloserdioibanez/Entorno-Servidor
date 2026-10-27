<?php

$visitas = 10;

function contadorLocal () {
    $contador = 0;
    $contador = $contador + 1;
    print "Valor de contadorLocal: " . $contador . "<br>";

}


function contadorGlobal() {
    global $visitas;
    $visitas = $visitas + 1;
    print "Valor de visitasGlobal: " . $visitas . "<br>";
}

function contadorEstatico() {
    static $contador;
    $contador = $contador + 1;
    print "Valor de contadorEstatico: " . $contador . "<br>";

}

//ejecutamos 2 veces
contadorLocal();
contadorLocal();

//ejecutamos 2 veces
contadorGlobal();
contadorGlobal();

//ejecutamos 3 veces
contadorEstatico();
contadorEstatico();

//mostramos la variable visitas
print "Valor de visitas: " . $visitas;

// RESPUESTA: El local siempre mostrara uno porque la variable siempre muere dentro de la funcion. El estatico tiene una variable static, que hace que no muera esa variable 
// al terminar esa funcion. 


?>