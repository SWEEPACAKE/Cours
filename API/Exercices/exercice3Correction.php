<?php

// Consigne : récupérer les régions depuis l'api https://geo.api.gouv.fr/regions
// Et les afficher dans un select de formulaire, en reprenant leur code. 
// Une fois le formulaire envoyé, 
// appeler l'endpoint https://geo.api.gouv.fr/regions/{code}/departements
// Pour récupérer les départements de la région sélectionnée

// Faire un var_dump() des départements;

$curl = curl_init("https://geo.api.gouv.fr/regions");
curl_setopt($curl, CURLOPT_URL, "https://geo.api.gouv.fr/regions");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resultat = curl_exec($curl);
curl_close($curl);

$monTableauDeResultats = json_decode($resultat);
if(!empty($_POST)) {
    $curl = curl_init("https://geo.api.gouv.fr/regions/" . $_POST['region'] . "/departements");
    curl_setopt($curl, CURLOPT_URL, "https://geo.api.gouv.fr/regions/" . $_POST['region'] . "/departements");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resultat = json_decode(curl_exec($curl));
    var_dump($resultat);
}
?>
<form action="" method="POST">
    <select name="region">
        <option value="">Choisissez une région</option>
        <?php
        foreach($monTableauDeResultats as $ligne) {
            echo "<option value ='". $ligne->code ."'>" . $ligne->nom . "</option>";
        }
        ?>
    </select>
    <button type="submit">Envoyer</button>
</form>