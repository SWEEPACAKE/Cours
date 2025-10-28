<?php

class Produit {
    
    private string $libelle;
    private float $prix;

    public function __construct($monLibelle, $monPrix) {
        $this->libelle = $monLibelle;
        $this->prix = $monPrix;
    }

    public function getLibelle() {
        return $this->libelle;
    }
    public function setLibelle($value) {
        $this->libelle = $value;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function setPrix($value) {
        $this->prix = $value;
    }

    public function __toString() {
        return $this->libelle . " : " . $this->prix . "€<br>";
    }

}