<?php
class Batiment
{
    // Attributs

    protected $adresse;
    protected $superficie;

    // Constructeur

    public function __construct(string $adresse)
    {
        $this->adresse = $adresse;
    }

    // GETTER SETTER adresse

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
    public function setAdresse(?string $nouvelleAdresse): Batiment
    {
        $this->adresse = $nouvelleAdresse;
        return $this;
    }

    // GETTER SETTER superficie

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }
    public function setSuperficie(?string $nouvelleSuperficie): Batiment
    {
        $this->superficie = $nouvelleSuperficie;
        return $this;
    }

    // Tostring

    public function __toString()
    {
        return "Adresse : " . $this->adresse . ", la superficie est de : " . $this->superficie . "\n";
    }
}
