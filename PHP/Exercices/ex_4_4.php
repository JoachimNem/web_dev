<?php

function factureReprographie($copies){
    if ($copies < 11){
        $prix = 0.1 * $copies;
    }
        elseif ($copies < 31){
            $prix = 1 + ($copies - 10) * 0.09;
        }
            else{
                $prix = 1 + (20 * 0.09) + ($copies -30) * 0.08;
            }

echo ("Prix à payer : " . $prix . "€");            
}



$copies = readline("Entrer le nombre de copies :");
factureReprographie($copies);