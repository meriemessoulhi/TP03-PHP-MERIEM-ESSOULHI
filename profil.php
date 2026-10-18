/*
Auteur : Meriem Essoulhi
Objectif : Vérifier la session de l'utilisateur
et afficher son profil après connexion.
Date : 18/10/2026
*/
<?php
session_start();

$infosConnexion = [];

if (isset($_COOKIE["infos_connexion"])) {
    $infosConnexion = json_decode(
        $_COOKIE["infos_connexion"],
        true
    );
}

if (is_array($infosConnexion) && !empty($infosConnexion)) {
    echo "<p>Login du cookie : "
        . htmlspecialchars($infosConnexion["login"] ?? "", ENT_QUOTES, "UTF-8")
        . "</p>";

    echo "<p>Date de connexion : "
        . htmlspecialchars($infosConnexion["date_connexion"] ?? "", ENT_QUOTES, "UTF-8")
        . "</p>";
}


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = htmlspecialchars($_SESSION["login"], ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>

<h1>Bienvenue !</h1>

<p>Bonjour <?php echo $login; ?>, vous êtes connecté(e).</p>

<a href="deconnexion.php">Se déconnecter</a>

</body>
</html>
