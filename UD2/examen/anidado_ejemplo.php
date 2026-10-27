<?php

echo "Primer for anidado: ";
for ($i = 0; $i < 0; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo "i: $i, j: $j\n";
        if ($j == 1) {
            break;
        }
    
    }
}

echo "Segundo anidado: ";
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo "i: $i, j: $j\n";
        if ($j == 1) {
            break;
        }
    
    }
}
?>