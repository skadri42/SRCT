<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>


<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'SRCT';
$user = 'dba';       // Remplace si tu as un autre utilisateur, ex : 'webuser'
$password = 'ghjk';       // Mets ici le bon mot de passe

try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Affichage de l'erreur en cas de problème de connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
