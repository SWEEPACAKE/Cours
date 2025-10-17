<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'spoteezer');
// $database = new mysqli('localhost', 'root', '', 'spoteezer');
mysqli_set_charset($database, 'utf8mb4');

$listeMorceaux = $database->execute_query("SELECT m.titre 
FROM morceau m 
INNER JOIN composition comp ON comp.id_morceau = m.id 
WHERE comp.id_artiste = ?", array($_POST['id_artiste']));

ob_start();
?>
<ul>
    <?php
    foreach($listeMorceaux as $morceau) {
        ?>
        <li><?= $morceau['libelle'] ?></li>
    <?php
    }
    ?>
</ul>
<?php

echo json_encode(ob_get_clean());