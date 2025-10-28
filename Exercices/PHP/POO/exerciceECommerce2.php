<?php
/*********************************
 * 
 *          DEUXIEME CONSIGNE
 *  
 *********************************/
// Inclure à nouveau la classe Produit ici, créer les trois objets comme dans l'exercice précédent
// Mais cette fois, on ne va pas simplement les afficher

// On va considérer qu'un client veut acheter les trois produits, donc on va additionner leurs prix
// Pour cela, vous pouvez mettre les trois objets dans un tableau $panier, puis boucler sur le tableau

// Si vous avez une autre idée, allez-y :) 

// Afficher le total du panier sur la page HTML

require 'classes/Produit.class.php';

$produit1 = new Produit("Brosse à dents", 4.00);
$produit2 = new Produit("Fil dentaire", 6.00);
$produit3 = new Produit("Dentifrice", 3.00);

$arrayPanier = array($produit1, $produit2, $produit3);

$total = 0;
foreach($arrayPanier as $produit) {
    $total += $produit->getPrix();
}

echo "Prix total du panier : " . $total . "€";