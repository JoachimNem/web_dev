<?php

include_once(__DIR__ . "/../DAO/UtilisateurDAO.php");

class UtilisateurService
{
    public function tabUsers($email)
    {
        $utilisateurDAO = new UtilisateurDAO();
        $tabUtilisateur = $utilisateurDAO->tabUsers($email);
        return $tabUtilisateur;
    }

    public function ajoutUser($email, $password)
    {
        $utilisateurDAO = new UtilisateurDAO();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $utilisateurDAO->ajoutUser($email, $hash);
    }
}
