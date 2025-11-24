<?php

// Consigne : à partir de l'exercice 3, détecter l'évènement de changement
// D'une région pour faire un appel à l'API et remplir les options
// du select "departement" qui est à côté.

// Faire un var_dump() de $_POST une fois le formulaire envoyé

$curl = curl_init("https://geo.api.gouv.fr/regions");
curl_setopt($curl, CURLOPT_URL, "https://geo.api.gouv.fr/regions");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resultat = curl_exec($curl);
curl_close($curl);

$monTableauDeRegions = json_decode($resultat);
var_dump($_POST);
?>
<form action="" method="POST">
    <select name="region" id="region">
        <option value="">Choisissez une région</option>
        <?php
        foreach($monTableauDeRegions as $ligne) {
            echo "<option value ='". $ligne->code ."'>" . $ligne->nom . "</option>";
        }
        ?>
    </select>
    
    <select name="departement" id="departement">
        <option value="">Choisissez un département</option>
    </select>
    <button type="submit">Envoyer</button>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="module">
    $('#region').on('change', function() {
        var codeRegion = $('#region').val();
        $.ajax({
            method: 'GET',
            url: "https://geo.api.gouv.fr/regions/" + codeRegion + "/departements",
            success: function(response) {
                $(response).each(function(index, dpt) {
                    $('#departement').append("<option value='"+ dpt.code +"'>"+ dpt.nom +"</option>");
                });
            }
        });
    });
</script>