<?php

$tableau = array(
    "1" => array(
        "pseudonyme" => "Pancake", 
        "email" => "pancake@boulangerie.net", 
        "date_inscription" => "2022-10-06",
        "date_naissance" => "1997-05-07"
    ), 
    "2" => array(
        "pseudonyme" => "Waffle", 
        "email" => "waffle@boulangerie.net", 
        "date_inscription" => "2022-05-14",
        "date_naissance" => "1998-06-04"
    ), 
    "3" => array(
        "pseudonyme" => "Brioche", 
        "email" => "brioche@boulangerie.net", 
        "date_inscription" => "2021-02-16",
        "date_naissance" => "2002-04-05"
    ), 
    "4" => array(
        "pseudonyme" => "Macaron", 
        "email" => "macaron@boulangerie.net", 
        "date_inscription" => "2024-03-26",
        "date_naissance" => "2007-10-08"
    )
);

// Consignes : Prendre ce tableau d'utilisateurs et générer des balises <a> 
// Dans chaque lien, on va vouloir passer non seulement l'id de l'utilisateur mais également la donnée à afficher. Il faudra donc afficher 4 lien par utilisateurs : un par champ
// Par exemple : je veux un lien qui m'affiche la donnée "Date_naissance" de l'utilisateur 3
// Exemple : 
//<a href="exercice3B.php?id_user=3&champ=date_naissance"></a>

// Ces balises vont renvoyer vers la page /navigation/exercice3B.php 
// Et dans le fichier exercice3B, vous allez devoir afficher la donnée choisie de l'utilisateur qui a été cliqué
echo "<ul>";
foreach($tableau as $key => $user) {
    foreach($user as $champ => $valeur) {
        ?>
        <li>
            <a href="exercice3B.php?id_user=<?= $key ?>&champ=<?= $champ ?>">
                Champ <?= $champ ?> de l'utilisateur N°<?= $key ?>
            </a>
        </li>
        <?php
    }
    echo "<br>";
}
echo "</ul>";