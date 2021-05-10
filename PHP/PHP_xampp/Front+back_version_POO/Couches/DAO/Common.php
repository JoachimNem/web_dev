<?php

class Commun
{
    public function connexionBdd()
    {
        $connexion = new mysqli("localhost", "admin", "", "gestion_employe");

        return $connexion;
    }
}
