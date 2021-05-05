<?php

// Classe abstraite
abstract class Personne
{
    // attributs 
    protected $id;
    protected $nom;
    protected $prenom;
    protected $mail;
    protected $telephone;
    protected $salaire;

    // Méthode abstraite
    abstract protected function calculerSalaire();
}
