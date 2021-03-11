<?php 


function imposableOrNot ($sexe,$age){
    if ($sexe == "F" && $age > 18 && $age < 35 || $sexe == "H" && $age > 20){
        echo("Imposable");
    }
        else{
            echo("Non Imposable");
        }

}

$sexe = readline ("Entrer le sexe :");
$age = readline ("Entrer l'age :");
imposableOrNot($sexe, $age);