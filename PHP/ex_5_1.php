<?php

function checkNumber (){
    do{
        $nombre = readline("Entre un nombre : ");
    }while ($nombre >3 || $nombre <1);
        echo('Bien joué');
}


checkNumber();
