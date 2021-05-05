<?php

include_once("Personne.php");

class Manager extends Personne
{
    // Attribut
    private $service;

    // Définition de la méthode abstraite issue de la classe parente elle même abstraite
    public function calculerSalaire()
    {
        return $this->salaire * 1.35;
    }
}
