<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debuging</title>
</head>
<body style="text-align: center;">
    <?php
    $tableauFormation = array(
        "nomFormation" => "TP DEV WEB",
        "lieuFormation" => "Moulins",
        "etablissementFormation" => "OSENGO", 
        "eleves" => array(
            "Abdelazize FIDDAH",
            "Carole GRESET",
            "Dylan HUMBLOT",
            "Emmanuel MANEVAL",
            "Hugo PINEAU",
            "Nadège PETREMANT",
            "Thomas MEULUN"
        )
    );

    echo $tableauFormation['nomFormation'] . "<br>";
    echo $tableauFormation['etablissementFormation'] . "<br>";
    echo $tableauFormation['lieuFormation'] . "<br>";
    ?>
    <br>
    <?php
    foreach($tableauFormation['eleves'] as $eleve) {
        if(strlen($eleve) > 1) {
            ?> 
            <p><?= $eleve ?></p>
            <?php
        }
    }
    ?>
    <div style="text-align: center;">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur distinctio qui ipsam doloribus quibusdam culpa voluptate et omnis nostrum suscipit. Quas, distinctio, perspiciatis saepe velit esse id dolores maxime consequuntur sint expedita recusandae nobis illo! Quia eius natus, velit perspiciatis nisi quam veniam obcaecati dignissimos est dolorem aliquam, quod illum.
    </div>
</body>
</html>