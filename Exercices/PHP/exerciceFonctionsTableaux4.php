<?php
$tableau = array(
    "The", // 0
    "", // 1
    "lazy", // 2
    "", // 3
    "", // 4
    "", // 5
    "", // 6
    "", // 7
    "", // 8
    "", // 9 
    "", // 10
    "vieux", // 11
    "", // 12
    "", // 13
    "", // 14
    "blond", // 15
    "", // 16
    "fume" // 17
);

// CONSIGNES : 
// Faire une fonction qui va parcourir le tableau avec un foreach(), puis, à chaque fois que l'on rencontre une valeur vide, supprimer cet élément du tableau. 
// À la fin je dois avoir un tableau avec seulement des valeurs non vides 

// Exemple : foreach($tableau as $key => $value) 

// Faire un var_dump() de ce tableau

function cleanArray($monTableauANettoyer) {
    foreach($monTableauANettoyer as $key => $value) {
        if($value == "") {
            // Là il faut enlever la ligne
            unset($monTableauANettoyer[$key]);
        }
    }
    return $monTableauANettoyer;
}

var_dump(cleanArray($tableau));