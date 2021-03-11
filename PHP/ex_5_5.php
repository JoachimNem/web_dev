<?php

function addition($nombre){
    $résultat = 0;
    for($i=1; $i<= $nombre; $i++){
        $résultat = $résultat + $i;
    }
    echo("La sommme des chiffres de 0 à $nombre est : $résultat");
}
$nombre = readline ("Entrer un nombre : ");
addition($nombre);
