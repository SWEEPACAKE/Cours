<?php
if (isset($_GET['query'])) {
    echoBonjour($_GET['query']);
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Recherche (GET) - Formulaire avec erreurs</title>
    </head>
    <body>
        <h1>Recherche (GET)</h1>
        <form method="get" action="">
            <!-- Le champ s'appelle 'q' mais le code lit 'query' --> 
            <label>Terme : <input type="text" name="query" /></label><br>
            <!-- 'page' est volontairement omis pour provoquer une notice si non fourni -->
            <button type="submit">Rechercher</button>
        </form>
    </body>
</html>