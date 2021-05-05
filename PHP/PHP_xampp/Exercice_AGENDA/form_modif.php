<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Ajouter une personne</title>
</head>

<body>
    <?php
    $selectedPersonne = [];
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $file = fopen("personnes.txt", "r");

        while (!feof($file)) {
            $ligne = fgets($file);
            $infos = explode(";", $ligne);
            if ($id == $infos[0]) {
                $selectedPersonne = $infos;
                break;
            }
        }
    }
    if (isset($_GET["error"]) && $_GET["error"] == "idNotFound") {
        echo "<div class='alert alert-danger'>Cette personne n'existe pas dans l'agenda.</div>";
    }

    ?>
    <form action="modifier_file.php?id=<?php echo $_GET["id"]; ?>" method="POST">
        <input type="hidden" readonly class="form-control" name="id" value="<?php echo $selectedPersonne[0]; ?>" placeholder="Entrez votre id">
        <input type="text" class="form-control" name="prenom" value="<?php echo $selectedPersonne[1]; ?>" placeholder="Entrez votre prènom">
        <input type="text" class="form-control" name="nom" value="<?php echo $selectedPersonne[2]; ?>" placeholder="Entrez votre nom">
        <input type="email" class="form-control" name="email" value="<?php echo $selectedPersonne[3]; ?>" placeholder="Entrez votre email">
        <input type="tel" class="form-control" name="telephone" value="<?php echo $selectedPersonne[4]; ?>" placeholder="Entrez votre téléphone">
        <input type="submit" class="btn btn-success" value="Soumettre">
    </form>

</body>

</html>