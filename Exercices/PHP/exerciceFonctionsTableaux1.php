<?php
$tableau1 = array("The", "brown", "lazy", "fox", "jumps", "quick", "the", "dog", "over");
$tableau2 = array("Portez", "ce", "vieux", "whisky", "au", "juge", "blond", "qui", "fume");

// CONSIGNES : 
// Écrire une fonction qui prend en paramètres deux tableaux, et renvoie un seul tableau contenant toutes les données des deux tableaux réunies. 

// Puis effectuer un var_dump() du résultat de cette fonction afin de vérifier
function fusionnerTableaux($premierTableau, $deuxiemeTableau) {
    foreach($deuxiemeTableau as $mot) {
        array_push($premierTableau, $mot);
    }
    return $premierTableau;
    // return array_merge($premierTableau, $deuxiemeTableau);
}
var_dump(fusionnerTableaux($tableau1, $tableau2));