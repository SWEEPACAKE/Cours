<?php
$prenoms = array("Alice", "Bob", "Charlie");
$notes = array(12, 15, 8, 17);
$fruits = array(
    "agrumes" => array("mandarine", "pamplemousse", "orange"),
    "fruits rouges" => array("framboise", "fraise")
);
?>

<!-- Exemple 1 : -->
<ul>
    <?php 
    foreach($prenoms as $key => $prenom) { 
        ?>
        <li><?= $key ?></li>
    <?php 
    }
    ?>
</ul>

<!-- Exemple 2 -->
<ol>
<?php 
foreach($listeNotes as $note) { 
    ?>
    <li>Note : <?= $note ?></li>
<?php 
} 
?>
</ol>

<!-- Exemple 3 -->
<ul>
<?php 
foreach($fruits as $familleDeFruit => $fruits) { 
?>
    <li><?= uc_first($familleDeFruit) ?></li>
    <ul>
        <?php
        foreach($listeFruits as $fruit) {
        ?>
            <li><?= $fruit ?></li>
        <?php
        }
        ?>
    </ul>
<?php 
}
?>
</ul>

