<?php

include_once("Batiment.php");

class Maison extends Batiment
{

    private $nbPieces;

    public function __construct(string $adresse, float $superficie, int $nbPieces)
    {
        parent::__construct($adresse);
        $this->setSuperficie($superficie);
        $this->nbPieces = $nbPieces;
    }

    /**
     * Get the value of nbPieces
     */
    public function getNbPieces(): ?int
    {
        return $this->nbPieces;
    }

    /**
     * Set the value of nbPieces
     *
     * @return  self
     */
    public function setNbPieces(?int $nbPieces): self
    {
        $this->nbPieces = $nbPieces;

        return $this;
    }

    public function __toString()
    {
        return parent::__toString() . ", [nbPieces] : " . $this->nbPieces . "\n";
    }
}
