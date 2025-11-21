<?php

// Consigne : récupérer les régions depuis l'api https://geo.api.gouv.fr/regions
// Et les afficher dans une liste <ul> / <li>


    // On définit l'URL de destination
$url = "https://geo.api.gouv.fr/regions";
// On initialise l'appel cURL
$curl = curl_init($url);
// On définit deux options : l'URL à appeler et si on veut une valeur de retour
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// En local seulement, on ne vérifie pas les 
// Certificats 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// On exécute puis on récupère le fruit de cette exécution dans $resultat
$resultat = curl_exec($curl);
// On détruit notre objet CurlHandle
unset($curl);
$resultatDecode = json_decode($resultat);

echo "<ul>";
foreach($resultatDecode as $region) {
    echo "<li>" . $region->code . " - " . $region->nom . "</li>"; 
}
echo "</ul>";