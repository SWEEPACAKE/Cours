<?php
// Consigne : Dans cette série d'exercices, nous allons créer deux classes : 
// Produit et Acheteur. 
// Et nous allons dérouler un scénario dans lequel un acheteur
// Met des produits dans son panier, puis passe à la caisse. 

// Dans ce premier exercice, nous allons simplement créer la classe Produit. 
// Mettez ces classes dans des fichiers correspondant dans le dossier /debuging/poo/classes
// À la fin des exercices, vous aurez un fichier Acheteur.class.php et Produit.class.php dedans

/*********************************
 * 
 *          PREMIERE CONSIGNE
 *  
 *********************************/
// Créer la classe "Produit". Un produit a un libellé et un prix. 
// Inclure cette classe ici, puis créer trois objets, instances de la classe produit: 
// Une brosse à dent, à 4€
// Du fil dentaire, à 6€
// Du dentifrice, à 3€

// Afficher le prix en face de chaque produit sur la page HTML

require 'classes/Produit.class.php';

$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

echo $produit1;
echo $produit2;
echo $produit3;