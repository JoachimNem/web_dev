<?php

function positifOrNot($a){
    if ( $a >= 0 )
    echo "Nombre positif";
    elseif ($a < 0)
    echo "Nombre négaitf";
}

$a = readline ("Entrer une valeur :");
positifOrNot($a);
