<?php

function multiplicationTable(){
    $nombre = readline("Entrer un nombre : ");
    echo("Table de $nombre : \n");
    for ($i=1; $i<=10; $i++){

        $résultat = $nombre * $i;
        echo("$nombre x $i = $résultat\n");

    }
}

multiplicationTable();