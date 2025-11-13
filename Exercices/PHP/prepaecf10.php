<?php
$db = new mysqli('localhost', 'root', '', 'salles_resa');
mysqli_set_charset($db, "utf8mb4");

// 1 . Rapport d’utilisation journalière
// Objectif : Afficher pour une date donnée le nombre de réservations et le taux d’utilisation (minutes réservées / minutes ouvrables) par salle. On va considérer que le nombre de minutes ouvrables correspond aux horaires de bureau, de 9h00 à 18h00, soit 540
// Indice SQL : GROUP BY + SUM(TIMESTAMPDIFF(MINUTE, heure_debut, heure_fin))

$resultat = $db->execute_query("SELECT salles.nom, COUNT(r.id) as nb_resa, (SUM(TIMESTAMPDIFF(MINUTE, heure_debut, heure_fin)) / 540) * 100 as taux_utilisation 
FROM salles 
LEFT JOIN reservations r ON r.salle_id = salles.id 
WHERE r.date_reservation = ? 
GROUP BY salles.nom", array("2025-11-18"))->fetch_all(MYSQLI_ASSOC);
?>
<ul>
    <?php
    foreach($resultat as $salle) {
        ?>
        <li><?= $salle['nom'] ?> - Nb de réservations : <?= $salle['nb_resa'] ?>, soit <?= $salle['taux_utilisation'] ?> % d'utilisation</li>
        <?php
    }
    ?>
</ul>
<?php

// 2 . Modifier la fonction estDisponible
// Reprendre la fonction estDisponible de l'exercice précédent, et ajouter en paramètre le nombre de personnes conviées. 
// Il faudra vérifier dans cette fonction que la capacité de la salle est suffisante pour accueillir autant de personnes

function estDisponible($database, $salle_id, $date_resa, $heure_debut_resa, $heure_fin_resa, $nb_convives) {
    $verif_capacite_salle = $database->execute_query("SELECT * 
    FROM salles 
    WHERE id = ? 
    AND capacite >= ?", array(
        $salle_id,
        $nb_convives
    ));
    if($verif_capacite_salle->num_rows != 0) {
        $sql = "SELECT * 
        FROM reservations 
        WHERE salle_id = ? AND date_reservation = ?
            AND (
                (heure_debut < ? AND heure_fin > ?)
                OR (heure_debut < ? AND heure_fin > ?)
                OR (heure_debut >= ? AND heure_fin <= ?)
            )";
        $stmt = $database->prepare($sql);
        $stmt->bind_param("isssssss", $salle_id, $date_resa, $heure_fin_resa, $heure_debut_resa, $heure_debut_resa, $heure_fin_resa, $heure_debut_resa, $heure_fin_resa);
        $stmt->execute();
        $resultat = $stmt->get_result()->fetch_assoc();
        if(!empty($resultat)) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}


var_dump(estDisponible($db, 1, "2025-11-18", "10:15:00", "10:45:00", 3)); 
var_dump(estDisponible($db, 1, "2025-11-18", "10:15:00", "10:45:00", 6)); 