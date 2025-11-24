<?php
if($_SERVER['HTTP_AUTHORIZATION'] == "SoHdG1uqdxxeU6OiRpf9AY3R8") {
    $database = new mysqli("192.168.56.56", "homestead", "secret", "bibliotheque");
    mysqli_set_charset($database, "utf8mb4");
    if(array_key_exists('id_auteur', $_GET) && is_numeric($_GET['id_auteur'])) {
        $requete = "SELECT * FROM livres WHERE id_auteur = ?";
        $resultat = $database->execute_query($requete, array($_GET['id_auteur']))->fetch_all(MYSQLI_ASSOC);
    } else {
        $requete = "SELECT * FROM livres";
        $resultat = $database->execute_query($requete)->fetch_all(MYSQLI_ASSOC);
    }
    $response = $resultat;
} 
echo json_encode($response);