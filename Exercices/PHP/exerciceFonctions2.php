<?php
// CONSIGNE : Utiliser une fonction que vous allez devoir créer pour afficher la date au bon format

$user = array(
    "pseudonyme" => "Pancake", 
    "email" => "pancake@boulangerie.net", 
    "date_inscription" => "2022-10-06"
);

function FORMAT_DATE($date_a_formatter) {
    return implode('/', array_reverse(explode('-', $date_a_formatter)));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ma liste de fruits</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">  
    </head>
    <body>
        <h1>Bienvenue sur la page !</h1>
        <p>Ceci n'est pas une liste de fruits, mais un profil utilisateur</p>


        <!-- VOTRE CODE ENTRE ICI  -->
        Utilisateur : <?= $user['pseudonyme'] ?><br>
        E-mail : <?= $user['email'] ?><br>
        Date d'inscription : <?= FORMAT_DATE($user['date_inscription']) ?><br>

        <!-- ET LÀ -->



        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>