
<?php
/*
Auteur : Meriem Essoulhi
Objectif : Utiliser les conditions, switch, les boucles
et les instructions de contrôle en PHP.
Date : 18/10/2026
*/
require_once "config.php";

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

echo "<h2>Exercice 2.1 : Mentions</h2>";

echo "Note 18 : " . mention(18) . "<br>";
echo "Note 15 : " . mention(15) . "<br>";
echo "Note 13 : " . mention(13) . "<br>";
echo "Note 10 : " . mention(10) . "<br>";
echo "Note 7 : " . mention(7) . "<br>";

echo "<hr>";
echo "<h2>Exercice 2.2 : Switch</h2>";

$mois = date("m");

switch ($mois) {
    case "01":
        $nomMois = "Janvier";
        break;
    case "02":
        $nomMois = "Février";
        break;
    case "03":
        $nomMois = "Mars";
        break;
    case "04":
        $nomMois = "Avril";
        break;
    case "05":
        $nomMois = "Mai";
        break;
    case "06":
        $nomMois = "Juin";
        break;
    case "07":
        $nomMois = "Juillet";
        break;
    case "08":
        $nomMois = "Août";
        break;
    case "09":
        $nomMois = "Septembre";
        break;
    case "10":
        $nomMois = "Octobre";
        break;
    case "11":
        $nomMois = "Novembre";
        break;
    case "12":
        $nomMois = "Décembre";
        break;
    default:
        $nomMois = "Mois invalide";
}

echo "Nous sommes au mois de : " . $nomMois . "<br>";

echo "<strong>Question :</strong> Sans break, PHP continue vers les cases suivantes.";

echo "<hr>";
echo "<h2>Exercice 2.3 : Boucles</h2>";

// Question 1 : Triangle avec deux boucles for
echo "<h3>1. Triangle</h3>";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

// Question 2 : while, nombres de 0 à 20 par pas de 2
echo "<h3>2. Nombres pairs avec while</h3>";

$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
}

// Question 3 : for et continue
echo "<h3>3. Nombres pairs avec continue</h3>";

for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i<br>";
}

// Question 4 : while, switch et break 2
echo "<h3>4. while, switch et break 2</h3>";

$i = 1;

while ($i <= 12) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}

// Question 5 : do-while
echo "<h3>5. Nombres pairs avec do-while</h3>";

$i = 0;

do {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
} while ($i <= 20);

echo "<p>Différence : do-while exécute le bloc au moins une fois.</p>";

?>
