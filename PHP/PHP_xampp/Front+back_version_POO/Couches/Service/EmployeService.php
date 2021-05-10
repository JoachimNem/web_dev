<?php
include_once(__DIR__ . "/../EmployeDAO.php");

class EmployeService
{
    public function searchByNoemp(int $noemp): Employe
    {
        $employeDao = new EmployeDAO();
        $employe = $employeDao->searchByNoemp($noemp);
        return $employe;
    }

    public function recuperationTabEmployes(): array
    {
        $tabEmps = [];
        foreach ($data as $value) {
            $employe = (new EmployeDAO())->setNoemp($value["noemp"])->setNom($value["nom"])->setPrenom($value["prenom"])->setEmploi($value["emploi"])->setSup($value["sup"])->setEmbauche($value["embauche"])->setSal($value["sal"])->setComm($value["comm"])->setNoserv($value["noserv"]);
            $tabEmps[] = $employe;
        return $tabEmps;
    }
}