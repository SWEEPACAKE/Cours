<?php

$tableau = array(
    "The", // 0
    array( // 1
        "quick", // 0
        "the", // 1
    ), 
    "brown", // 2
    "jumps", // 3
    array( // 4
        "lazy", // 0
        "fox" // 1
    ),
    "dog", // 5
    "over" // 6
);
// Afficher "The quick brown fox jumps over the lazy dog"
echo $tableau[0] . " " . $tableau[1][0] . " " . $tableau[2] . " " . $tableau[4][1] . " " . $tableau[3] . " " . $tableau[6] . " " . $tableau[1][1] . " " . $tableau[4][0] . " " . $tableau[5];