<?php
$arrayDonnees = array(
    "Pomme", // O
    "Banane", // 1
    "Kiwi",  // 2
    "Ananas", // 3
    "Poire", // 4
    "Litchi", // 5
    "Fraise", // 6
    "Framboise", // 7 
    "Myrtille" // 8
);
function afficherListeFruits($listeFruits) {
    ob_start();
    ?>
    <ul>
        <?php
        foreach($listeFruits as $fruit) {
            // Il y a un bout de code à écrire ici aussi
            echo "<li>" . $fruit . "</li>";
        }
        ?>
    </ul>
    <?php
    $liste = ob_get_clean();
    return $liste;
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
        <p>Ceci est une liste de fruits</p>


        <!-- VOTRE CODE ENTRE ICI  -->
        <?= afficherListeFruits($arrayDonnees) ?>

        <!-- ET LÀ -->



        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>