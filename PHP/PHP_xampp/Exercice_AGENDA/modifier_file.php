<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php

if (isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["telephone"])) {
    $file = fopen("personnes.txt", "r");

    // recuperer la ligne a remplacer
    $ligneTrouvee = "";
    $isLast = false;
    while (!feof($file)) {
        $ligne = fgets($file);
        $infos = explode(";", $ligne);
        if ($_POST["id"] == $infos[0]) {
            $ligneTrouvee = $ligne;
            $isLast = feof($file);
            break;
        }
    }
    fclose($file);
    if (!$ligneTrouvee) {
        if (isset($_GET["id"])) {
            header("location: form_modif.php?id=" . $_GET["id"] . "&error=idNotFound");
        }
    } else {
        $file = fopen("personnes.txt", "r");
        $actualContent = fread($file, filesize("personnes.txt"));
        fclose($file);

        // remplacer l'ancienne par la nouvelle
        if ($isLast) {
            $newLine = $_POST["id"] . ";" . $_POST["prenom"] . ";" . $_POST["nom"] . ";" . $_POST["email"] . ";" . $_POST["telephone"];
        } else {
            $newLine = $_POST["id"] . ";" . $_POST["prenom"] . ";" . $_POST["nom"] . ";" . $_POST["email"] . ";" . $_POST["telephone"] . "\n";
        }
        $newContent = str_replace($ligneTrouvee, $newLine, $actualContent);

        //ecrire la nouvelle version du fichier
        $file = fopen("personnes.txt", "w");
        fwrite($file, $newContent);
        fclose($file);
        header("location: tableau.php");
    }

    // recupere le contrnu du fichier dans un string

}
