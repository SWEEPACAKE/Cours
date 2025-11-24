<?php 

// Prévoir un formulaire permettant de saisir un code postal
// Puis se servir de ce code postal pour rechercher sur l'endpoint suivant : 
// "https://geo.api.gouv.fr/communes?codePostal={CodePostal}";

// Une fois la requête cURL exécutée, lister toutes les communes dans un <ul> / <li>
if(!empty($_POST)) {
    $url = "https://geo.api.gouv.fr/communes?codePostal=" . $_POST['codePostal'];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    unset($curl);
    $listeCommunes = json_decode($response);
    echo "<ul>";
    foreach($listeCommunes as $commune) {
        ?>
        <li><?= $commune->nom ?></li>
        <?php
    }
    echo "</ul>";
}
?>
<form method="POST" action="">
    <input type="text" name="codePostal" placeholder="Code Postal"/>
    <button type="submit">Envoyer</button>
</form>
