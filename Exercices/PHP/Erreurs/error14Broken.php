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
    </head>
    <body>
        <h1>Bienvenue sur la page !</h1>
        <p>Ceci est une liste de fruits</p>
        <ul>
            <?php
            foreach($arrayFruits as $cle => $fruit) {
            ?>
                <li>Fruit N° <?=  $index ?> : <?= $fruits ?></li>
            <?php
            }
            ?>
        </ul>
    </body>
</html>