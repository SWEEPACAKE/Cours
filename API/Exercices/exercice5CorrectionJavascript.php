<?php

// Consigne : à partir de l'exercice 4, détecter également l'évènement de changement
// D'un département pour faire un appel à l'API et remplir les options
// du select "commune" qui est à côté.

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
    <select name="commune" id="commune">
        <option value="">Choisissez une commune</option>
    </select>
    <button type="submit">Envoyer</button>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="module">
    document.getElementById('region').addEventListener('change', function() {
        var codeRegion = document.getElementById('region').value;
        fetch("https://geo.api.gouv.fr/regions/" + codeRegion + "/departements").then(response => {
            if (!response.ok) {
            throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            for (var i = 0; i < data.length; i++){
                document.getElementById('departement').innerHTML += "<option value='"+ data[i].code +"'>"+ data[i].nom +"</option>";
            }

        }).catch(error => {
            console.error('Error:', error);
        });
    });
    document.getElementById('departement').addEventListener('change', function() {
        var codeDepartement = document.getElementById('departement').value;
        fetch("https://geo.api.gouv.fr/departements/" + codeDepartement + "/communes").then(response => {
            if (!response.ok) {
            throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(data => {
            for (var i = 0; i < data.length; i++){
                document.getElementById('commune').innerHTML += "<option value='"+ data[i].code +"'>"+ data[i].nom +"</option>";
            }

        }).catch(error => {
            console.error('Error:', error);
        });
    });
</script>