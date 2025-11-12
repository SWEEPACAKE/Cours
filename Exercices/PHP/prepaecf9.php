<?php

// Préparer la BDD suivante : salles_resa

// CREATE TABLE salles (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nom VARCHAR(100) NOT NULL,
//     capacite INT NOT NULL,
//     emplacement VARCHAR(100)
// ) ENGINE=InnoDB;

// CREATE TABLE utilisateurs (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     prenom VARCHAR(50) NOT NULL,
//     nom VARCHAR(50) NOT NULL,
//     email VARCHAR(150) NOT NULL UNIQUE
// ) ENGINE=InnoDB;

// CREATE TABLE reservations (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     salle_id INT NOT NULL,
//     utilisateur_id INT NOT NULL,
//     date_reservation DATE NOT NULL,
//     heure_debut TIME NOT NULL,
//     heure_fin TIME NOT NULL,
//     objet VARCHAR(200),
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     FOREIGN KEY (salle_id) REFERENCES salles(id) ON DELETE CASCADE,
//     FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
//     UNIQUE (salle_id, date_reservation, heure_debut, heure_fin)
// ) ENGINE=InnoDB;

// -- données : salles
// INSERT INTO salles (nom, capacite, emplacement) VALUES
// ('Salle A', 4, '1er étage'),
// ('Salle B', 8, 'Rez-de-chaussée'),
// ('Salle C', 12, '2ème étage'),
// ('Salle D', 6, 'Rez-de-jardin'),
// ('Salle E', 20, '3ème étage');

// -- données : utilisateurs
// INSERT INTO utilisateurs (prenom, nom, email) VALUES
// ('Alice','Durand','alice.durand@example.com'),
// ('Bastien','Leroy','bastien.leroy@example.com'),
// ('Camille','Moreau','camille.moreau@example.com'),
// ('David','Bernard','david.bernard@example.com'),
// ('Emilie','Rousseau','emilie.rousseau@example.com'),
// ('Fabien','Martinez','fabien.martinez@example.com'),
// ('Gabriel','Petit','gabriel.petit@example.com'),
// ('Julie','Nguyen','julie.nguyen@example.com');

// -- données : reservations (exemples)
// INSERT INTO reservations (salle_id, utilisateur_id, date_reservation, heure_debut, heure_fin, objet) VALUES
// (1, 1, '2025-11-18', '09:00', '10:00', 'Brief matinal'),
// (2, 2, '2025-11-18', '10:30', '12:00', 'Atelier design'),
// (3, 3, '2025-11-19', '14:00', '16:00', 'Formation interne'),
// (1, 4, '2025-11-19', '11:00', '12:00', 'Réunion client'),
// (4, 5, '2025-11-20', '09:00', '10:30', 'CA hebdo'),
// (5, 6, '2025-11-20', '13:00', '15:00', 'Tournage vidéo'),
// (2, 7, '2025-11-21', '08:30', '09:30', 'Stand-up'),
// (3, 8, '2025-11-21', '10:00', '11:30', 'Atelier coding'),
// (1, 2, '2025-11-22', '15:00', '16:00', 'Démo produit'),
// (5, 1, '2025-11-22', '09:00', '11:00', 'Séminaire interne');
// Exercice : réservation de salles (utiliser execute_query())

$db = new mysqli('localhost', 'root', '', 'salles_resa');
mysqli_set_charset($db, "utf8mb4");

/*
Objectifs pédagogiques :
- Utiliser $db->execute_query() avec paramètres
- Vérifier la disponibilité d'une salle (pas de chevauchement)
- Insérer une réservation, lister et annuler

Fonctions à réaliser :
1) estDisponible($db, $salle_id, $date, $debut, $fin) : bool
   - retourne true si aucune réservation existante ne chevauche l'intervalle (debut, fin), sinon false
*/
function estDisponible($database, $salle_id, $date_resa, $heure_debut_resa, $heure_fin_resa) {
   $sql = "SELECT * FROM reservations 
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
}
var_dump(estDisponible($db, 1, "2025-11-18", "08:30:00", "09:30:00")); 
var_dump(estDisponible($db, 1, "2025-11-18", "09:30:00", "10:30:00")); 
var_dump(estDisponible($db, 1, "2025-11-18", "10:15:00", "10:45:00")); 
/*
2) creerReservation($db, $salle_id, $utilisateur_id, $date, $debut, $fin, $objet) : bool
   - utilise estDisponible() pour tester si la salle est dispo ou non, insère si possible, renvoie true si ça a marché
*/
function creerReservation($database, $salle_id, $utilisateur_id, $date, $debut, $fin, $objet) {
   if(estDisponible($database, $salle_id, $date, $debut, $fin)) {
      // insertion
      $stmt = $database->prepare("INSERT INTO reservations (salle_id, utilisateur_id, date_reservation, heure_debut, heure_fin, objet) VALUES (?, ?, ?, ?, ? ,?)");
      $stmt->bind_param("iissss", $salle_id, $utilisateur_id, $date, $debut, $fin, $objet);
      if($stmt->execute()) {
         return "Réservation effectuée";
      } else {
         return "Problème lors de la réservation";
      }
   } else {
      return "Salle pas disponible";
   }
}

echo creerReservation($db, 1, 1, "2025-11-18", "10:15:00", "10:45:00", "Test");
/*
3) listerReservationsSalle($db, $salle_id, $date) : array
   - retourne les réservations de la salle pour la date donnée, triées par heure_debut
*/
function listerReservationsSalle($db, $salle_id, $date) {
   $listeResa = $db->execute_query("SELECT * 
   FROM reservations 
   WHERE salle_id = ? 
   AND date_reservation = ? 
   ORDER BY heure_debut ASC", array($salle_id, $date))->fetch_all(MYSQLI_ASSOC);
   return $listeResa;
}
var_dump(listerReservationsSalle($db, 1, "2025-11-18"));
/*
4) annulerReservation($db, $reservation_id) : bool
   - supprime la réservation 


À vous de coder les fonctions ci-dessous.
*/

function annulerReservation($db, $reservation_id) {
   $resultatSuppression = $db->execute_query("DELETE FROM reservations WHERE id = ?", array($reservation_id));
   return $resultatSuppression;
}
var_dump(annulerReservation($db, 11));
/* Tests rapides (exécuter et observer les retours) */
// var_dump(estDisponible($db, 1, '2025-11-18', '10:00', '11:00')); // true attendu
// var_dump(creerReservation($db, 1, 3, '2025-11-23', '09:00', '10:00', 'Réunion test')); // true attendu
// var_dump(listerReservationsSalle($db, 1, '2025-11-23'));
// var_dump(annulerReservation($db, 11)); // exemple: true/false selon id
?>