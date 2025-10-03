<?php
// Utiliser une requête SQL pour retrouver l'artiste et le morceau de Rock le plus court
$database = new mysqli("localhost", "root", "", "spoteezer");
mysqli_set_charset($database, "utf8mb4");

$monMorceau = $database->execute_query(
    "SELECT a.libelle, m.titre 
    FROM morceau m
    INNER JOIN genre g ON m.id_genre = g.id 
    INNER JOIN composition c ON c.id_morceau = m.id 
    INNER JOIN artiste a ON c.id_artiste = a.id 
    WHERE g.libelle = 'Rock' 
    ORDER BY duree_en_secondes ASC 
    LIMIT 1"
)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Afficher le résultat de cette requête dans une balise <p> ici -->
    <p><?= $monMorceau['libelle'] ?> - <?= $monMorceau['titre'] ?></p>
</body>
</html>