<?php
$database = new mysqli("localhost", "root", "", "subway");
mysqli_set_charset($database, "utf8mb4");

$users = $database->execute_query("SELECT * FROM utilisateur");
// var_dump($users);
// $users = $database->execute_query("SELECT * FROM utilisateur")->fetch_all(MYSQLI_ASSOC);
// var_dump($users);

// Consignes : Executer une requête qui retourne tous les utilisateurs de la base "subway"
// Pour chaque utilisateur, générer un lien qui va renvoyer vers la page "exercice4B.php"
// En passant l'id de l'utilisateur

// Sur la page exercice4B.php, utiliser l'id de l'utilisateur passé en paramètres 
// Pour afficher la liste de toutes ses recettes
echo "<ul>";
foreach($users as $utilisateur) {
    ?>
    <li>
        <a href="exercice4B.php?id_utilisateur=<?= $utilisateur['id'] ?>">
            <?= $utilisateur['prenom'] ?> <?= $utilisateur['nom'] ?>
        </a>
    </li>
    <?php
}
echo "</ul>";

// "exercice4B.php?id_utilisateur=1"