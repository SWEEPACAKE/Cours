<?php

$tableau = array(
    array( // 0
        "elements1" => array(
            "The", // 0
            array( // 1
                "quick", // 0
                "the", // 1
            ), 
            "brown", // 2
            "jumps", //3
        ), 
        "elements2" => array(
            array( // 0
                "lazy", // 0
                "fox" // 1
            ),
            "dog", // 1
            "over" // 2
        ) 
    )
);
// Afficher "The quick brown fox jumps over the lazy dog"
echo $tableau[0]['elements1'][0] . " " . $tableau[0]['elements1'][1][0] . " " . $tableau[0]['elements1'][2] . " " .$tableau[0]['elements2'][0][1] . " " . $tableau[0]['elements1'][3] . " " . $tableau[0]['elements2'][2] . " " . $tableau[0]['elements1'][1][1] . " " . $tableau[0]['elements2'][0][0] . " " . $tableau[0]['elements2'][1];