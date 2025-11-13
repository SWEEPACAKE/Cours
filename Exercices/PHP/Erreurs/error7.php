<?php

$database = new mysqli('localhost', 'root', '', 'mediatheque');
mysqli_set_charset($database, "utf8mb4");

// Pour chaque acteur du film "Horizons perdus", afficher le nom de l'acteur mais également son rôle dans le film

$listeActeurs = $database->execute_query(
    "SELECT acteurs.nom_complet, role, titre 
    FROM acteurs 
    INNER JOIN casting_films cf ON cf.id_acteur = acteurs.id 
    INNER JOIN films ON cf.id_film = films.id 
    WHERE films.titre = \"Horizons perdus\""
)->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prépa ECF1</title>
</head>
<body>
    <h1><?= $listeActeurs[0]['titre'] ?></h1>
    Avec : 
    <ul>
        <?php
        // On prépare un tableau de voyelles puisque PHO ne le connaît pas
        $voyelles = ['a', 'e', 'i', 'o', 'u', 'y', 'h'];
        foreach($listeActeurs as $acteur) {
            // Ici on extrait la première lettre de la chaine de caractère "role"
            // Et on la passe en minuscule
            $premiereLettre = strtolower(substr($acteur['role'], 0, 1));
            // On se sert de in_array pour vérifier si le tableau de voyelles contient notre
            // Première lettre ou non, et on s'en sert pour déterminer le mot à mettre devant le rôle
            $determinant = in_array($premiereLettre, $voyelles) ? "d'" : "de ";
            ?>
            <li><?= $acteur['nom_complet'] ?> dans le rôle <?= $determinant . $acteur['role'] ?></li>
            <?php
        }
        ?>
    </ul>
</body>
</html>