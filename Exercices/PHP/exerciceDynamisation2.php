<?php
$arrayDonnees = array(
    "Agrumes" => array(
        "Pamplemousse", 
        "Orange",
        "Mandarine"
    ),
    "Fruits rouges" => array(
        "Framboise", 
        "Fraise", 
        "Mûre"
    ) 
);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ma liste de fruits</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">  
    </head>
    <body>
        <div class="container">
            <h1>Bienvenue sur la page !</h1>
            <p>Ceci est une liste de fruits</p>
            
            <div class="row">
                <?php
                foreach($arrayDonnees as $familleFruit => $arrayFruits) {
                    ?>
                    <div class="col-12 col-md-6">
                        <h4><?= $familleFruit ?></h4>
                        <ul>
                            <?php
                            foreach($arrayFruits as $fruit) {
                                ?>
                                <li><?= $fruit ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>