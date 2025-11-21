<?php

// Consigne : récupérer les régions depuis l'api https://geo.api.gouv.fr/regions
// Et les afficher dans un select de formulaire, en reprenant leur code

$monCurl = curl_init("https://geo.api.gouv.fr/regions");
curl_setopt($monCurl, CURLOPT_URL, "https://geo.api.gouv.fr/regions");
curl_setopt($monCurl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($monCurl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($monCurl, CURLOPT_SSL_VERIFYPEER, false);

$resultat = json_decode(curl_exec($monCurl));
unset($monCurl);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2</title>
</head>
<body>
    <form method="POST" action="">
        <select name="region">
            <option value="">Choisissez une région</option>
            <?php
            foreach($resultat as $region) {
                ?>
                <option value="<?= $region->code ?>"><?= $region->nom ?></option>
                <?php
            }
            ?>
        </select>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>