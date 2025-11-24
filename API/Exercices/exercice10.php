<?php
// Appeler un fichier getLivres sur le site http://bibliotheque.loc pouvant retourner 
// - soit la liste de tous les livres
// - soit, si un id_auteur est précisé, seulement les livres de cet auteur

// $url = "http://bibliotheque.loc/getLivres.php";
$url = "http://bibliotheque.loc/getLivres.php?id_auteur=4";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$headers = array(
   'Authorization: SoHdG1uqdxxeU6OiRpf9AY3R8'
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$resultat = curl_exec($curl);
$resultatDecode = json_decode($resultat);
unset($curl);
echo "<ul>";
   foreach($resultatDecode as $livre) {
      echo "<li>" . $livre->titre . "</li>";
   }
echo "</ul>";
?>