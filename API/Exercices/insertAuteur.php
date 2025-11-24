<?php
if($_SERVER['HTTP_AUTHORIZATION'] == "FuUKEGgGzIifArjDyAo4eYsRO" && !empty($_POST)) {
    $database = new mysqli("192.168.56.56", "homestead", "secret", "bibliotheque");
    mysqli_set_charset($database, "utf8mb4");

    $stmt = $database->prepare("INSERT INTO auteur (nom, date_naissance, nationalite, biographie) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['nom'], $_POST['date_naissance'], $_POST['nationalite'], $_POST['biographie']);
    if($stmt->execute()) {
        $array = array(
            "success" => true,
            "message" => "Insertion effectuée"
        ); 
    } else {
        $array = array(
            "success" => false,
            "message" => "Insertion ratée"
        ); 
    }
} else {
    $array = array(
        "success" => false,
        "message" => "Non autorisé"
    );
}
echo json_encode($array);