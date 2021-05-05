<?php

include_once("Employe.php");

class Ouvrier extends Employe
{

    private $dateEntree;
    // private const TOTO = 1200;
    private static $smic = 2500;

    public function __construct(
        string $matricule,
        string $nom,
        string $prenom,
        string $dateNaissance,
        DateTime $dateEntree
    ) {
        parent::__construct($matricule, $nom, $prenom, $dateNaissance);
        $this->dateEntree = $dateEntree;
    }

    public function getSalaire(): float
    {
        // TOTO = 1500;
        $today = new DateTime();
        $interval = $today->diff($this->dateEntree);
        $nbrAnnees = $interval->y;
        $salaire = self::$smic + ($nbrAnnees * 100);
        if ($salaire > (self::$smic * 2)) {
            return self::$smic * 2;
        } else {
            return $salaire;
        }
    }

    /**
     * Get the value of dateEntree
     */
    public function getDateEntree(): DateTime
    {
        return $this->dateEntree;
    }

    /**
     * Set the value of dateEntree
     *
     * @return  self
     */
    public function setDateEntree(DateTime $dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }
}
