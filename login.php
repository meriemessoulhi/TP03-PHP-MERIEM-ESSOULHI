
<?php
/*
Auteur : Meriem Essoulhi
Objectif : Permettre à un utilisateur de se connecter.
Date : 18/10/2026
*/
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");

    if ($login !== "") {
        // Créer la session
        $_SESSION["login"] = $login;

        // Exercice 6.2 : créer un cookie valable 24 heures
        setcookie("dernier_login", $login, time() + 86400, "/");

        // Variante : stocker le login et la date dans un seul cookie
        $informations = [
            "login" => $login,
            "date_connexion" => date("Y-m-d H:i:s")
        ];

        setcookie(
            "infos_connexion",
            json_encode($informations),
            time() + 86400,
            "/"
        );

        header("Location: profil.php");
        exit;
    }

    $erreur = "Veuillez saisir votre login.";
}

// Préremplir le champ avec le dernier login enregistré
$dernierLogin = $_COOKIE["dernier_login"] ?? "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<?php
if (isset($erreur)) {
    echo "<p>" . htmlspecialchars($erreur, ENT_QUOTES, "UTF-8") . "</p>";
}
?>

<form method="POST" action="login.php">
    <label for="login">Votre login :</label>

    <input
        type="text"
        id="login"
        name="login"
        value="<?php echo htmlspecialchars($dernierLogin, ENT_QUOTES, 'UTF-8'); ?>"
        required
    >

    <button type="submit">Se connecter</button>
</form>

</body>
</html>
