<?php
$database = new mysqli('localhost', 'root', '', 'robot_shop');
mysqli_set_charset($database, 'utf8mb4');
if(!empty($_GET)) {
    $monRobot = $database->execute_query("SELECT robot.id, robot.modele, robot.fonction, marque.libelle
    FROM `robot` 
    INNER JOIN marque ON marque.id = robot.id_marque 
    WHERE robot.id = ?", array($_GET['id_robot']))->fetch_assoc();
} else {
    echo "Il faut choisir un robot avant d'afficher cette page";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot shop - <?= $robot['modele'] ?></title>
</head>
<body>
    <div style="display:flex;">
        <div style="width: 50%;">
            Modèle du robot : <?= $monRobot['modele'] ?><br>
            Marque : <?= $monRobot['libelle'] ?><br>
            Fonction : <?= $monRobot['fonction'] ?>
        </div>
        <div style="width: 50%;">
            <ul>
                <?php
                $listePieces = $database->execute_query("SELECT piece.* 
                FROM piece 
                INNER JOIN constitue ON constitue.id_piece = piece.id 
                WHERE constitue.id_robot = ?", array($_GET['id_robot']));
                foreach($listePieces as $piece) {
                    ?>
                    <li><?= $piece['nom'] ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>