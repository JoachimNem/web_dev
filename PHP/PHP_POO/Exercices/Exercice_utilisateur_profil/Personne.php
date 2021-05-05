<?php

include_once("Utilisateur.php");
class Personne
{
    protected $id;
    private $nom;
    private $prenom;
    private $mail;
    private $telephone;
    private $salaire;

    public function calculerSalaire(): float;
    {
    }
}
