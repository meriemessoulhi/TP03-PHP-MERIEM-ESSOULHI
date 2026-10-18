/*
Auteur : Meriem Essoulhi
Objectif : Afficher l'en-tête commun des pages du site.
Date : 18/10/2026
*/
<?php
require_once __DIR__ . "/../config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo ETABLISSEMENT; ?></title>
</head>
<body>
    <header>
        <h1><?php echo ETABLISSEMENT; ?></h1>
        <p>Travaux pratiques PHP</p>
    </header>
