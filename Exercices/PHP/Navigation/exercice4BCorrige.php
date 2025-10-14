<?php
$database = new mysqli("localhost", "root", "", "subway");
mysqli_set_charset($database, "utf8mb4");

// Consignes : Executer une requête qui retourne tous les utilisateurs de la base "subway"
// Pour chaque utilisateur, générer un lien qui va renvoyer vers la page "exercice4B.php"
// En passant l'id de l'utilisateur

// Sur la page exercice4B.php, utiliser l'id de l'utilisateur passé en paramètres 
// Pour afficher la liste de toutes ses recettes
$recettes = $database->execute_query("SELECT * 
FROM recette 
WHERE id_utilisateur = ?", array($_GET['id_utilisateur']));

echo "<ul>";
foreach($recettes as $recette) {
    ?>
    <li><?= $recette['nom'] ?></li>
    <?php
}
echo "</ul>";