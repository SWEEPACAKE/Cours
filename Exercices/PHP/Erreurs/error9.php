<?php 

$database = new mysqli('localhost', 'root', '', 'boutique');
mysqli_set_charset($database, "utf8mb4");
// TODO : Écrivez la requête préparée pour insérer un nouveau client
$stmt = $database->prepare("INSERT INTO clients (nom, email, ville) VALUES (?, ?, ?)"); // Complétez la requête

$nom = "Michel";
$email = "micddddhmich@michel.michel";
$ville = "Michigan";
// TODO : Associez les paramètres
$stmt->bind_param("sss", $nom, $email, $ville);
// TODO : Exécutez la requête
$stmt->execute();
// TODO : Vérifiez si l'insertion a réussi
echo $stmt->affected_rows;
// TODO : Fermez la requête
$stmt->close();