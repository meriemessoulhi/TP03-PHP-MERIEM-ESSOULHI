/*
Auteur : Meriem Essoulhi
Objectif : Manipuler les tableaux indexés et associatifs,
calculer des statistiques et effectuer des tris.
Date : 18/10/2026
*/
<?php require_once "includes/entete_inc.php";
include "includes/menu_inc.php";

echo "<h2>Exercice 3.1 : Création des tableaux</h2>";

// 1. Tableau associatif des notes
$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

echo "<h3>Tableau des notes</h3>";

foreach ($notes as $nom => $note) {
    echo $nom . " : " . $note . "<br>";
}

// 2. Tableau indexé des modules
$modules = ["PHP", "HTML", "Algorithmique"];

echo "<h3>Modules avec foreach</h3>";

foreach ($modules as $module) {
    echo $module . "<br>";
}

// 3. Accéder aux éléments par leur indice
echo "<h3>Modules par indice</h3>";

echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";

require_once "config.php";
require_once "exo2_flux.php";

echo "<hr>";
echo "<h2>Exercice 3.2 : Affichage HTML</h2>";

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
      </tr>";

foreach ($notes as $nom => $note) {

    if ($note < SEUIL) {
        echo "<tr style='color: red;'>";
    } else {
        echo "<tr>";
    }

    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>" . $note . "</td>";
    echo "<td>" . mention($note) . "</td>";

    echo "</tr>";
}

echo "</table>";


echo "<hr>";
echo "<h2>Exercice 3.3 : Statistiques</h2>";

// Question 1 : Calcul avec une boucle
$somme = 0;
$meilleure = null;
$faible = null;
$nombre = 0;

foreach ($notes as $nom => $note) {
    $somme += $note;
    $nombre++;

    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }

    if ($faible === null || $note < $faible) {
        $faible = $note;
    }
}

$moyenne = $somme / $nombre;

echo "<h3>1. Calcul avec une boucle</h3>";
echo "Somme : " . $somme . "<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Plus faible note : " . $faible . "<br>";

// Question 2 : Vérification avec les fonctions PHP
echo "<h3>2. Vérification avec les fonctions PHP</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre d'apprenants : " . count($notes) . "<br>";
echo "Meilleure note : " . max($notes) . "<br>";
echo "Plus faible note : " . min($notes) . "<br>";

// Question 3 : Effectifs par mention
echo "<h3>3. Effectifs par mention</h3>";

$effectifs = [
    "Très bien" => 0,
    "Bien" => 0,
    "Assez bien" => 0,
    "Passable" => 0,
    "Ajourné" => 0
];

foreach ($notes as $nom => $note) {
    $m = mention($note);
    $effectifs[$m]++;
}

foreach ($effectifs as $mentionNom => $effectif) {
    echo $mentionNom . " : " . $effectif . " apprenant(s)<br>";
}

echo "<hr>";
echo "<h2>Exercice 3.3 : Statistiques</h2>";

// Question 1 : Calcul avec une boucle
$somme = 0;
$meilleure = null;
$faible = null;
$nombre = 0;

foreach ($notes as $nom => $note) {
    $somme += $note;
    $nombre++;

    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }

    if ($faible === null || $note < $faible) {
        $faible = $note;
    }
}

$moyenne = $somme / $nombre;

echo "<h3>1. Calcul avec une boucle</h3>";
echo "Somme : " . $somme . "<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Plus faible note : " . $faible . "<br>";

// Question 2 : Vérification avec les fonctions PHP
echo "<h3>2. Vérification avec les fonctions PHP</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre d'apprenants : " . count($notes) . "<br>";
echo "Meilleure note : " . max($notes) . "<br>";
echo "Plus faible note : " . min($notes) . "<br>";

// Question 3 : Effectifs par mention
echo "<h3>3. Effectifs par mention</h3>";

$effectifs = [
    "Très bien" => 0,
    "Bien" => 0,
    "Assez bien" => 0,
    "Passable" => 0,
    "Ajourné" => 0
];

foreach ($notes as $nom => $note) {
    $m = mention($note);
    $effectifs[$m]++;
}

foreach ($effectifs as $mentionNom => $effectif) {
    echo $mentionNom . " : " . $effectif . " apprenant(s)<br>";
}

echo "<hr>";
echo "<h2>Exercice 3.4 : Tri</h2>";

// Fonction pour afficher un tableau de notes
function afficher($tab) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";

    foreach ($tab as $nom => $note) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars((string)$nom) . "</td>";
        echo "<td>" . htmlspecialchars((string)$note) . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
}

// 1. Tri par noms croissants
echo "<h3>1. Noms croissants (ksort)</h3>";
$tab = $notes;
ksort($tab);
afficher($tab);

// 2. Tri par notes décroissantes
echo "<h3>2. Notes décroissantes (arsort)</h3>";
$tab = $notes;
arsort($tab);
afficher($tab);

// 3. Tri par noms décroissants
echo "<h3>3. Noms décroissants (krsort)</h3>";
$tab = $notes;
krsort($tab);
afficher($tab);

// 4. Tri par notes croissantes
echo "<h3>4. Notes croissantes (asort)</h3>";
$tab = $notes;
asort($tab);
afficher($tab);

echo "<h3>Question : tri d'un tableau indexé</h3>";
echo "Pour trier les valeurs d'un tableau indexé, on utilise sort().";

echo "<hr>";
echo "<h2>Exercice 3.5 : Opérateurs de tableaux</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

// 1. Opérateur +
echo "<h3>1. \$a + \$b</h3>";
var_dump($a + $b);

// 2. Opérateur ==
echo "<h3>2. \$a == \$b</h3>";
var_dump($a == $b);

// 3. Opérateur ===
echo "<h3>3. \$a === \$b</h3>";
var_dump($a === $b);

include "includes/pied_inc.php";?>
