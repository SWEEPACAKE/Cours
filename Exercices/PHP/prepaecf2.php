<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'mediatheque');
mysqli_set_charset($database, "utf8mb4");

// Lister, pour chaque utilisateur, la moyenne de ses notes. Il faut qu'on arrive à identifier les plus sévères >:)

$listeUsers = $database->execute_query("SELECT utilisateurs.pseudo, ROUND(AVG(note), 2) as moyenne
FROM evaluations 
INNER JOIN utilisateurs ON utilisateurs.id = evaluations.id_utilisateur 
GROUP BY utilisateurs.pseudo 
ORDER BY moyenne ASC;");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prépa ECF2</title>
</head>
<body>
    <ul>
        <?php
        foreach($listeUsers as $user) {
            echo "<li>" . $user['pseudo'] . " - " . $user['moyenne'] . "</li>";
        }
        ?>
    </ul>
</body>
</html>