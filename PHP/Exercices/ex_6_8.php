<?php

function arrayTest()
{
    $nombreDeValeurs = readline("Entrer le nombre de valeurs à mettre dans le tableau : ");
    $compteurNegatif = 0;
    $compteurPositif = 0;
    for ($i = 1; $i <= $nombreDeValeurs; $i++) {
        $valeurDansTableau = readline("Entrer une valeur : ");
        $myArray[$i] = $valeurDansTableau;
        if ($valeurDansTableau >= 0) {
            $compteurPositif++;
        }
        if ($valeurDansTableau < 0) {
            $compteurNegatif++;
        }
    }
    echo ("Il y a $compteurPositif nombre(s) positif(s)\n");
    echo ("Il y a $compteurNegatif nombre(s) positif(s)\n");
    print_r(array_values($myArray));
}

arrayTest();
