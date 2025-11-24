<?php

// Consigne : Appeler une URL vers un fichier test.php localisé sur un autre site et 
// Envoyer en POST des données vers ce fichier. 

// Sauf que cette fois on va gérer une authentification 
// Donc on va passer un token spécifique dans les headers de la requête

$url = "http://bibliotheque.loc/test3.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// Données

curl_setopt($curl, CURLOPT_POST, true);
$data = array("userid" => 1, "username" => "CocoJumbo");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Headers
$headers = array(
   "Content-Type: application/json",
   "Authorization: FuUKEGgGzIifArjDyAo4eYsRO"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$resultat = curl_exec($curl);
unset($curl);

$resultatDecode = json_decode($resultat);

var_dump($resultatDecode);