<?php
// Exercice : Créer une fonction qui calcule la somme des notes avec une boucle foreach

/*
Objectif :
Créer une fonction qui prend un tableau de notes en paramètre et retourne la somme de toutes les notes.

Étapes :
1. Crée un tableau $notes avec au moins 5 notes (nombres).
2. Crée une fonction calculerSommeNotes qui prend un tableau en paramètre.
3. Dans la fonction, utilise une boucle foreach pour additionner toutes les notes.
4. La fonction doit retourner la somme totale.
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

function calculerSommeNotes($listeNotes) {
    $sommeNotes = 0;
    foreach($listeNotes as $note) {
        $sommeNotes += $note;
    }
    return $sommeNotes;
}

echo calculerSommeNotes($notes);
?>