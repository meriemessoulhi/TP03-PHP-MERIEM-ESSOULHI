/*
Auteur : Meriem Essoulhi
Objectif : Récupérer et afficher les données d'un formulaire
en utilisant la méthode GET.
Date : 18/10/2026
*/
<?php
$nom = htmlspecialchars($_GET["nom"] ?? "", ENT_QUOTES, "UTF-8");
$prenom = htmlspecialchars($_GET["prenom"] ?? "", ENT_QUOTES, "UTF-8");
$sexe = $_GET["sexe"] ?? "";

if ($nom === "" || $prenom === "") {
    echo "Veuillez remplir le nom et le prénom.";
} elseif ($sexe === "M") {
    echo "Bonjour Monsieur " . $prenom . " " . $nom;
} elseif ($sexe === "F") {
    echo "Bonjour Madame " . $prenom . " " . $nom;
} else {
    echo "Veuillez choisir un sexe valide.";
}
?>
