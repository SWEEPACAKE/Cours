<?php
// Exercice : Traiter un tableau de données avec une fonction et une boucle

/*
Objectif :
Créer un tableau contenant plusieurs prénoms. 
Créer une fonction qui prend ce tableau en paramètre et affiche un message de bienvenue pour chaque prénom.

Étapes :
1. Crée un tableau $prenoms avec au moins 5 prénoms.
2. Reprendre la fonction de l'exercice précédent et l'adapter pour traiter tous les prénoms du tableau au lieu d'un seul.
3. Dans la fonction, utilise une boucle pour parcourir le tableau et afficher "Bienvenue, [prénom] !" pour chaque prénom.
4. Appelle la fonction avec ton tableau pour tester.
*/

// Ton code ici :
$eleves = array(
    "Dylan",
    "Emmanuel", 
    "Thomas", 
    "Carole",
    "Nadège", 
    "Hugo", 
    "Abdelazize"
);

function afficherBonjour($listePersonnes) {
    foreach($listePersonnes as $personne) {
        echo "Bonjour, " . $personne . "<br>";
    }
}

afficherBonjour($eleves);
?>