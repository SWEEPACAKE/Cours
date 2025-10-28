<?php
/*********************************
 * 
 *          SIXIEME CONSIGNE
 *  
 *********************************/

// Reprendre l'exercice 5 mais au lieu d'afficher simplement le détail du panier grâce à la méthode
// calculerDetailPanier(), on veut que le client passe à la caisse. 

// Pour cela, développez une méthode "passerCommande()" dans la classe Acheteur
// Cette méthode prendra le panier de l'Acheteur, calculera son total 
// Et si l'acheteur possède le solde bancaire suffisant, alors nous affichons un message 
// "Commande bien reçue", et on déduira son solde bancaire du montant correspondant. 

// Afficher "Commande bien reçue ! Solde restant : X"
// Ou alors "Solde insuffisant ! Solde restant : X"
require 'classes/Produit.class.php';
require 'classes/Acheteur.class.php';

$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

$arrayPanier = array($produit1, $produit2, $produit3);

$acheteur = new Acheteur("SAVOCA", "Nicolas", 10000000.50, $arrayPanier);

echo $acheteur->passerCommande();