<?php

$database = new mysqli("localhost", "root", "", "spoteezer");
mysqli_set_charset($database, "utf8mb4");

$listeMorceaux = $database->execute_query(
    "SELECT m.* 
    FROM morceau m
    INNER JOIN contient c ON c.id_morceau = m.id 
    INNER JOIN playlist p ON p.id = c.id_playlist 
    WHERE p.nom = 'Focus mix'"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php 
        foreach($listeMorceaux as $morceau) {
            ?>
            <li><?= $morceau['titre'] ?></li>
            <?php
        }
        ?>
    </ul>
</body>
</html>