<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php infos</title>
</head>

<body>
    <a href="form_ajout.html"><Button class="btn btn-primary">Ajouter</Button></a>
    <hr>
    <table class="table table-striped table-dark">
        <tr>
            <th>ID</th>
            <th>Prènom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>#</th>
        </tr>
        <?php

        $file = fopen("personnes.txt", "r");
        while (!feof($file)) {
            $ligne = fgets($file);
            $infos = explode(";", $ligne);
            echo "<tr>";
            echo "<td>$infos[0]</td>";
            echo "<td>$infos[1]</td>";
            echo "<td>$infos[2]</td>";
            echo "<td>$infos[3]</td>";
            echo "<td>$infos[4]</td>";
            echo "<td><a href='form_modif.php?id=$infos[0]'><button class='btn btn-warning'>Modifier</button></a></td>";
            echo "</tr>";
        }
        fclose($file);
        ?>
    </table>
</body>

</html>