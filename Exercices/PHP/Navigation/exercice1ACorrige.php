<?php

$tableau = array(
    "1" => "Tracteur tondeuse", 
    "2" => "Débrouissailleuse", 
    "3" => "Coupe-branches", 
    "4" => "Taille-haies"
);

// Consignes : Prendre ce tableau d'outils de jardinnage et utiliser une boucle pour générer
// Une liste de balises A. 

// Ces balises vont renvoyer vers la page /navigation/exercice1B.php 
// Et dans le fichier exercice1B, vous allez devoir afficher seulement l'outil qui a été cliqué

?>
<ul>
    <?php
    foreach($tableau as $key => $value) {
        ?>
        <li>
            <a href="exercice1B.php?id_outil=<?= $key ?>">
                <?= $value ?>
            </a>
        </li>
        <?php
    }
    ?>
</ul>