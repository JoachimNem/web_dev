<?php

function testArray()
{
    for ($i = 0; $i < 6; $i++) {
        $array[$i] = 0;
    }
    // Possible de mettre echo() dans la boucle pour récupérer chaque valeur du tableau)
    print_r(array_values($array));
}

testArray();
