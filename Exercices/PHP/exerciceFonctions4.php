<?php
// Exercice : Faire plusieurs appels de la même fonction avec un pramaètre différent

/*
Objectif :
Créer une fonction qui prend en paramètre un prénom et affiche un message de bienvenue personnalisé.

Étapes :
1. Crée une fonction appelée direBonjour qui prend un paramètre $prenom.
2. La fonction doit afficher : "Bonjour, [prénom] !" (remplace [prénom] par la valeur du paramètre).
3. Appelle la fonction plusieurs fois avec différents prénoms pour tester.
*/

// Ton code ici :
function direBonjour($personne) {
    $monTexte = "Bonjour, " . $personne . "<br>";
    return $monTexte;
}

echo direBonjour("Emmanuel");
echo direBonjour("Carole");
echo direBonjour("Hugo");
echo direBonjour("Thomas");
echo direBonjour("Nadège");
echo direBonjour("Dylan");