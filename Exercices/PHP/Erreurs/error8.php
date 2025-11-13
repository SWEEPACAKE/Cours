<?php 

$database = new mysqli('localhost', 'root', '', 'boutique');
mysqli_set_charset($database, "utf8mb4");

// Exemple de requête préparée pour rechercher un produit par son nom
$parametre = "Souris%"; // Recherche tous les produits commençant par "Souris"

// Préparation de la requête
$stmt = $database->prepare("SELECT nom, prix, stock 
    FROM produits 
    WHERE nom LIKE ?");

// Assignation des paramètres : Un point d'interrogation est égal à un paramètre
$stmt->bind_param("s", $parametre);
// Exécution de la requête préparée
$stmt->execute();
// Et récupération des résultat avec la fonction get_result() sur le statement
$resultat = $stmt->get_result();
foreach($resultat as $ligne) {
    echo "Produit : " . $ligne['nom'] . " - Prix : " . $ligne['prix'] . "€<br>";
}
// On ferme la connexion à la base une fois la requête exécutée (Securité supplémentaire mais pas forcément nécessaire)
$stmt->close();