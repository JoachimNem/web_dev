<?php

include_once(__DIR__ . "/../model/Employe.php");

class EmployeDAO extends Commun
{

    public function searchByNoemp(int $noemp): Employe
    {
        $mysqli = parent::connexionBdd();
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
        $mysqli = parent::connexionBdd();
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
        $mysqli = parent::connexionBdd();
        // $id = ;
        $nom = $obj->getNom();
        $prenom = $obj->getPrenom();
        $emploi = $obj->getEmploi();
        $sup = $obj->getSup();
        $embauche = $obj->getEmbauche();
        $sal = $obj->getSal();
        $comm = $obj->getComm();
        $noserv = $obj->getNoserv();
        $stmt = $mysqli->prepare("INSERT INTO employes(noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv)
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
        $mysqli->close();
    }

    public function supprimerEmp($noemp)
    {
        $mysqli = parent::connexionBdd();
        $stmt = $mysqli->prepare("DELETE FROM employes WHERE noemp =?;");
        $stmt->bind_param("i", $noemp);
        $stmt->execute();
        $mysqli->close();
    }
    public function updateEmp(Employe $obj, int $noemp)
    {
        $mysqli = parent::connexionBdd();
        $nom = $obj->getNom();
        $prenom = $obj->getPrenom();
        $emploi = $obj->getEmploi();
        $sup = $obj->getSup();
        $embauche = $obj->getEmbauche();
        $sal = $obj->getSal();
        $comm = $obj->getComm();
        $noserv = $obj->service->setService();
        $stmt = $mysqli->prepare("UPDATE employes SET 
        nom=?,
        prenom=?,
        emploi=?,
        sup=?,
        embauche=?,
        sal=?,
        comm=?,
        noserv=?, WHERE noemp = ?;");
        $stmt->bind_param(
            "sssisddi",
            $nom,
            $prenom,
            $emploi,
            $sup,
            $embauche,
            $sal,
            $comm,
            $noserv,
        );
        $stmt->execute();
        $mysqli->close();
    }

    public function detailByName(int $id)
    {
        $mysqli = parent::connexionBdd();
        $stmt = $mysqli->prepare("SELECT * FROM employes as e INNER JOIN services AS s ON e.noserv = s.noserv WHERE noemp =?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $rs = $stmt->get_result();
        $tabEmploye = $rs->fetch_array(MYSQLI_ASSOC);

        $obj = new Employe;
        $obj->setNoemp($tabEmploye["noemp"]);
        $obj->setNom($tabEmploye["nom"]);
        $obj->setPrenom($tabEmploye["prenom"]);
        $obj->setEmploi($tabEmploye["emploi"]);
        $obj->setSup($tabEmploye["sup"]);
        $obj->setEmbauche($tabEmploye["embauche"]);
        $obj->setSal($tabEmploye["sal"]);
        $obj->setComm($tabEmploye["comm"]);
        $obj->service->setNoserv($tabEmploye["noserv"]);
        $obj->service->setService($tabEmploye["service"]);
        $obj->service->setVille($tabEmploye["ville"]);

        $mysqli->close();
        return $obj;
    }

    function listeChef()
    {
        $mysqli = parent::connexionBdd();
        $stmt = $mysqli->prepare("SELECT DISTINCT sup FROM employes;");
        $stmt->execute();
        $rs = $stmt->get_result();
        $tabSup = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $tabSup;
    }
}
