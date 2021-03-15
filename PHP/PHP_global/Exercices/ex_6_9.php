<?php

function arrayOfSum()
{
    $nombreDeValeurs = readline("Entrer le nombre de valeurs à mettre dans le tableau : ");
    $sum = 0;
    for ($i = 1; $i <= $nombreDeValeurs; $i++) {
        $valeurDansTableau = readline("Entrer une valeur : ");
        $myArray[$i] = $valeurDansTableau;
        $sum = $sum + $myArray[$i];
    }
    print_r($myArray);
    echo ("La somme des valeurs dans le tableau est de : $sum ");
}
arrayOfSum();
