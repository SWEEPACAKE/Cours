<?php

// Consigne : Appeler une URL vers un fichier test.php localisé sur un autre site et 
// Récupérer le contenu de ce fichier qui devra être json_encodé
$curl = curl_init("http://bibliotheque.loc/test.php");
curl_setopt($curl, CURLOPT_URL, "http://bibliotheque.loc/test.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resultat = curl_exec($curl);
curl_close($curl);

$maReponse = json_decode($resultat);

var_dump($maReponse);