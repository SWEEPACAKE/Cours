-- a.

SELECT robot.modele, robot.fonction, marque.libelle
FROM `robot` 
INNER JOIN marque ON marque.id = robot.id_marque 
INNER JOIN constitue ON constitue.id_robot = robot.id 
INNER JOIN piece ON piece.id = constitue.id_piece
WHERE piece.nom = "Batterie lithium";


--b. 

SELECT robot.modele, SUM(piece.prix) as prix 
FROM robot 
INNER JOIN constitue ON constitue.id_robot = robot.id 
INNER JOIN piece ON constitue.id_piece = piece.id 
WHERE robot.modele = "Spot";


-- c.
-- Si on n'arrive pas à calculer le nombre de robots, on peut mettre 5 en dur dans la requête 

SELECT robot.modele, SUM(piece.prix) / 5 as moyenne
FROM robot 
INNER JOIN constitue ON constitue.id_robot = robot.id 
INNER JOIN piece ON constitue.id_piece = piece.id;

-- Sinon il faut utiliser une sous-requête

SELECT 
    AVG(total_prix) AS prix_moyen_robot
FROM (
    SELECT 
        robot.id,
        SUM(prix) AS total_prix
    FROM robot
    JOIN constitue ON robot.id = constitue.id_robot
    JOIN piece ON constitue.id_piece = piece.id
    GROUP BY robot.id
) AS robots_avec_prix;