<?php
// Utiliser une requête SQL pour lister tous les artistes par ordre croissant de leur année de début de carrière. Je veux voir quel âge a le groupe
$database = new mysqli("localhost", "root", "", "spoteezer");
mysqli_set_charset($database, "utf8mb4");

$artistes = $database->execute_query("SELECT * FROM artiste ORDER BY annee_debut");
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
    foreach($artistes as $artiste) {
        ?>
        <p><?= $artiste['libelle'] ?> - <?= $artiste['annee_debut'] ?>, soit <?= date('Y') - $artiste['annee_debut'] ?> années de carrière</p>
        <?php
    }
    ?>
</body>
</html>