<?php
$tableau = array(
    "Pomme", 
    "Banane", 
    "Kiwi"
);

// Utiliser le tableau pour afficher "Pomme, banane, kiwi : le smoothie de l'été !"  

echo implode(", ", $tableau) . " : le smoothie de l'été";