<?php

    $askAge = readline("enter an age: ");
    $askGenre = readline("enter a genre: ");

    function zorlub($numb,$str) {
        $homme = "male";
        $femme = "female";
        $isMaleImposable = $numb > 20 && $str == $homme;



        if($isMaleImposable){
            echo "imposable";
        }
    }

    zorlub($askAge,$askGenre);