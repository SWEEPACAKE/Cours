<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'spoteezer');
mysqli_set_charset($database, 'utf8mb4');

$listeMorceaux = $database->execute_query("SELECT a.libelle, m.titre 
FROM morceau m 
INNER JOIN contient c ON c.id_morceau = m.id 
INNER JOIN composition comp ON comp.id_morceau = m.id 
INNER JOIN artiste a ON a.id = comp.id_artiste 
WHERE c.id_playlist = ?", array($_GET['id_playlist']));

echo "<ul>";
foreach($listeMorceaux as $row) {
    echo "<li>" . $row['libelle'] . " - " . $row['titre'];
}
echo "</ul>";