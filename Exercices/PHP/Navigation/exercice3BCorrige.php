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

// Ici on récupère l'id qui a été passé depuis l'exercice 2A et on s'en sert pour afficher le pseudonyme et l'email de l'utilisateur qui a été cliqué
$id = $_GET['id_user'];
$champ = $_GET['champ'];
echo $tableau[$id][$champ];