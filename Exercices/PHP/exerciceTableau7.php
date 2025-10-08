<?php
$smoothie_de_l_ete = "Pomme, banane, kiwi";

// Utiliser la phrase pour constituer un tableau
// Puis utiliser ce tableau nouvellement formé pour afficher la phrase 
// "Kiwi, pomme, banane : le smoothie de l'automne ! " 
$monTableau = explode(", ", $smoothie_de_l_ete);

echo ucfirst($monTableau[2]) . ", " . strtolower($monTableau[0]) . ", " . strtolower($monTableau[1]) . " : le smoothie de l'automne"; 