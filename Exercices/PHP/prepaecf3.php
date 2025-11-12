<?php

/*
                                    Premièrement : 

Créez une base de données "boutique" dans PHPMyAdmin ou DBeaver, puis exécutez les requêtes suivantes : 

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL
);

INSERT INTO produits (nom, prix, stock) VALUES
('Ordinateur portable', 999.99, 10),
('Souris sans fil', 29.99, 50),
('Clavier mécanique', 89.99, 25),
('Écran 27"', 299.99, 15);

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    ville VARCHAR(100)
);

INSERT INTO clients (nom, email, ville) VALUES
('Dupont Alice', 'alice@example.com', 'Paris'),
('Martin Bob', 'bob@example.com', 'Lyon');



                                    Deuxièmement : 

Analysez l'exemple de requête préparée suivant : 
*/

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

/*

                                    Troisièmement

Indices
Utilisez une requête INSERT INTO pour remplir la table clients, avec trois "?" là où vont aller les paramètres
Utilisez bind_param() avec les bons types de données pour trois chaînes
Vous pouvez utiliser la propriété $stmt->affected_rows pour confirmer l'insertion
Bon courage !

*/

$database = new mysqli('localhost', 'root', '', 'boutique');
mysqli_set_charset($database, "utf8mb4");

// Données à insérer
$nom = "Jean Dupuis";
$email = "jean2@example.com";
$ville = "Marseille";

// TODO : Écrivez la requête préparée pour insérer un nouveau client
$stmt = $database->prepare("INSERT INTO clients (nom, email, ville) VALUES (?, ?, ?)"); // Complétez la requête

// TODO : Associez les paramètres
$stmt->bind_param("sss", $nom, $email, $ville);
// TODO : Exécutez la requête
$stmt->execute();
// TODO : Vérifiez si l'insertion a réussi
echo $stmt->affected_rows;
// TODO : Fermez la requête
$stmt->close();
?>