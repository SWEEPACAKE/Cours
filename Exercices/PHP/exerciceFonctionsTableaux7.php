<?php
$mots = array(
    "fume",
    "qui",
    "blond",
    "juge",
    "au",
    "whisky",
    "vieux",
    "ce",
    "Portez" 
);

// CONSIGNES : 
// Afficher la phrase "Portez ce vieux whisky au juge blond qui fume" ... En précisément 40 caractères :) Ou moins si vous pouvez

echo implode(' ', array_reverse($mots));