<?php

function productOfNumbers($a,$b){
    $c = $a * $b;
    if ( $c >=0 ){
        echo "Le produit est positif";
    }
    elseif ( $c < 0){
        echo "Le produit est négatif";
    }
}



$a = readline ("Entrer une valeur :");
$b = readline ("Entrer une valeur :");
productOfNumbers($a,$b);