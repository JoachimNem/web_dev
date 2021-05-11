<?php

include_once(__DIR__ . "/../model/Utilisateur.php");

class UtilisateurDAO extends Commun
{
    public function connexion($email)
    {
        $mysqli = parent::connexionBdd();
        $sql = "SELECT hash, email, status FROM utilisateur WHERE email=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt ->execute();
        $rs = $stmt->get_result();
        $tabUtilisateur = $rs ->fetch_array(MYSQLI_ASSOC);
        $mysqli->close();
        return $tabUtilisateur
    }
}
