<?php
/*********************************
 * 
 *          HUTIEME CONSIGNE
 *  
 *********************************/

// Nous allons enfin créer une méthode capable d'ajouter un produit au panier
// Sans que ça soit à nous de le faire à la création de l'Acheteur

// Appeler la méthode "ajouterAuPanier(Produit $produit)" dans la classe Acheteur

// Créer un acheteur avec un panier vide, puis trois produit 
// et passer seulement l'un d'entre eux dans le panier de l'acheteur

// Faire un var_dump du panier de l'acheteur

require 'classes/Acheteur.class.php';
require 'classes/Produit.class.php';


$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

$acheteur = new Acheteur("SAVOCA", "Nicolas", 0.50);

var_dump($acheteur->getPanier());

$acheteur->ajouterAuPanier($produit1);

var_dump($acheteur->getPanier());