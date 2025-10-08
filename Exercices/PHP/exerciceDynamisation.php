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
        <ul>
            <?php
            foreach($arrayDonnees as $fruit) {
            ?>
                <li><?= $fruit ?></li>
            <?php
            }
            ?>
            <!-- <li><?= $arrayDonnees[0] ?></li>
            <li><?= $arrayDonnees[5] ?></li>
            <li><?= $arrayDonnees[8] ?></li>
            <li><?= $arrayDonnees[6] ?></li>
            <li><?= $arrayDonnees[7] ?></li>
            <li><?= $arrayDonnees[2] ?></li>
            <li><?= $arrayDonnees[1] ?></li>
            <li><?= $arrayDonnees[4] ?></li>
            <li><?= $arrayDonnees[3] ?></li> -->
        </ul>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>