<?php

function whoIsGreater()
{
    $i = 1;
    do {
        $nombre = readline("Entrer le nombre numéro $i : ");
        if ($i == 1) {
            $max = $nombre;
            $indiceMax = 1;
        }
        if ($nombre > $max) {
            $max = $nombre;
            $indiceMax = $i;
        }
        $i++;
    } while ($nombre != 0);
    echo ("C'était le nombre : $max / numéro : $indiceMax ");
}

whoIsGreater();
