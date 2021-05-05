<?php

class Personne
{
    private $nom;
    private $prenom;
    private $dateNaissance;

    // public function __construct(string $nom, string $prenom, string $dateNaissance)
    // {
    //     $this->nom = $nom;
    //     $this->prenom = $prenom;
    //     $this->dateNaissance = $dateNaissance;
    // }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nouveauNom): Personne
    {
        $this->nom = $nouveauNom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $nouveauPrenom): Personne
    {
        $this->prenom = $nouveauPrenom;
        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?string $nouveauDateNaissance): Personne
    {
        $this->dateNaissance = $nouveauDateNaissance;
        return $this;
    }

    public function __toString()
    {
        return "Nom : " . $this->nom . ", Prenom : " . $this->prenom . ", Date de naissance : " . $this->dateNaissance . "\n";
    }
}
