<?php
/*********************************
 * 
 *          SEPTIEME CONSIGNE
 *  
 *********************************/

// Suite à l'exercice 6, nous avons constaté que 
// certains acheteurs n'avaient pas les fonds pour
// acheter les produits. Nous allons donc devoir préparer une méthode
// Permettant de créditer des fonds sur le solde d'un Acheteur. 

// Appeler la méthode "ajouterFondsSurSolde($montant)" dans la classe Acheteur 

// Pour tester, créer les trois produits habituels, comme dans les exercices précédents 

// Puis créer un utilisateur avec pour solde 5€, et dans le panier, les trois produits

// Appeler la méthode passerCommande(). Vous aurez un message 
// d'erreur indiquant que le solde est insuffisant 

// Appelez ensuite la méthode "ajouterFondsSurSolde($montant)" 
// et créditer 100€ sur le solde de l'acheteur

// Appelez de nouveau passerCommande(), cette fois vous 
// aurez un message de confirmation que la commande a bien été passée :)

require 'classes/Produit.class.php';
require 'classes/Acheteur.class.php';

$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

$arrayPanier = array($produit1, $produit2, $produit3);

$acheteur = new Acheteur("SAVOCA", "Nicolas", 0.50, $arrayPanier);

echo $acheteur->passerCommande();

$acheteur->ajouterFondsSurSolde(100);

echo $acheteur->passerCommande();