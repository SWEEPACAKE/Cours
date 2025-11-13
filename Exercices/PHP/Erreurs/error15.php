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
        <li><?= $prenom ?></li>
    <?php 
    }
    ?>
</ul>

<!-- Exemple 2 -->
<ol>
<?php 
foreach($notes as $note) { 
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
    <li><?= ucfirst($familleDeFruit) ?></li>
    <ul>
        <?php
        foreach($fruits as $fruit) {
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

