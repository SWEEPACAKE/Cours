<?php
// Utiliser une requête SQL pour lister tous les utilisateurs et leur date de naissance au format JJ/MM/YYYY du plus vieux au plus jeune
$database = new mysqli("localhost", "root", "", "spoteezer");
mysqli_set_charset($database, "utf8mb4");

$utilisateurs = $database->execute_query("SELECT * FROM utilisateur ORDER BY date_naissance");
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
    foreach($utilisateurs as $user) {
        ?>
        <p><?= $user['pseudonyme'] ?> - <?= implode("/", array_reverse(explode("-", $user['date_naissance']))) ?></p>
        <?php
    }
    ?>
</body>
</html>