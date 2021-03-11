<?php

function arrayMark()
{
    $moyenne = 0;
    $somme = 0;
    for ($i = 0; $i <= 8; $i++) {
        $array[$i] = readline("Entrer une note : ");
        $somme = $somme + $array[$i];
    }
    print_r(array_values($array));
    $moyenne = $somme / 9;
    echo ($moyenne);
}

arrayMark();
