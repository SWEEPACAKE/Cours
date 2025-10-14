<?php
$tableau = array(
    "1" => "Tracteur tondeuse", 
    "2" => "Débrouissailleuse", 
    "3" => "Coupe-branches", 
    "4" => "Taille-haies"
);

// Utiliser ici la donnée passée dans l'URL depuis l'exercice 1A 
// Pour afficher seulement un outil du tableau

echo $tableau[$_GET['id_outil']];