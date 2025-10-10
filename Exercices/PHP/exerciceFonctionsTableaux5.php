<?php
$tableau = array(
    array(
        "Test" => "blabla",
        "Test2" => "blibli"
    ),
    array(
        "Trésor" => "Bonjour je suis le bon tableau"
    ),
    array(
        "test3" => "bloblo"
    ),
   
);
// CONSIGNES : 
// Parcourir le tableau avec un foreach(), puis à chaque occurence du tableau principal, vérifier si le tableau secondaire possède la clé "Trésor". Si oui, il faut isoler ce tableau dans une variable et l'afficher, seul, en dehors de la fonction.

// Faire un var_dump() de ce tableau

function trouverTresor($monTableauAFouiller) {
    foreach($monTableauAFouiller as $monTableau) {
        if(array_key_exists('Trésor', $monTableau)) {
            return $monTableau;
        }
    }
}

var_dump(trouverTresor($tableau));