<?php

$database = new mysqli('localhost', 'root', '', 'boutique');
mysqli_set_charset($database, "utf8mb4");

// ============================================================
// EXEMPLE 1 : Bon typage (fonctionne correctement)
// ============================================================
echo "<h2>✓ Exemple 1 : Insertion correcte avec bon typage</h2>";

$nom = NULL;
$prix = 79.99;      // float/decimal
$stock = 15;        // int

$stmt = $database->prepare("INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)");

// Typage correct : "sdi" = string, decimal, integer
$stmt->bind_param("sdi", $nom, $prix, $stock);

if ($stmt->execute()) {
    echo "✓ Insertion réussie<br>";
    echo "Lignes affectées : " . $stmt->affected_rows . "<br>";
} else {
    echo "✗ Erreur d'exécution : " . $stmt->error . "<br>";
}

$stmt->close();
