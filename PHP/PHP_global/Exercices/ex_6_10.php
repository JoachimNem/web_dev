<?php

function sumArray()
{
    $nombreDeValeurs = readline("Entrer le nombre de valeurs à mettre dans le tableau : ");
    for ($i = 1; $i <= $nombreDeValeurs; $i++) {
        $valeurDansTableau1 = readline("Entrer une valeur (tableau1) : ");
        $myArray1[$i] = $valeurDansTableau1;
        $valeurDansTableau2 = readline("Entrer une valeur (tableau2) : ");
        $myArray2[$i] = $valeurDansTableau2;
    }
    print_r($myArray1);
    print_r($myArray2);
    print_r($myArray3);
}

sumArray();
