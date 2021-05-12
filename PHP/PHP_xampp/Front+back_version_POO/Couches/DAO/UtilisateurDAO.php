<?php

include_once(__DIR__ . "/../model/Utilisateur.php");
include_once(__DIR__ . "/Common.php");

class UtilisateurDAO extends Commun
{
    public function tabUsers($email)
    {
        $mysqli = parent::connexionBdd();
        $sql = "SELECT hash, email, status FROM utilisateur WHERE email=?;";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $rs = $stmt->get_result();
        $tabUtilisateurs = $rs->fetch_array(MYSQLI_ASSOC);
        $mysqli->close();
        return $tabUtilisateurs;
    }

    public function ajoutUser($email, $hash)
    {
        $mysqli = parent::connexionBdd();
        $sql = "INSERT INTO utilisateur (id, email, status, hash) VALUES
        (NULL, " . "?, 'USER', ?);";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $email, $hash);
        $mysqli->close();
    }
}
