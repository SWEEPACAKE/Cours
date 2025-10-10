<?php
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

function getEmailUser($monUser) {
    return $monUser['email'];
}

foreach($users as $user) {
    echo $user['pseudonyme'] . " : ";
    echo getEmailUser($user) . "<br>";
}