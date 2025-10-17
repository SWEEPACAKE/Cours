<?php

$database = new mysqli('192.168.56.56', 'homestead', 'secret', 'spoteezer');
mysqli_set_charset($database, 'utf8mb4');

$listeArtistes = $database->execute_query("SELECT a.* 
FROM artiste a ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-primary text-white py-4">
    <div class="container">
        <h1 class="text-center mb-5">Debug 1</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <?php 
                foreach($listeArtistes as $artiste) {
                    ?>
                    <div class="artiste my-3">
                        <?= $artiste['libelle'] ?> 
                        <button type="button" class="btn btn-success afficherMorceaux" data-artiste="<?= $artiste['id'] ?>">
                            Lister les morceaux
                        </button>
                        <div class="d-block listeMorceaux" id="listeMorceauxDeLArtiste_<?= $artiste['id'] ?>">

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '.afficherMorceaux', function() {
            var id_artiste_clique = $(this).data('artiste');
            $.ajax({
                method: 'POST',
                url: 'debug1.ajax.php',
                data: { id_artiste: id_artiste_clique },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#listeMorceauxDeLArtiste_' + id_artiste_clique).html(data)
                }
            });
        });
    </script>
</body>
</html>