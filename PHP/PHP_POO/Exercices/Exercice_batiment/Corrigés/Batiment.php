<?php

class Batiment
{

    private $adresse;
    private $superficie;

    public function __construct(string $adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Get the value of adresse
     * @return string|null
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of superficie
     * @return float
     */
    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    /**
     * Set the value of superficie
     *
     * @return  self
     */
    public function setSuperficie(?float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function __toString()
    {
        return "[Adresse]:" . $this->adresse . ", [superficie]: " . $this->superficie;
    }
}
