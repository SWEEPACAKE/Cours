<?php
$tableau = array(
    "The", // 0
    "quick", // 1
    "brown", // 2
    "fox", // 3
    "jumps", // 4
    "over", // 5
    "the", // 6
    "lazy", // 7
    "dog", // 8
    "Portez", 
    "ce",
    "vieux",
    "whisky",
    "au",
    "juge",
    "blond",
    "qui",
    "fume"
);

// CONSIGNES : 
// Écrire une fonction qui prend en paramètres un tableau, puis un chiffre X et un chiffre Y
// Il faudra générer une chaîne de caractère à partir d'un tableau contenant toutes les données aux index compris entre X et Y
//
// Exemple : filterArray($tableau, 8, 17); affichera "Portez ce vieux whisky au juge blond qui fume"

// Appelez votre fonction et afficher son résultat comme une chaîne de caractère

function couperTableau($monTableau, $x, $y) {
    return implode(" ", array_slice($monTableau, $x, ($y - $x) + 1));
}

echo couperTableau($tableau, 0, 8) . "<br>";
echo couperTableau($tableau, 5, 11) . "<br>";
echo couperTableau($tableau, 9, 18) . "<br>";