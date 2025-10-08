<?php
// Exercice : Afficher une liste HTML de prénoms avec PHP

/*
Objectif :
Créer un tableau de prénoms et utiliser une fonction pour afficher chaque prénom dans une liste HTML <ul>.

Étapes :
1. Crée un tableau $prenoms avec au moins 5 prénoms.
2. Crée une fonction afficherListePrenoms qui prend le tableau en paramètre.
3. Dans la fonction, affiche une balise <ul>, puis utilise une boucle foreach pour afficher chaque prénom dans une balise <li>.
4. Ferme la balise </ul> à la fin de la fonction.
5. Appelle la fonction pour afficher la liste sur la page.
*/

// Ton code ici :
$prenoms = array(
    "Dylan",
    "Emmanuel", 
    "Thomas", 
    "Carole",
    "Nadège", 
    "Hugo", 
    "Abdelazize"
);

function afficherListePrenoms($listePrenoms) {
    echo "<ul>";
    foreach($listePrenoms as $prenom) {
        echo "<li>" . $prenom . "</li>";

    }
    echo "</ul>";
}

afficherListePrenoms($prenoms);
?>