<?php 
if(empty($_POST)) {
    echo "Voici votre texte : " . $_POST['monTexte'] . "<br>";
}
?>
<form action="error11Broken.php" method="POST">
    <input type="text" name="monTexte"/>
    <button type="submit">Envoyer</button>
</form>