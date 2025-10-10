<?php
$tableau1 = array(
    "The", // 0
    "brown", // 1
    "lazy", // 2
    "fox", // 3
    "jumps", // 4
    "quick", // 5
    "the", // 6
    "dog", // 7
    "over", // 8
    "Portez", // 9 
    "ce", // 10
    "vieux", // 11
    "whisky", // 12
    "au", // 13
    "juge", // 14
    "blond", // 15
    "qui", // 16
    "fume" // 17
);

// CONSIGNES : 
// Écrire une fonction qui prend en paramètres un tableau, puis un chiffre X, et renvoyer une chaîne de caractères généré à partir du tableau en prenant seulement les X premieres lignes du tableau

// Appelez votre fonction et afficher son résultat comme une chaîne de caractère
function couperTableau($monTableau, $x) {
    return implode(" ", array_slice($monTableau, 0, $x));
}

echo couperTableau($tableau1, 8) . "<br>";
echo couperTableau($tableau1, 11) . "<br>";
echo couperTableau($tableau1, 2) . "<br>";
echo couperTableau($tableau1, 5) . "<br>";