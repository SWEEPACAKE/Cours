<?php
$mots = array(
    "Portez", // 0
    "blablabla", // 1
    "blablibla", // 2
    "ce", // 3
    "vieux", // 4
    "blablablu", // 5
    "whisky", // 6
    "blablabla", // 7
    "au", // 8
    "juge", // 9
    "blond", // 10
    "blablobla", // 11
    "qui", // 12
    "blablubla", // 13
    "fume" // 14
);

// CONSIGNES : 
// Vous allez devoir purger le tableau pour ne garder que les éléments permettant de constituer la phrase "Portez ce vieux whisky au juge blond qui fume"
// Pas besoin de faire ça dans une fonction
unset($mots[1],$mots[2],$mots[5],$mots[7],$mots[11],$mots[13]);

echo implode(' ', $mots);