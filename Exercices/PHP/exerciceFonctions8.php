<?php
// Exercice : Créer une fonction qui trouve la note la plus élevée dans un tableau

/*
Objectif :
Créer une fonction qui prend un tableau de notes en paramètre et retourne la note la plus élevée.

Étapes :
1. Crée un tableau $notes avec au moins 5 notes (nombres).
2. Crée une fonction trouverNoteMax qui prend un tableau en paramètre.
3. Dans la fonction, utilise une boucle pour parcourir le tableau et trouver la plus grande valeur.
4. La fonction doit retourner la note maximale trouvée.
5. Appelle la fonction avec ton tableau et affiche le résultat.
*/

// Ton code ici :

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
// METHODE RECOMMANDÉE
function NOTE_MAX($listeNotes) {
    return max($listeNotes);
}

// METHODE CHIANTE POUR S'EXERCER

// function NOTE_MAX($listeNotes) {
//     $noteMax = 0;
//     foreach($listeNotes as $note) {
//         if($note > $noteMax) {
//             $noteMax = $note;
//         }
//     }
//     return $noteMax;
// }

echo NOTE_MAX($notes);

?>

