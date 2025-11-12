<?php
/*
                          PREMIEREMENT : 

Analysez l'exemple d'utilisation de execute_query() suivant : 
*/

$database = new mysqli('localhost', 'root', '', 'boutique');
mysqli_set_charset($database, "utf8mb4");

// Exemple de requête avec execute_query() pour rechercher des produits
$parametre = "Souris%";

$resultats = $database->execute_query(
    "SELECT nom, prix, stock 
    FROM produits 
    WHERE nom LIKE ?",
    array($parametre)
);

foreach($resultats as $ligne) {
    echo "Produit : " . $ligne['nom'] . " - Prix : " . $ligne['prix'] . "€<br>";
}

/*
                                    Troisièmement

À vous de jouer ! Complétez le code suivant pour :
1. Insérer un nouveau produit
2. Vérifier si l'insertion a réussi
3. Afficher un message de confirmation

Indices :
- Utilisez INSERT INTO produit (nom, prix, stock)
- La méthode execute_query() accepte un tableau de paramètres après la requête
- Vous pouvez utiliser $database->affected_rows pour vérifier l'insertion
*/

// Données à insérer
$nom = "Tapis de souris";
$prix = "10";
$stock = 100;

// TODO : Écrivez la requête avec execute_query()
$database->execute_query("INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)", array($nom, $prix, $stock));
// TODO : Vérifiez si l'insertion a réussi
// TODO : Affichez un message de confirmation
// Affected Rows vaut 1 si l'insertion a réussi, 0 si l'insertion a echoué
if($database->affected_rows != 0) {
    echo "Insertion réussie";
} else {
    echo "Insertion echouée";
}

?>