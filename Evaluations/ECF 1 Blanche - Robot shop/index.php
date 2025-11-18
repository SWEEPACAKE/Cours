<?php
$database = new mysqli('localhost', 'root', '', 'robot_shop');
mysqli_set_charset($database, 'utf8mb4');

$listeRobots = $database->execute_query("SELECT robot.id, robot.modele, robot.fonction, marque.libelle
FROM `robot` 
INNER JOIN marque ON marque.id = robot.id_marque ");

if(!empty($_POST)) {
    $stmt = $database->prepare("INSERT INTO maintenance (date_maintenance, probleme_rencontre, solution_apportee, id_robot) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $_POST['date_maintenance'], $_POST['probleme_rencontre'], $_POST['solution_apportee'], $_POST['id_robot']);

    if($stmt->execute()) {
        echo "Insertion effectuée :)";
    } else {
        echo "Insertion ratée :(";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECF Blanche - Robot shop</title>
</head>
<body>
    <h1 style="text-align: center;">Bilan de maintenance</h1>
    <form action="" method="POST">
        <label for="id_robot">Robot concerné </label>
        <select name="id_robot" id="id_robot">
            <option value="">Choisissez un robot</option>
            <?php
            foreach($listeRobots as $robot) {
                ?>
                <option value="<?= $robot['id'] ?>">
                    <?= $robot['modele'] ?>, <?= $robot['fonction'] ?> (<?= $robot['libelle'] ?>)
                </option>
                <?php
            }
            ?>
        </select>
        <br>
        <label for="date_maintenance">Date de la maintenance</label>
        <input type="date" name="date_maintenance" id="date_maintenance"/>
        <br>
        <label for="probleme_rencontre">Problème rencontré</label>
        <textarea name="probleme_rencontre" id="probleme_rencontre"></textarea>
        <br>
        <label for="solution_apportee">Solution apportée</label>
        <textarea name="solution_apportee" id="solution_apportee"></textarea>
        <br>
        <button type="submit">Envoyer</button>
    </form>
    <br><br>

    <ul>
        <?php
        foreach($listeRobots as $robot) {
            ?>
            <li>
                <a href="robot.php?id_robot=<?= $robot['id'] ?>"><?= $robot['modele'] ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
</body>
</html>