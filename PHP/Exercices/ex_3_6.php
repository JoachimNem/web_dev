<?php

function childCategory ($a){
    if( $a >=12 ){
        echo "Cadet"; 
    }
        elseif ( $a > 9){
            echo "Minime";
        }
            elseif ( $a > 7){
                echo "Pupille";
            }
                elseif ( $a >=6){
                    echo "Poussin";
                }
}

$a = readline ("Entrez l'age de l'enfant :");
childCategory($a);
