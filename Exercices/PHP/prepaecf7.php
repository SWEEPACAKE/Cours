<?php

$database = new mysqli('localhost', 'root', '', 'club_sport');
mysqli_set_charset($database, "utf8mb4");

/*
EXERCICES À RÉALISER :

1. Créez une fonction qui liste tous les inscrits d'un cours donné
Donner l'id du cours en paramètre, et afficher les noms des inscrits 

2. Créez une fonction qui permet de désinscrire un adhérent d'un cours.
On donne à la fonction un id d'adhérent, un id de cours, et il faut supprimer son inscription

*/

function listerLesInscrits($id_cours) {
    // On récupère la $database dans le scope global du fichier
    global $database;
    $listeDesInscrits = $database->execute_query("SELECT adherents.nom 
    FROM adherents 
    INNER JOIN inscriptions i ON i.adherent_id = adherents.id 
    WHERE i.cours_id = ?", array($id_cours))->fetch_all(MYSQLI_ASSOC);

    return $listeDesInscrits;
}

var_dump(listerLesInscrits(9));


function supprimerInscription($database, $id_adherent, $id_cours) {
    $inscription = $database->execute_query("SELECT id 
    FROM inscriptions 
    WHERE adherent_id = ? 
    AND cours_id = ? 
    AND date_fin IS NULL", array($id_adherent, $id_cours));
    // Si on a trouvé une inscription
    if($inscription->num_rows > 0) {
        // On charge le premier résultat dans la variable $resultat. ça sera un tableau avec une clé 'id'
        $resultat = $inscription->fetch_assoc();
        // Puis on ce sert de ce résultat comme paramètre dans notre requête d'UPDATE
        $database->execute_query("UPDATE inscriptions SET date_fin = CURDATE() WHERE id = ?", array($resultat['id']));
        // Si une ligne a été affectée
        if($database->affected_rows == 1) {
            return "Résiliation effectuée :(";
        } else {
            // Sinon
            return "Un problème est survenu";
        }
    } else {
        return "Cet adhérent n'était pas ou plus inscrit à ce cours";
    }
}

echo supprimerInscription($database, 2, 9);
?>