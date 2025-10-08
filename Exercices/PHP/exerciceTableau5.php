<?php
$tableau = array(
    "sujets" => array(
        "juge", 
        "whisky" 
    ),
    "verbes" => array(
        "fume",
        "Portez"
    ), 
    "adjectifs" => array(
        "blond",
        "vieux"
    ), 
    "determinant" => "ce",
    "article" => "au",
    "pronom relatif" => "qui"
);
// Afficher "Portez ce vieux whisky au juge blond qui fume" 
echo $tableau['verbes'][1] . " " . $tableau['determinant'] . " " . $tableau['adjectifs'][1] . " " .  $tableau['sujets'][1] . " " . $tableau['article'] . " " . $tableau['sujets'][0] . " " . $tableau['adjectifs'][0] . "  " . $tableau['pronom relatif'] . " " . $tableau['verbes'][0];