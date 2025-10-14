<?php
$database = new mysqli("localhost", "root", "", "subway");
mysqli_set_charset($database, "utf8mb4");



// Consignes : En récupérant l'id de l'utilisateur passé par le formulaire du 5A, lister toutes les commandes de l'utilisateur en question, les ranger par date, afficher le total et la date formatée
$commandes = $database->execute_query("SELECT * 
FROM commande 
WHERE id_utilisateur = ? 
ORDER BY date_commande", array($_POST['id_utilisateur']));
echo "<ul>";
foreach($commandes as $commande) {
    $date_convertie = new DateTime($commande['date_commande']);
    // $date_convertie2 = date("d/m/Y à H:i", strtotime($commande['date_commande']));
    ?>
    <li>
        Commande de <?= $commande['total'] ?> €, passée le <?= $date_convertie->format('d/m/Y à H:i') ?>
    </li>
    <?php
}
echo "</ul>";