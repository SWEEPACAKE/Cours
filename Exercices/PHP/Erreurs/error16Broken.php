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
function formatDate($date_a_formatter) {
    $nouvelleDate = new DateTime($date_a_formatter);
    return $nouvelleDate->format('d/m/Y');
}

function genererCarteDeVisite($monUser) {
    ob_start();
    ?>
    <div style="display: inline-block; border: 2px solid #333; border-radius: 5px; padding: 15px;">
        Pseudonyme : <?= $monUser['pseudonymes'] ?><br>
        E-mail : <?= $monUser['email'] ?><br>
        Date de naissance : <?= formatDate($monUser['date_de_naissance']) ?><br>
        Date d'inscription : <?= formatDate($monUser['date_inscription']) ?>
    </div>
    <?php
    $maCarte = ob_get_clean();
    return $maCarte;
}

foreach($users as $user) {
    echo genererCarteDeVisite($users);
}