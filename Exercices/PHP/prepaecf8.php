<?php

$database = new mysqli('localhost', 'root', '', 'club_sport');
mysqli_set_charset($database, "utf8mb4");

/*
EXERCICES À RÉALISER :

1. Créez une fonction qui permet d'ajouter un cours. On passe en paramètre : 
L'ID de l'activité
L'ID du coach
Le jour
L'heure
La durée
Le nombre de places max

Il faut vérifier que le coach en question soit bien disponible à l'heure et au jour en question. 

*/
function ajouterCours($id_activite, $id_coach, $jour, $heure, $duree, $nb_places_max) {
    global $database;
    $coachDispo = $database->execute_query("SELECT id 
    FROM cours 
    WHERE coach_id = ? 
    AND jour_semaine = ? 
    AND heure_debut = ?", array($id_coach, $jour, $heure));

    if($coachDispo->num_rows == 0) {
        $stmt = $database->prepare("INSERT INTO cours (activite_id, coach_id, jour_semaine, heure_debut, duree_minutes, places_max) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissii", 
            $id_activite,
            $id_coach,
            $jour,
            $heure,
            $duree,
            $nb_places_max
        );
        if($stmt->execute()) {
            return "Cours créé";
        } else {
            return "Cours pas créé";
        }
    } else {
        return "Coach déjà occupé";
    }

}

echo ajouterCours(3, 2, "lundi", "17:00:00", 45, 15);

?>