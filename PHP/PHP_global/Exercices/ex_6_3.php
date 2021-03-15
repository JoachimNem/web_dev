<?php

function arrayMark()
{
    for ($i = 0; $i <= 8; $i++) {
        $array[$i] = readline("Entrer une note : ");
    }
    print_r(array_values($array));
}


arrayMark();
