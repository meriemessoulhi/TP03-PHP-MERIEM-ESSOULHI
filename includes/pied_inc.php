/*
Auteur : Meriem Essoulhi
Objectif : Afficher le pied de page, la date du jour
et les informations liées aux dates.
Date : 18/10/2026
*/
<hr>
<footer>
    <p>TP PHP - <?php echo date("Y"); ?></p>
</footer>
</body>
</html>

<footer>
    <p>
        Date du jour :
        <?php echo date("d/m/Y"); ?>
    </p>
    
<?php
$aujourdhui = new DateTime();
$finSemestre = new DateTime("2027-01-31");

if ($aujourdhui > $finSemestre) {
    echo "<p>La date de fin du semestre est dépassée.</p>";
} else {
    $difference = $aujourdhui->diff($finSemestre);
    echo "<p>Jours restants avant la fin du semestre : "
        . $difference->days
        . "</p>";
}
?>

<h3>Vérifier une date</h3>

<form method="POST">
    <label>Jour :</label>
    <input type="number" name="jour" min="1" max="31" required>

    <label>Mois :</label>
    <input type="number" name="mois" min="1" max="12" required>

    <label>Année :</label>
    <input type="number" name="annee" min="1" required>

    <button type="submit" name="verifier">Vérifier la date</button>
</form>

<?php
if (isset($_POST["verifier"])) {
    $jour = filter_input(INPUT_POST, "jour", FILTER_VALIDATE_INT);
    $mois = filter_input(INPUT_POST, "mois", FILTER_VALIDATE_INT);
    $annee = filter_input(INPUT_POST, "annee", FILTER_VALIDATE_INT);

    if ($jour !== false && $jour !== null &&
        $mois !== false && $mois !== null &&
        $annee !== false && $annee !== null &&
        checkdate($mois, $jour, $annee)) {

        echo "<p>Date valide !</p>";
    } else {
        echo "<p>Date invalide !</p>";
    }
}
?>
</footer>
</body>
</html>

</footer>
</body>
</html>
