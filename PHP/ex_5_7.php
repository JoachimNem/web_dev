<?php

function whoIsGreater()
{
    for ($i = 1; $i < 21; $i++) {
        $nombre = readline("Entrer le nombre numéro $i : ");
        if ($i == 1) {
            $max = $nombre;
            $indiceMax = 1;
        }
        if ($nombre > $max) {
            $max = $nombre;
            $indiceMax = $i;
        }
    }
    echo ("C'était le nombre : $max numéro : $indiceMax ");
}

whoIsGreater();
