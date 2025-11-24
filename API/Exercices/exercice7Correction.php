<?php

// Consigne : Appeler une URL vers un fichier test2.php localisé sur un autre site et 
// Envoyer en POST des données vers ce fichier. 

// On va s'assurer que le fichier récupère bien les données en POST en faisant un echo json_encode de $_POST

$curl = curl_init("http://bibliotheque.loc/test2.php");
curl_setopt($curl, CURLOPT_URL, "http://bibliotheque.loc/test2.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


curl_setopt($curl, CURLOPT_POST, true);
$data = array("userid" => 1, "username" => "CocoJumbo");

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);


//Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resultat = curl_exec($curl);
curl_close($curl);

$maReponse = json_decode($resultat);

var_dump($maReponse);