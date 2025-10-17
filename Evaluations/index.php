<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'spoteezer');
mysqli_set_charset($database, 'utf8mb4');

$artistes = $database->execute_query("SELECT * FROM artiste");
$playlists = $database->execute_query("SELECT * FROM playlist");

function countArtistes($listeArtistes) {
    $i = 0;
    foreach($listeArtistes as $artiste) {
        $i++;
    }
    return $i;
}
function countMorceaux($database, $id_playlist) {
    $listeMorceaux = $database->execute_query("SELECT COUNT(*) as nbMorceaux
    FROM morceau 
    INNER JOIN contient ON contient.id_morceau = morceau.id 
    WHERE contient.id_playlist = ?", array($id_playlist))->fetch_assoc();
    return $listeMorceaux['nbMorceaux'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spoteezer - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-primary text-white py-4">
    <div class="container">
        <h1 class="text-center mb-5">Spoteezer</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="mb-3">Artistes</h2>
                <ul>
                    <?php
                    foreach($artistes as $artiste) {
                        ?>
                        <li>
                            <a class="text-white" href="/artiste.php?id_artiste=<?= $artiste['id'] ?>">
                                <?= $artiste['libelle'] ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <p>Nombre d'artistes : <?= countArtistes($artistes); ?></p>
            </div>
            <div class="col-12 col-md-6">
                <h2 class="mb-3">Playlists</h2>
                <ul>
                    <?php
                    foreach($playlists as $playlist) {
                        ?>
                        <li>
                            <a class="text-white" href="/playlist.php?id_playlist=<?= $playlist['id'] ?>">
                                <?= $playlist['nom'] ?> (<?= countMorceaux($database, $playlist['id']) ?> morceaux)
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>