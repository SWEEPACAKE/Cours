<?php
class Acheteur {
    private string $nom;
    private string $prenom;
    private float $solde;
    private array $panier;

    public function __construct($monNom, $monPrenom, $monSolde, $monPanier = array()) {
        $this->nom = $monNom;
        $this->prenom = $monPrenom;
        $this->solde = $monSolde;
        $this->panier = $monPanier;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($value) {
        $this->nom = $value;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($value) {
        $this->prenom = $value;
    }
    public function getSolde() {
        return $this->solde;
    }
    public function setSolde($value) {
        $this->solde = $value;
    }
    public function getPanier() {
        return $this->panier;
    }
    public function setPanier($value) {
        $this->panier = $value;
    }

    public function calculerDetailPanier() {
        if(empty($this->panier)) {
            return array(
                "texte" => "Votre panier est vide !", 
                "montant" => 0
            );
        } else {
            $texte = "";
            $montant = 0;
            foreach($this->panier as $produit) {
                if($produit instanceof Produit) {
                    $texte .= $produit;
                    $montant += $produit->getPrix();
                }
            }
            $texte .= "Total du panier : " . $montant . "€";
            return array(
                "texte" => $texte, 
                "montant" => $montant
            );
        }
    }

    public function passerCommande() {
        if(empty($this->panier)) {
            return "Votre panier est vide !";
        } else {
            $montant = $this->calculerDetailPanier()['montant'];
            if($montant <= $this->solde) {
                $this->solde = $this->solde - $montant;
                $texte = "Commande passée ! Solde restant : " . number_format($this->solde, 2, ",", " ") . "€";
            } else {
                $texte = "Solde insuffisant ! Solde restant : " . number_format($this->solde, 2, ",", " ") . "€";
            }
            return $texte;
        }
    }

    public function ajouterFondsSurSolde(float $montant) {
        $this->solde += $montant;
    }

    public function ajouterAuPanier(Produit $produit) {
        array_push($this->panier, $produit);
    }

}