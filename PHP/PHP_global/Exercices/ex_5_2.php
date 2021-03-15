<?php

function checkNumber (){
    do{
        $nombre = readline("Entrer un nombre : ");
        if ( $nombre > 20){
            echo ("Plus petit ! \n");
        }
        if ( $nombre < 10){
            echo ("Plus grand !\n");
        }
    }while ($nombre >20 || $nombre <10);
        echo('Bien joué');
}


checkNumber();
