<?php

include_once(__DIR__ . "/../model/Employe.php");

class EmployeDAO
{

    public function searchByNoemp(int $noemp): Employe
    {
        $mysqli = new mysqli("localhost", "root", "", "gestion_employes");
        $sql = "select * FROM emp where noemp = " . $noemp . ";";
        $rs = $mysqli->query($sql);
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $employe = (new Employe())->setNoemp($data[0]["NOEMP"])->setNom($data[0]["NOM"]);
        $rs->free();
        $mysqli->close();
        return $employe;
    }

    public function recuperationTabEmployes(): array
    {
        $mysqli = new mysqli("localhost", "admin", "", "gestion_employe");
        $sql = "SELECT * FROM EMPLOYES;";
        $rs = $mysqli->query($sql);
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        $tabEmps = [];
        foreach ($data as $value) {
            $employe = (new Employe())->setNoemp($value["noemp"])->setNom($value["nom"])->setPrenom($value["prenom"])->setEmploi($value["emploi"])->setSup($value["sup"])->setEmbauche($value["embauche"])->setSal($value["sal"])->setComm($value["comm"])->setNoserv($value["noserv"]);
            $tabEmps[] = $employe;
        }
        return $tabEmps;
    }

    public function tableau_Sup()
    {
        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "localhost", "admin", "", "gestion_employe");
        $resultat = mysqli_query($bdd, "SELECT DISTINCT sup FROM EMPLOYES WHERE sup IS NOT NULL;");
        $tableau_Sup = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
        mysqli_free_result($resultat);
        mysqli_close($bdd);
        return $tableau_Sup;
    }
    public function insert(Employe $obj)
    {
        $db = new mysqli("localhost", "admin", "", "gestion_employe");
        $id = ;
        $nom = $obj->getNom();
        $prenom = $obj->getPrenom();
        $emploi = $obj->getEmploi();
        $sup = $obj->getSup();
        $embauche = $obj->getEmbauche();
        $sal = $obj->getSal();
        $com = $obj->getComm();
        $noserv = $obj->getNoserv();
        $stmt = $db->prepare("INSERT INTO employes(noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
        VALUES(?,?,?,?,?,?,?,?);");
        $stmt->bind_param(
            "isssisddi",
            $id,
            $nom,
            $prenom,
            $emploi,
            $sup,
            $embauche,
            $sal,
            $comm,
            $noserv
        );
        $stmt->execute();
        $db->close();
    }
}
