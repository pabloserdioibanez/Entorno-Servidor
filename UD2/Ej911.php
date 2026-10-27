<?php

$TASA = 0.21;
$importe = 150;

$iva = $importe * $TASA;
$total = $importe + $iva;


print "Importe: ".$importe;
echo "<br>";
print "IVA: ".$iva;
echo "<br>";
print "Total: ".$total;

?>