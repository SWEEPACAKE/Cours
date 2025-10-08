<?php
// Exercice : Traiter un tableau associatif avec une fonction
$users = array(
    array(
        "pseudonyme" => "Pancake", 
        "email" => "pancake@boulangerie.net", 
        "date_inscription" => "2022-10-06",
        "date_naissance" => "1997-05-07"
    ), 
    array(
        "pseudonyme" => "Waffle", 
        "email" => "waffle@boulangerie.net", 
        "date_inscription" => "2022-05-14",
        "date_naissance" => "1998-06-04"
    ), 
    array(
        "pseudonyme" => "Brioche", 
        "email" => "brioche@boulangerie.net", 
        "date_inscription" => "2021-02-16",
        "date_naissance" => "2002-04-05"
    ), 
    array(
        "pseudonyme" => "Macaron", 
        "email" => "macaron@boulangerie.net", 
        "date_inscription" => "2024-03-26",
        "date_naissance" => "2007-10-08"
    ), 
);
/*
Objectif :
Créer une fonction qui prend ce tableau en paramètre et affiche pour chaque personne : "[prénom] a [âge] ans."

Étapes :
1. Crée une fonction afficherInfos qui prend le tableau en paramètre.
2. Dans la fonction, utilise une boucle pour parcourir le tableau et afficher les infos pour chaque personne.
3. Appelle la fonction avec ton tableau pour tester.
4. BONUS : Afficher un message si c'est l'anniversaire de la personne en question :) 
*/

// Ton code ici :
function afficherInfos($listePersonnes) {
    foreach($listePersonnes as $personne) {
    
        // SOLUTION NICO
        $annee_naissance = date('Y', strtotime($personne['date_naissance']));
        $age = date('Y') - $annee_naissance;
        echo $personne['pseudonyme'] . " a " . $age . " ans. <br>";
        if(date('m-d') == date('m-d', strtotime($personne['date_naissance']))) {
            echo "Joyeux anniversaire !<br>";
        }

        // SOLUTION HUGO 
        // $dateNaissance = new DateTime($personne['date_naissance']);
        // $aujourdhui = new DateTime();
        // $age = $aujourdhui->diff($dateNaissance)->y;
        // echo $personne['pseudonyme'] . " a " . $age . " ans. ";
        // if($dateNaissance->format('m-d') === $aujourdhui->format('m-d')) {
        //     echo "Joyeux anniversaire !<br>";
        // }
        // echo "<br><br>";
    }
}

afficherInfos($users);
?>