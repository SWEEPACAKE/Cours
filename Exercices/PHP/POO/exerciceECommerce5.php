<?php
/*********************************
 * 
 *          CINQUIEME CONSIGNE
 *  
 *********************************/

// Reprendre l'exercice 4 mais au lieu d'afficher simplement le panier
// On veut afficher le montant produit par produit, et enfin le montant total du panier. 

// Pour cela, développez une méthode dans la classe Acheteur appelée "calculerDetailPanier()"

// Appelez cette méthode sur votre objet Acheteur et vous devez avoir le détail du contenu de son panier
require 'classes/Produit.class.php';
require 'classes/Acheteur.class.php';

$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

$arrayPanier = array($produit1, $produit2, $produit3);

$acheteur = new Acheteur("SAVOCA", "Nicolas", 10000000.50, $arrayPanier);

echo $acheteur->calculerDetailPanier()['texte'];