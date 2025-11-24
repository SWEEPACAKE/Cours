<?php

// Consigne : récupérer les régions depuis l'api https://geo.api.gouv.fr/regions
// Et les afficher dans une liste <ul> / <li>

$curl = curl_init("https://geo.api.gouv.fr/regions");
curl_setopt($curl, CURLOPT_URL, "https://geo.api.gouv.fr/regions");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resultat = curl_exec($curl);
curl_close($curl);

$monTableauDeResultats = json_decode($resultat);
?>
<ul>
    <?php
    foreach($monTableauDeResultats as $ligne) {
        echo "<li>" . $ligne->nom . "</li>";
    }
    ?>
</ul>