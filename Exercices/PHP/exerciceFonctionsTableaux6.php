<?php
$tableau = array(
    "tableau1" => array(
        "Test" => "blabla",
        "Test2" => "blibli"
    ),
    "tableau2" => array(
    ),
    "tableau3" => array(
        "Trésor" => "Bonjour je suis le bon tableau"
    ),
    "tableau4" => array(
    )
);

// CONSIGNES : 
// Écrire une fonction qui va prendre un tableau en paramètres, puis parcourir ce tableau et me donner le nom de la clé de tous les tableaux vides. En valeur retour de la fonction, je veux la liste textuelle des tableaux vides, comme ceci : "tableau2, tableau4"

// Appeler la fonction et afficher son résultat.

function trouverTableauVide($monTableau) {
    $texte = "";
    // $texte = array();
    foreach($monTableau as $key => $value) {
        if(empty($value)) {
            $texte .= $key . ", ";
            // array_push($texte, $key);
        }
    }
    return substr($texte, 0, -2);
    // return implode(", ", $texte);
}

echo trouverTableauVide($tableau);