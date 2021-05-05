<?php

include_once("Employe.php");

class Cadre extends Employe {

    private $indice;

    public function __construct(
        string $matricule,
        string $nom,
        string $prenom,
        string $dateNaissance
    ) {
        parent::__construct($matricule, $nom, $prenom, $dateNaissance);
    }

    public function getSalaire(): float
    {
        switch ($this->indice) {
            case 1 :  
                return 13000;
            case 2 :
                return 15000;
            case 3 :
                return 17000;
            case 4 :
                return 20000;
            default :
                return 0;        
        }
    }

    /**
     * Get the value of indice
     */ 
    public function getIndice()
    {
        return $this->indice;
    }

    /**
     * Set the value of indice
     *
     * @return  self
     */ 
    public function setIndice(int $indice)
    {
        if(array_search($indice, [1, 2, 3, 4])){
            $this->indice = $indice;
        }     
        return $this;
    }
}