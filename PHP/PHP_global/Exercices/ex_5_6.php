<?php

function factorielle()
{
    $nombre = readline("Entrer un nombre : ");
    $résultat = 1;
    for ($i = 1; $i <= $nombre; $i++) {
        $résultat = $résultat * $i;
    }
    echo ("La factorielle de $nombre est : $résultat");
}

factorielle();
