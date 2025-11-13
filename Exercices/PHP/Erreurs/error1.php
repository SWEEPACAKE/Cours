<?php
$database = new mysqli('localhost', 'root', '', 'club_sport');
mysqli_set_charset($database, "utf8mb4");

// Récupère les cours et le nombre d'inscrits actifs
$resultat = $database->execute_query("
    SELECT c.id, a.nom AS activite, c.jour_semaine, c.heure_debut, c.places_max,
      (SELECT COUNT(*) FROM inscriptions i WHERE i.cours_id = c.id AND i.date_fin IS NULL) AS inscrits
    FROM cours c
    JOIN activites a ON a.id = c.activite_id
    ORDER BY FIELD(c.jour_semaine, 'lundi','mardi','mercredi','jeudi','vendredi','samedi'), c.heure_debut
");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error 1</title>
    </head>
    <body>
        <table border="1" cellpadding="6">
            <tr>
                <th>ID</th>
                <th>Activité</th>
                <th>Jour</th>
                <th>Heure</th>
                <th>Places</th>
                <th>Inscrits</th>
            </tr>
    <?php
    foreach ($resultat as $row) {
        ?>
        <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['activite'] ?></td>
        <td><?= $row['jour_semaine'] ?></td>
        <td><?= $row['heure_debut'] ?></td>
        <td><?= $row['places_max'] ?></td>
        <td><?= $row['inscrits'] ?></td>
        </tr>
        <?php
    }
    ?>
        </table>
    </body>
</html>