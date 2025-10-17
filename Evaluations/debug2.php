<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'spoteezer');
mysqli_set_charset($database, 'utf8mb4');

$listeMorceaux = $database->execute_query("SELECT a.libelle as artiste, m.titre 
FROM morceau m 
INNER JOIN composition comp ON comp.id_morceau = m.id 
INNER JOIN artiste a ON comp.id_artiste = a.id 
ORDER BY duree_en_secondes");



function FORMAT_TIME($temps_en_secondes) {
    sprintf('%02d:%02d', floor($temps_en_secondes/60)%60, $temps_en_secondes%60);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-primary text-white py-4">
    <div class="container">
        <h1 class="text-center mb-5">Debug 2</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <?php 
                foreach($listeMorceaux as $morceau) {
                    ?>
                    <div class="artiste my-3">
                        <?= $morceau['libelle'] ?> - <?= $morceau['titre'] ?> : <?= FORMAT_TIME($morceau['duree_en_secondes']) ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>