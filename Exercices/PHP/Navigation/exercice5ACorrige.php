<?php
$database = new mysqli("localhost", "root", "", "subway");
mysqli_set_charset($database, "utf8mb4");

$users = $database->execute_query("SELECT * FROM utilisateur");

// Consigne : Préparer un formulaire contenant un select de tous les utilisateurs. 
// L'action du formulaire sera l'exercice 5B, et sa méthode POST. 
// On va se servir de l'envoi du formulaire pour passer l'id_utilisateur à 5B, mais cette fois en POST

?>
<form method="POST" action="exercice5B.php">
    <select name="id_utilisateur">
        <option value="">Choisissez un utilisateur</option>
        <?php
        foreach($users as $user) {
            ?>
            <option value="<?= $user['id'] ?>"><?= $user['nom'] ?> <?= $user['prenom'] ?></option>
            <?php
        }
        ?>
    </select>
    <button type="submit">Envoyer</button>
</form>