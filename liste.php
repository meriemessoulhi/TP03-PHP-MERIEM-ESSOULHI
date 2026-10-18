/*
Auteur : Meriem Essoulhi
Objectif : Lire les résultats depuis un fichier CSV,
afficher un tableau HTML et calculer la moyenne générale.
Date : 18/10/2026
*/
<?php 

require_once "config.php";

$fichier = __DIR__ . "/data/notes.csv";

// 1. Vérifier si le fichier existe
if (!file_exists($fichier)) {
    echo "Erreur : le fichier notes.csv n'existe pas.";
    exit;
}

// 2. Ouvrir le fichier en lecture
$fp = fopen($fichier, "r");

if ($fp === false) {
    echo "Erreur : impossible d'ouvrir le fichier.";
    exit;
}

// Calculer la moyenne générale
$totalMoyennes = 0;
$nombreApprenants = 0;
?>

<h1>Liste des apprenants</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
    </tr>

    <?php
    // 3. Lire le fichier ligne par ligne
    while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

        // Vérifier que la ligne contient 3 valeurs
        if (count($ligne) < 3) {
            continue;
        }

        $nom = $ligne[0];
        $noteInfo = (float) $ligne[1];
        $noteMath = (float) $ligne[2];

        $moyenne = ($noteInfo + $noteMath) / 2;

        // Déterminer la mention
        if ($moyenne >= 16) {
            $mention = "Très bien";
        } elseif ($moyenne >= 14) {
            $mention = "Bien";
        } elseif ($moyenne >= 12) {
            $mention = "Assez bien";
        } elseif ($moyenne >= SEUIL) {
            $mention = "Passable";
        } else {
            $mention = "Ajourné";
        }

        $totalMoyennes += $moyenne;
        $nombreApprenants++;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . $noteInfo . "</td>";
        echo "<td>" . $noteMath . "</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>" . $mention . "</td>";
        echo "</tr>";
    }

    // 4. Fermer le fichier
    fclose($fp);
    ?>
</table>

<?php
// 5. Afficher la moyenne générale de la classe
if ($nombreApprenants > 0) {
    $moyenneGenerale = $totalMoyennes / $nombreApprenants;
    echo "<p>Moyenne générale de la classe : "
        . number_format($moyenneGenerale, 2)
        . "</p>";
} else {
    echo "<p>Aucun apprenant enregistré.</p>";
}

require_once "config.php";

$fichier = __DIR__ . "/data/notes.csv";

// Vérifier si le fichier existe
if (!file_exists($fichier)) {
    echo "Erreur : le fichier notes.csv n'existe pas.";
    exit;
}

// Ouvrir le fichier en lecture
$fp = fopen($fichier, "r");

if ($fp === false) {
    echo "Erreur : impossible d'ouvrir le fichier.";
    exit;
}

$totalMoyennes = 0;
$nombreApprenants = 0;

echo "<h1>Exercice 5.2 : Lecture avec fgetcsv()</h1>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

// Exercice 5.2 : lecture avec fgetcsv()
while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];

    $moyenne = ($info + $math) / 2;

    if ($moyenne >= 16) {
        $mention = "Très bien";
    } elseif ($moyenne >= 14) {
        $mention = "Bien";
    } elseif ($moyenne >= 12) {
        $mention = "Assez bien";
    } elseif ($moyenne >= SEUIL) {
        $mention = "Passable";
    } else {
        $mention = "Ajourné";
    }

    $totalMoyennes += $moyenne;
    $nombreApprenants++;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, "UTF-8") . "</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>" . number_format($moyenne, 2) . "</td>";
    echo "<td>$mention</td>";
    echo "</tr>";
}

echo "</table>";

fclose($fp);

// Moyenne générale de la classe
if ($nombreApprenants > 0) {
    $moyenneGenerale = $totalMoyennes / $nombreApprenants;
    echo "<p><strong>Moyenne générale de la classe : "
        . number_format($moyenneGenerale, 2)
        . "</strong></p>";
} else {
    echo "<p>Aucun apprenant enregistré.</p>";
}


// ======================================
// Exercice 5.3 : Lecture bas niveau
// ======================================

$fp = fopen($fichier, "r");

if ($fp === false) {
    echo "Erreur : impossible d'ouvrir le fichier pour la lecture bas niveau.";
    exit;
}

echo "<hr>";
echo "<h1>Exercice 5.3 : Lecture avec fgets() et explode()</h1>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
      </tr>";

// Lire ligne par ligne avec fgets() et feof()
while (!feof($fp)) {

    $ligne = fgets($fp);

    if ($ligne === false) {
        break;
    }

    $ligne = trim($ligne);

    if ($ligne === "") {
        continue;
    }

    // Séparer les champs selon le point-virgule
    $donnees = explode(";", $ligne);

    if (count($donnees) < 3) {
        continue;
    }

    $nom = $donnees[0];
    $info = $donnees[1];
    $math = $donnees[2];

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, "UTF-8") . "</td>";
    echo "<td>" . htmlspecialchars($info, ENT_QUOTES, "UTF-8") . "</td>";
    echo "<td>" . htmlspecialchars($math, ENT_QUOTES, "UTF-8") . "</td>";
    echo "</tr>";
}

echo "</table>";

fclose($fp);

?>
