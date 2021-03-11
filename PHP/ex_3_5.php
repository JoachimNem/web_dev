<?php

function productOfNumbers($a,$b){
    if( $a >= 0 && $b >=0 || $a <0 && $b <0 ){
        echo "Le produit est positif";
    }
    else{
        echo "Le produit est négatif";
    } 

}


$a = readline ("Entrer une valeur :");
$b = readline ("Entrer une valeur :");
productOfNumbers($a,$b);