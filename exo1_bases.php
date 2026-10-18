
<?php
// Commentaire sur une ligne
# Un autre commentaire

/*
Auteur : Meriem Essoulhi
Objectif : Découvrir les bases du langage PHP, les variables,
les chaînes de caractères et les instructions d'affichage.
Date : 18/10/2026
*/
echo 'Hello PHP';
?>

<?php
// Exercice 1.1 : Noms de variables
// $x : valide, car le nom commence par une lettre.
$x = 10;

// $_x : valide, car le nom peut commencer par un underscore.
$_x = 20;

// $2x : invalide, car un nom de variable ne peut pas commencer par un chiffre.

// $x-y : invalide comme nom de variable unique, car le tiret est interdit.

// $Prix_HT : valide, car les lettres et le underscore sont autorisés.
$Prix_HT = 100;

// $prix ht : invalide, car un nom de variable ne peut pas contenir un espace.

// $état : valide en PHP 8, mais il est préférable d'utiliser des noms sans accents.
$état = "Maroc";

// Démontrer que $a et $A sont deux variables distinctes.
$a = 5;
$A = 15;

echo "Valeur de a : " . $a . "<br>";
echo "Valeur de A : " . $A . "<br>";





// Exercice 1.2 : Constantes

require "config.php";

echo "<hr>";
echo "Etablissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil de réussite : " . SEUIL . "<br>";

// Tester si les constantes existent.
var_dump(defined("SEUIL"));
echo "<br>";

var_dump(defined("INCONNUE"));
echo "<br>";

// Si on affiche une constante non définie,
// PHP produit généralement une erreur de type Error.
// Il faut vérifier son existence avant de l'utiliser.

// const définit une constante directement dans le code.
// define() définit une constante à l'exécution.
// define() permet aussi de définir une constante avec un nom construit dynamiquement.


 // Exercice 1.3 : Calcul du prix TTC

$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " €.";

 // Exercice 1.4 : Types et conversions

echo "<hr>";
echo "<h3>1. Conversion en string</h3>";

$test = 42;
$test = (string) $test;

var_dump($test);
echo "<br>";

echo "<h3>2. Conversion en booléen</h3>";

var_dump((bool) 0);
echo "<br>";
var_dump((bool) 0.0);
echo "<br>";
var_dump((bool) "0");
echo "<br>";
var_dump((bool) "");
echo "<br>";
var_dump((bool) "abc");
echo "<br>";
var_dump((bool) []);
echo "<br>";
var_dump((bool) null);
echo "<br>";

echo "<h3>3. Conversions numériques</h3>";

var_dump((int) 3.9);
echo "<br>";
var_dump((int) "12abc");
echo "<br>";
var_dump((float) "1.5e3");
echo "<br>";
var_dump((int) true);
echo "<br>";

echo "<hr>";
echo "<h3>Exercice 1.5 : Chaînes de caractères</h3>";

$traitees = "égales à";
$ici = 2;

// 1. Guillemets simples et doubles
echo "Ahmed a dit : \"J'ai réussi\"";
echo "<br>";

// 2. Afficher les caractères spéciaux
echo "Voulez-vous supprimer C:\\*.*?";
echo "<br>";

// 3. Afficher \n tel quel
echo "Ceci n'affichera pas \\n de nouvelle ligne";
echo "<br>";

// 4. Variables non interprétées
echo 'Les variables ne seront pas $traitees $ici';
echo "<br>";

// 5. Variables interprétées
echo "Les variables seront $traitees $ici";
echo "<br>";

// Retirer les * au début et à la fin
$chaine = "*Bonjour les développeurs*";
echo trim($chaine, "*");
echo "<br>";

// Afficher chaque lettre sur une ligne différente
$mot = "PHP";

for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}

?>
