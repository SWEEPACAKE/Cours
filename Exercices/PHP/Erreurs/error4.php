<?php

function calculerMoyenne($numbers) {
    $somme = 0;
    foreach ($numbers as $num) {
        $somme += $num;
    }
    $moyenne = $somme / count($numbers);
    return $moyenne; // Typo: should be $moyenne
}
$nums = array(2, 4, 6, 8, 10);
echo "La moyenne est : " . calculerMoyenne($nums); // Wrong variable name: should be $nums

if (calculerMoyenne($nums) > 5)
    echo "Moyenne supérieure à 5";
else
    echo "Moyenne 5";

echo "<br><br<br>";

$prenom = "Alice";
$nom = "Dupont";
$age = 22;

// Exemple 1
echo "Bonjour, je m'appelle " . $prenom . " " . $nom . " et j'ai " . $age . " ans.<br>";

// Exemple 2
echo "Nom complet : " . $prenom . " " . $nom . "<br>";

// Example 3
echo "Bienvenue " . $nom . "!<br>"; // $name is not defined

// Example 4
echo 'Salut, ' . $prenom . '!<br>';

// Example 5
echo "Votre âge est : " . $age . "<br>";

// Example 6
$fruits = array("pomme", "banane", "orange");
echo "Liste des fruits : <br>";
foreach($fruits as $fruit) {
    echo $fruit . "<br>";
}

?>