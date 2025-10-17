<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'spoteezer');
mysqli_set_charset($database, 'utf8mb4');

$artiste = $database->execute_query("SELECT * FROM artiste WHERE id = ?", array($_GET['id_artiste']))->fetch_assoc();

$listeMorceaux = $database->execute_query("SELECT m.titre 
FROM morceau m 
INNER JOIN composition comp ON comp.id_morceau = m.id 
WHERE comp.id_artiste = ?", array($_GET['id_artiste']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiste - <?= $artiste['libelle'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-primary text-white py-4">
    <div class="container">
        <h1 class="text-center mb-5"><?= $artiste['libelle'] ?></h1>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7">
                <?= $artiste['description'] ?>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <h2 class="text-end mb-3">Liste de morceaux</h2>
                <div class="list-group">
                    <?php
                    foreach($listeMorceaux as $morceau) {
                        ?>
                        <div class="list-group-item">
                            <?= $morceau['titre'] ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>