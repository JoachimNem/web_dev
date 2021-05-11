<?php
include_once(__DIR__ . "/../DAO/EmployeDAO.php");

class EmployeService
{
    public function searchByNoemp(int $noemp): Employe
    {
        $employeDAO = new EmployeDAO();
        $employe = $employeDAO->searchByNoemp($noemp);
        return $employe;
    }

    public function recuperationTabEmployes(): array
    {
        $employeDAO = new EmployeDAO();
        $tabEmps = $employeDAO->recuperationTabEmployes();
        return $tabEmps;
    }

    public function tabSup(): array
    {
        $employeDAO = new EmployeDAO();
        $tabSup = $employeDAO->tabSup();
        return $tabSup;
    }

    public function detailByName(int $id)
    {
        $employeDAO = new EmployeDAO();
        $employe = $employeDAO->detailByName($id);
        return $employe;
    }

    public function insertEmp(Employe $objet)
    {
        $employeDAO = new EmployeDAO();
        $employeDAO->insertEmp($objet);
    }

    public function supprimerEmp($noemp)
    {
        $employeDAO = new EmployeDAO();
        $employeDAO->supprimerEmp($noemp);
    }
    public function updateEmp(Employe $objet)
    {
        $employeDAO = new EmployeDAO();
        $employeDAO->updateEmp($objet);
    }
}
