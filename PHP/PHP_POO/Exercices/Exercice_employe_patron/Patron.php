<?php

include_once("Employe.php");

class Patron extends Employe
{

    private static $chiffreAffaire = 50000;
    private $pourcentage;

    public function __construct(
        string $matricule,
        string $nom,
        string $prenom,
        string $dateNaissance,
        int $pourcentage
    ) {
        parent::__construct($matricule, $nom, $prenom, $dateNaissance);
        $this->pourcentage = $pourcentage;
    }

    public function getSalaire(): float
    {
        if ($this->pourcentage != null) {
            return self::$chiffreAffaire * $this->pourcentage / 100;
        }
        return 0;
    }


    /**
     * Get the value of pourcentage
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set the value of pourcentage
     *
     * @return  self
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }
}
