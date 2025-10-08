<?php

$tableau = array(
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


// Afficher "Portez ce vieux whisky au juge blond qui fume"... En une seule ligne et moins de 30 caractères ! 
echo implode(" ", $tableau);
// echo "<br><br>";

// foreach($tableau as $mot) {
//     echo $mot . " ";
// }