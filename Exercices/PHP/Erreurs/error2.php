<?php
$database = new mysqli('localhost', 'root', '', 'club_sport');
mysqli_set_charset($database, "utf8mb4");

// Récupère les inscriptions actives avec infos adhérent et cours
$resultat = $database->execute_query("
    SELECT i.id AS inscription_id,
           ad.nom AS adherent,
           ad.email,
           act.nom AS activite,
           c.jour_semaine,
           c.heure_debut,
           c.id AS cours_id
    FROM inscriptions i
    JOIN adherents ad ON ad.id = i.adherent_id
    JOIN cours c ON c.id = i.cours_id
    JOIN activites act ON act.id = c.activite_id
    WHERE i.date_fin IS NULL
    ORDER BY act.nom, FIELD(c.jour_semaine,'lundi','mardi','mercredi','jeudi','vendredi','samedi'), c.heure_debut
");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscriptions actives</title>
    <style>
        table { border-collapse: collapse; width: 100%; max-width: 900px; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h1 style="text-align:center">Inscriptions actives</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Adhérent</th>
            <th>Email</th>
            <th>Activité</th>
            <th>Jour</th>
            <th>Heure</th>
            <th>Cours ID</th>
        </tr>
    <?php foreach ($resultat as $row): ?>
        <tr>
            <td><?= $row['inscription_id'] ?></td>
            <td><?= $row['adherent'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['activite'] ?></td>
            <td><?= $row['jour_semaine'] ?></td>
            <td><?= $row['heure_debut'] ?></td>
            <td><?= $row['cours_id'] ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
<?php $database->close(); ?>