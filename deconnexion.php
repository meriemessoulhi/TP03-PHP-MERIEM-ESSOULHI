/*
Auteur : Meriem Essoulhi
Objectif : Fermer la session de l'utilisateur
et rediriger vers la page de connexion.
Date : 18/10/2026
*/
<?php
session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;
