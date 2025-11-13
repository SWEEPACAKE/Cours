<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    echo "<p>Nom complet : " . $prenom . " " . $nom . "</p>";
    echo "<p>Âge : " . $_POST['age'] . "</p>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Formulaire de test (avec erreurs)</title>
</head>
<body>
    <h1>Formulaire de test</h1>
    <form method="POST" action="error12.php">
        <label>Nom : <input type="text" name="nom" /></label><br>
        <label>Prénom : <input type="text" name="prenom" /></label><br>
        <label>Âge : <input type="number" name="age" /></label><br>
        <!-- Note : il n'y a PAS de champ 'prenom', c'est volontaire -->
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>