/*
Auteur : Meriem Essoulhi
Objectif : Exporter les résultats au format JSON,
lire les données JSON et comparer serialize() et json_encode().
Date : 18/10/2026
*/
<?php
require_once "config.php";

$fichierCSV = __DIR__ . "/data/notes.csv";
$fichierJSON = __DIR__ . "/data/notes.json";

// Vérifier si le fichier CSV existe
if (!file_exists($fichierCSV)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

// Ouvrir le fichier CSV en lecture
$fp = fopen($fichierCSV, "r");

if ($fp === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

// 1. Construire un tableau associatif des résultats
$resultats = [];

while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $noteInfo = (float) $ligne[1];
    $noteMath = (float) $ligne[2];
    $moyenne = ($noteInfo + $noteMath) / 2;

    $resultats[] = [
        "nom" => $nom,
        "notes" => [
            "info" => $noteInfo,
            "math" => $noteMath
        ],
        "moyenne" => $moyenne
    ];
}

fclose($fp);

// 2. Convertir en JSON et enregistrer dans notes.json
$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false) {
    exit("Erreur lors de la conversion en JSON.");
}

if (file_put_contents($fichierJSON, $json) === false) {
    exit("Erreur lors de l'écriture du fichier JSON.");
}

echo "<h2>1. Fichier JSON enregistré avec succès</h2>";

// 3. Relire le fichier JSON et afficher son contenu
$jsonLu = file_get_contents($fichierJSON);

if ($jsonLu === false) {
    exit("Erreur lors de la lecture du fichier JSON.");
}

$donnees = json_decode($jsonLu, true);

echo "<h2>2. Résultat de json_decode() et print_r()</h2>";

echo "<pre>";
print_r($donnees);
echo "</pre>";

// 4. Comparer serialize() et json_encode()
echo "<h2>3. Résultat de serialize()</h2>";

$serialise = serialize($resultats);

echo "<pre>";
echo htmlspecialchars($serialise, ENT_QUOTES, "UTF-8");
echo "</pre>";

echo "<h2>4. Résultat de json_encode()</h2>";

echo "<pre>";
echo htmlspecialchars($json, ENT_QUOTES, "UTF-8");
echo "</pre>";
?>
