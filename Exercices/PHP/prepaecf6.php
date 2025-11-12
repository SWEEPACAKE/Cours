<?php

/*

                            Premièrement, créer une base de données club_sport


CREATE TABLE activites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    niveau VARCHAR(20) NOT NULL, -- débutant, intermédiaire, avancé
    prix_mensuel DECIMAL(6,2) NOT NULL
);

CREATE TABLE coachs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    telephone VARCHAR(15),
    date_embauche DATE NOT NULL
);

CREATE TABLE adherents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    date_naissance DATE NOT NULL,
    date_inscription DATE NOT NULL,
    actif BOOLEAN DEFAULT true
);

CREATE TABLE cours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    activite_id INT NOT NULL,
    coach_id INT NOT NULL,
    jour_semaine ENUM('lundi','mardi','mercredi','jeudi','vendredi','samedi') NOT NULL,
    heure_debut TIME NOT NULL,
    duree_minutes INT NOT NULL,
    places_max INT NOT NULL,
    FOREIGN KEY (activite_id) REFERENCES activites(id),
    FOREIGN KEY (coach_id) REFERENCES coachs(id)
);

CREATE TABLE inscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adherent_id INT NOT NULL,
    cours_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE,
    FOREIGN KEY (adherent_id) REFERENCES adherents(id),
    FOREIGN KEY (cours_id) REFERENCES cours(id)
);

-- Données de test
INSERT INTO activites (nom, niveau, prix_mensuel) VALUES 
('Yoga', 'débutant', 45.00),
('Musculation', 'intermédiaire', 55.00),
('Zumba', 'tous niveaux', 40.00);

INSERT INTO coachs (nom, email, telephone, date_embauche) VALUES
('Jean Dupont', 'jean@club.com', '0601020304', '2023-09-01'),
('Marie Lambert', 'marie@club.com', '0605060708', '2024-01-15');

INSERT INTO adherents (nom, email, date_naissance, date_inscription) VALUES
('Sophie Martin', 'sophie@example.com', '1990-05-15', '2024-01-01'),
('Lucas Bernard', 'lucas@example.com', '1988-11-30', '2024-02-01');

INSERT INTO cours (activite_id, coach_id, jour_semaine, heure_debut, duree_minutes, places_max) VALUES
-- Cours de Yoga (activite_id = 1) avec Jean (coach_id = 1)
(1, 1, 'lundi', '09:00', 60, 15),
(1, 1, 'mercredi', '17:30', 60, 15),
(1, 1, 'samedi', '10:00', 90, 20),

-- Cours de Musculation (activite_id = 2) avec Marie (coach_id = 2)
(2, 2, 'lundi', '18:00', 90, 12),
(2, 2, 'mardi', '17:00', 90, 12),
(2, 2, 'jeudi', '18:00', 90, 12),

-- Cours de Zumba (activite_id = 3) avec Marie (coach_id = 2)
(3, 2, 'mardi', '19:00', 45, 25),
(3, 2, 'vendredi', '18:30', 45, 25),
(3, 2, 'samedi', '11:30', 45, 25);



                        DEUXIEMEMENT


*/

$database = new mysqli('localhost', 'root', '', 'club_sport');
mysqli_set_charset($database, "utf8mb4");

/*
EXEMPLE FOURNI :
Fonction qui affiche les cours disponibles avec leurs détails
*/

function listerCours($database) {
    return $database->execute_query("
        SELECT 
            c.jour_semaine,
            c.heure_debut,
            c.duree_minutes,
            a.nom as activite,
            a.niveau,
            co.nom as coach,
            c.places_max,
            (
                SELECT COUNT(*) 
                FROM inscriptions i 
                WHERE i.cours_id = c.id AND i.date_fin IS NULL
            ) as inscrits
        FROM cours c
        JOIN activites a ON c.activite_id = a.id
        JOIN coachs co ON c.coach_id = co.id
        ORDER BY FIELD(c.jour_semaine, 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'),
                c.heure_debut
    ");
}

/*
EXERCICES À RÉALISER :

1. Créez une fonction qui inscrit un adhérent à un cours :
   - Vérifie s'il reste des places
   - Vérifie si l'adhérent n'est pas déjà inscrit à ce cours
   - Crée l'inscription si possible

2. Créez une fonction de recherche d'adhérents qui :
   - Permet de chercher par nom
   - Filtre par activité (L'adhérent est inscrit à un cours qui correspond à une activité)

Utilisez ce squelette de code :
*/

function inscrireAdherent($database, $adherent_id, $cours_id, $date_debut) {
    // TODO : Implémenter les vérifications et l'inscription
    // On vérifie si l'adhérent n'a pas déjà une inscription active
    $result = $database->execute_query("SELECT id 
    FROM inscriptions 
    WHERE adherent_id = ? 
    AND cours_id = ? 
    AND date_fin IS NULL", array($adherent_id, $cours_id));
    if($result->num_rows == 0) {
        $resultat = $database->execute_query("SELECT 
            c.places_max,
            (
                SELECT COUNT(*) 
                FROM inscriptions i 
                WHERE i.cours_id = c.id AND i.date_fin IS NULL
            ) as inscrits 
            FROM cours c 
            WHERE c.id = ?", array($cours_id))->fetch_assoc();
            // Si j'ai moins d'inscrits que de places
            if($resultat['inscrits'] < $resultat['places_max']) {
                // Alors je fais mon inscription
                $database->execute_query("INSERT INTO inscriptions (adherent_id, cours_id, date_debut) VALUES (?, ?, ?)", array($adherent_id, $cours_id, $date_debut));

                if($database->affected_rows != 0) {
                    return "Inscription effectuée :)";
                } else {
                    return "Il y a des la place mais ça n'a pas marché :(";
                }

            } else {
                return "Cours déjà complet :(";
            }
    } else {
        return "Adhérent déjà inscrit";
    }
}


function rechercherAdherents($database, $recherche = null, $activite_id = null) {
    // TODO : Implémenter la recherche
    $jointure = "";
    if($activite_id != NULL) {
        $jointure .= " INNER JOIN inscriptions i ON i.adherent_id = adherents.id ";
        $jointure .= " INNER JOIN cours c ON i.cours_id = c.id ";
    }
    $requeteParDefaut = "SELECT adherents.* FROM adherents " . $jointure . " WHERE ? ";
    $array_params = array(1);

    if($recherche != NULL) {
        $requeteParDefaut .= " AND adherents.nom LIKE ? ";
        array_push($array_params, "%" . $recherche . "%");
    }
    if($activite_id != NULL) {
        $requeteParDefaut .= " AND c.activite_id = ? ";
        array_push($array_params, $activite_id);
    }

    $resultat = $database->execute_query($requeteParDefaut, $array_params)->fetch_all(MYSQLI_ASSOC);

    return $resultat;

}

echo inscrireAdherent($database, 2, 9, date("Y-m-d"));
echo "<br>";
echo inscrireAdherent($database, 1, 9, date("Y-m-d"));
echo "<br>";
echo "<br>";
echo "<br>";

var_dump(rechercherAdherents($database, null, 3));

// Tests
echo "Liste des cours disponibles :<br>";
$cours = listerCours($database);
foreach($cours as $c) {
    echo $c['activite'] . " (" . $c['niveau'] . ") - " . $c['jour_semaine'] . " à " . $c['heure_debut'];
    echo " (" . $c['inscrits'] . "/" . $c['places_max'] . " places)<br>";
}

?>