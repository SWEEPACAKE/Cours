<?php
/*

                Premièrement

Créez une base de données mediatheque_v2
et importez les tables et les données suivantes : 

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE supports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL
);

CREATE TABLE medias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    categorie_id INT,
    support_id INT,
    date_acquisition DATE NOT NULL,
    prix DECIMAL(10,2),
    FOREIGN KEY (categorie_id) REFERENCES categories(id),
    FOREIGN KEY (support_id) REFERENCES supports(id)
);

CREATE TABLE membres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    date_inscription DATE NOT NULL,
    actif BOOLEAN DEFAULT true
);

CREATE TABLE emprunts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    media_id INT,
    membre_id INT,
    date_emprunt DATE NOT NULL,
    date_retour DATE,
    FOREIGN KEY (media_id) REFERENCES medias(id),
    FOREIGN KEY (membre_id) REFERENCES membres(id)
);

-- Données de test
INSERT INTO categories (nom) VALUES 
('Film'), ('Musique'), ('Documentaire'), ('Série TV');

INSERT INTO supports (type) VALUES 
('DVD'), ('Blu-ray'), ('CD Audio'), ('Vinyle');

INSERT INTO medias (titre, categorie_id, support_id, date_acquisition, prix) VALUES
('Inception', 1, 2, '2024-01-15', 19.99),
('Dark Side of the Moon', 2, 4, '2023-12-01', 29.99),
('La Planète Bleue', 3, 1, '2024-02-01', 14.99);

INSERT INTO membres (nom, email, date_inscription) VALUES
('Alice Martin', 'alice@example.com', '2024-01-01'),
('Bob Wilson', 'bob@example.com', '2024-01-15');

*/
$database = new mysqli('localhost', 'root', '', 'mediatheque_v2');
mysqli_set_charset($database, "utf8mb4");

/*
EXERCICE 1 : Exemple fourni
Requête qui affiche tous les médias avec leur catégorie et type de support
*/

$medias = $database->execute_query("SELECT m.titre, c.nom as categorie, s.type as support, m.prix
    FROM medias m
    INNER JOIN categories c ON m.categorie_id = c.id
    INNER JOIN supports s ON m.support_id = s.id
    ORDER BY m.titre");

foreach($medias as $media) {
    echo $media['titre'] . " - " . $media['categorie'] . " " . $media['support'] . " : " . $media['prix'] . "€<br>";
}

/*
EXERCICE 2 : À vous de jouer !
Créez les requêtes suivantes :

1. Une fonction qui enregistre un nouvel emprunt et vérifie si le média est déjà emprunté avant

Utilisez le squelette de code ci-dessous :
*/

function enregistrerEmprunt($database, $media_id, $membre_id) {
    // TODO : Vérifier si le média n'est pas déjà emprunté
    $resultatEmprunt = $database->execute_query("SELECT id 
    FROM emprunts 
    WHERE media_id = ? 
    AND date_retour IS NULL", array($media_id));
    if($resultatEmprunt->num_rows != 0) {
        return false;
    } else {
        // TODO : Si disponible, créer l'emprunt, sinon retourner false
        $database->execute_query("INSERT INTO emprunts (media_id, membre_id, date_emprunt) VALUES (?, ?, ?)", array($media_id, $membre_id, date('Y-m-d')));
        if($database->affected_rows != 0) {
            return true;
        } else {
            return false;
        }
    }
}

// Essayez de créer un emprunt en appelant la fonction enregistrerEmprunt, puis affichez si cela a fonctionné ou non
var_dump(enregistrerEmprunt($database, 2, 2));
var_dump(enregistrerEmprunt($database, 2, 2));

?>