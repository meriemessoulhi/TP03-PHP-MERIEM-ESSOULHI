/*
Auteur : Meriem Essoulhi
Objectif : Vérifier les données d'un formulaire POST,
calculer les moyennes et enregistrer les notes dans un fichier CSV.
Date : 18/10/2026
*/
<?php
require_once "config.php";

if (
    !isset($_POST["nom"], $_POST["note_info"], $_POST["note_math"])
) {
    echo "Erreur : tous les champs sont obligatoires.";
    exit;
}

$nom = trim($_POST["nom"]);
$noteInfo = trim($_POST["note_info"]);
$noteMath = trim($_POST["note_math"]);

// Vérifier les champs vides
if (
    empty($nom) ||
    $noteInfo === "" ||
    $noteMath === ""
) {
    echo "Erreur : veuillez remplir tous les champs.";
    exit;
}

// Vérifier que les notes sont numériques
if (!is_numeric($noteInfo) || !is_numeric($noteMath)) {
    echo "Erreur : les notes doivent être numériques.";
    exit;
}

$noteInfo = (float) $noteInfo;
$noteMath = (float) $noteMath;

// Vérifier les limites des notes
if (
    $noteInfo < NOTE_MIN || $noteInfo > NOTE_MAX ||
    $noteMath < NOTE_MIN || $noteMath > NOTE_MAX
) {
    echo "Erreur : les notes doivent être comprises entre "
       . NOTE_MIN . " et " . NOTE_MAX . ".";
    exit;
}

// Protéger le nom avant l'affichage
$nomSecurise = htmlspecialchars($nom, ENT_QUOTES, "UTF-8");

$moyenne = ($noteInfo + $noteMath) / 2;

/* Exercice 5.1 : Écriture dans le fichier CSV */

$fichier = __DIR__ . "/data/notes.csv";

$fp = fopen($fichier, "a");

if ($fp === false) {
    echo "Erreur : impossible d'ouvrir le fichier CSV.";
    exit;
}

$enregistrement = [$nom, $noteInfo, $noteMath];

if (fputcsv($fp, $enregistrement, ";") === false) {
    fclose($fp);
    echo "Erreur lors de l'écriture dans le fichier CSV.";
    exit;
}

fclose($fp);

echo "Les notes ont été enregistrées avec succès.<br>";

echo "<h1>Récapitulatif des notes</h1>";
echo "Nom : " . $nomSecurise . "<br>";
echo "Note Informatique : " . $noteInfo . "<br>";
echo "Note Mathématiques : " . $noteMath . "<br>";
echo "Moyenne : " . $moyenne . "<br>";


?>
