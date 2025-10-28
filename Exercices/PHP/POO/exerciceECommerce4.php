<?php
/*********************************
 * 
 *          QUATRIEME CONSIGNE
 *  
 *********************************/

// Nous allons modifier la classe Acheteur ici. 
// Rajouter une propriété $panier dans la classe. Cette propriété sera de type tableau (array)
// Modifier également le constructeur de la classe pour pouvoir lui passer un tableau de Produit

// Inclure à la fois la classe Produit et la classe Acheteur  

// Créer trois produits (reprenez ceux des exercices précédents)
// Créer un acheteur en passant le tableau des trois produits dans le constructeur 

// Afficher le panier de l'acheteur (Vous devez avoir les trois produits dedans)
require 'classes/Produit.class.php';
require 'classes/Acheteur.class.php';


$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

$arrayPanier = array($produit1, $produit2, $produit3);

$acheteur = new Acheteur("SAVOCA", "Nicolas", 10000000.50, $arrayPanier);

var_dump($acheteur->getPanier());