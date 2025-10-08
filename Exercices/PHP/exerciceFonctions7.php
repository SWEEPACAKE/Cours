<?php
// Exercice : Créer une fonction qui calcule la moyenne d'un tableau de notes

/*
Objectif :
Créer une fonction qui prend un tableau de notes en paramètre et retourne la moyenne de ces notes.

Étapes :
1. Crée un tableau $notes avec au moins 5 notes (nombres).
2. Crée une fonction calculerMoyenne qui prend un tableau en paramètre.
3. Dans la fonction, additionne toutes les notes et divise par le nombre de notes pour obtenir la moyenne.
4. La fonction doit retourner la moyenne.
5. Appelle la fonction avec ton tableau et affiche le résultat.
*/

// Ton code ici :
$notes = array(
    11, // 0
    13, // 1
    9, // 2
    17, // 3
    15, // 4
    7, // 5
    8, // 6
    19 // 7
);

// METHODE NICO
// function calculerMoyenne($tableauDeNotes) {
//     $nbNotes = count($tableauDeNotes);
//     $sommeNotes = 0;
//     foreach($tableauDeNotes as $note) {
//         $sommeNotes = $sommeNotes + $note;
//     }

//     return round($sommeNotes / $nbNotes, 2);
// }
// echo calculerMoyenne($notes);

// METHODE DYLAN
function calculerMoyenne($listeNotes) {
    $sum = array_sum($listeNotes);
    $moyenne = $sum / count($listeNotes);
    echo $moyenne;
}

calculerMoyenne($notes);
?>