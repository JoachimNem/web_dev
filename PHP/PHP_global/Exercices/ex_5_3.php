<?php 

function displayNextNumbers (){
    $nombre = readline("Entrer un nombre : ");
    for ($i=1; $i<=10; $i++){
        $nombre++;
        echo($nombre);
    }

}

displayNextNumbers();