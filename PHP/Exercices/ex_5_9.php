<?php

function returnCashmoney()
{
    $sommePrixDesAchats = 0;
    do {
        $prixDesAchats = readline("Entrer le prix de l'achat : ");
        $sommePrixDesAchats = $sommePrixDesAchats + $prixDesAchats;
    } while ($prixDesAchats != 0);
    echo ("Il doit : $sommePrixDesAchats € \n");
    $montantPaye = readline("Entrer le montant payé : ");
    $rendu = $montantPaye - $sommePrixDesAchats;
    for ($i = $rendu; $rendu > 0; $i = $i) {
        if ($rendu >= 10) {
            $rendu = $rendu - 10;
            echo ("Billet de 10 €\n");
        } elseif ($rendu >= 5) {
            $rendu = $rendu - 5;
            echo ("Billet de 5 €\n");
        } elseif ($rendu >= 1) {
            $rendu--;
            echo ("Pièce de 1 €\n");
        } else {
            break;
        }
    }
}

returnCashmoney();
