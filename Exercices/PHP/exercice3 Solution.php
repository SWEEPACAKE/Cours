<?php
// Utiliser une requête SQL pour lister tous les artistes en fonction du nombre de morceaux qu'ils ont dans la base, et les ranger du plus grand nombre au plus petit
$database = new mysqli("localhost", "root", "", "spoteezer");
mysqli_set_charset($database, "utf8mb4");

$mesMorceaux = $database->execute_query(
    "SELECT a.libelle, COUNT(m.titre) as nbMorceaux
    FROM morceau m
    INNER JOIN composition c ON c.id_morceau = m.id 
    INNER JOIN artiste a ON c.id_artiste = a.id 
    GROUP BY a.libelle 
    ORDER BY nbMorceaux DESC "
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
    <!-- Afficher le résultat de cette requête dans plusieurs balises<p> ici -->
    <?php
    foreach($mesMorceaux as $morceau) {
        ?>
        <p><?= $morceau['libelle'] ?> - <?= $morceau['nbMorceaux'] ?></p>
        <?php
    }
    ?>
</body>
</html>