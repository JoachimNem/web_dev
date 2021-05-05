<?php

// Import de classe mère

include_once("Batiment.php");

class Maison extends Batiment
{
    // Attribut

    private $nbPieces;

    // Constructeur

    public function __construct(string $adresse, string $superficie, int $nbPieces)
    {
        $this->adresse = $adresse;
        $this->superficie = $superficie;
        $this->nbPieces = $nbPieces;
    }

    // GETTER SETTER nbPieces

    public function getnbPieces(): ?int
    {
        return $this->nbPieces;
    }
    public function setnbPieces(?int $nouveaunbPieces): Maison
    {
        $this->nbPieces = $nouveaunbPieces;
        return $this;
    }

    // Tostring

    public function __toString()
    {
        return "Adresse : " . $this->adresse . ", la superficie est de : " . $this->superficie . " et le nombre de pièces est de : " . $this->nbPieces . "\n";
    }
}
