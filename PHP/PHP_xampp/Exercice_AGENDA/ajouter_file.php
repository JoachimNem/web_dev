<?php

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["telephone"])) {
    $newId = generateNextId();
    $file = fopen("personnes.txt", "a+");
    $char = "";
    if (filesize("personnes.txt") != 0) {
        // $ligne = $_POST["id"] .$_POST["prenom"] . ";" . $_POST["nom"] . ";" . $_POST["email"] . ";" . $_POST["telephone"];
        $char = "\n";
    } else {
        // $ligne = "\n" . $_POST["id"] . . $_POST["prenom"] . ";" . $_POST["nom"] . ";" . $_POST["email"] . ";" . $_POST["telephone"];
    }
    $ligne = $char . $newId . ";" . $_POST["prenom"] . ";" . $_POST["nom"] . ";" . $_POST["email"] . ";" . $_POST["telephone"];
    fwrite($file, $ligne);
    fclose($file);
    header("location: tableau.php");
}

function generateNextId()
{
    $file = fopen("personnes.txt", "r");
    while (!feof($file)) {
        $ligne = fgets($file);
        $infos = explode(";", $ligne);
        if (feof($file)) {
            return $infos[0] + 1;
        }
    }
}
