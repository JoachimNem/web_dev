<?php

function prediction ($heures,$minutes,$secondes){
    if ($secondes == 59 && $minutes == 59 && $heures == 23){
        $secondes =0;
        $minutes =0 ."0";
        $heures =0;
    }
        elseif ($secondes == 59 && $minutes == 59){
            $secondes =0;
            $minutes =0 . "0";
            $heures = $heures +1 ;
        }
            elseif ($secondes == 59){
                $secondes =0;
                $minutes = $minutes +1;
            }
                else {
                    $secondes = $secondes +1;
                }
    echo("Dans une seconde il sera : ". $heures ."h" . $minutes . " et " . $secondes ." seconde(s)");
}

$heures = readline ("Entrer l'heure :");
$minutes = readline ("Entrer les minutes :");
$secondes = readline ("Entrer les secondes :");

prediction($heures,$minutes,$secondes);