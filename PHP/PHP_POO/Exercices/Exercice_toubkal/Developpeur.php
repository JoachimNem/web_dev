<?php

include_once("Personne.php");

class Developpeur extends Personne
{
    // Atttibut 
    private $specialite;

    // Définition de la méthode abstraite issue de la classe parente elle même abstraite
    public function calculerSalaire()
    {
        return $this->salaire * 1.2;
    }
}
