<?php
// CONSIGNE : Créer une fonction qui prend en paramètre la liste des utilisateurs 
// Et génère leur petite carte de profil comprenant leur pseudonyme, leur email, et leur date formatée jj/mm/aaaa

$users = array(
    array(
        "pseudonyme" => "Pancake", 
        "email" => "pancake@boulangerie.net", 
        "date_inscription" => "2022-10-06"
    ), 
    array(
        "pseudonyme" => "Waffle", 
        "email" => "waffle@boulangerie.net", 
        "date_inscription" => "2022-05-14"
    ), 
    array(
        "pseudonyme" => "Brioche", 
        "email" => "brioche@boulangerie.net", 
        "date_inscription" => "2021-02-16"
    ), 
    array(
        "pseudonyme" => "Macaron", 
        "email" => "macaron@boulangerie.net", 
        "date_inscription" => "2024-03-26"
    ), 
);

function FORMAT_DATE($date_a_formatter) {
    return implode('/', array_reverse(explode('-', $date_a_formatter)));
}

function GENERER_CARTES_UTILISATEURS($listeUtilisateurs) {
    ob_start();
    foreach($listeUtilisateurs as $user) {
        ?>
        <!-- Exemple de carte de profil :  -->
        <div class="card p-4 d-inline-block">
            Utilisateur : <?= $user['pseudonyme'] ?><br>
            E-mail : <?= $user['email'] ?><br>
            Date d'inscription : <?= FORMAT_DATE($user['date_inscription']) ?><br>
        </div>
        <?php
    }
    $cartes = ob_get_clean();
    return $cartes;
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
        <div class="container">
            <h1>Bienvenue sur la page !</h1>
            <p>Ceci n'est pas une liste de fruits, mais un profil utilisateur</p>


            <!-- VOTRE CODE ENTRE ICI  -->
            <?php
            echo GENERER_CARTES_UTILISATEURS($users);
            ?>

            <!-- ET LÀ -->
        </div>




        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>