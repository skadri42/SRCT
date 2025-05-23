<?php
// inscription.php

// Connexion à la base PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "SRCT";
$user = "postgres";
$password = "postgres";

$conn_str = "host=$host port=$port dbname=$dbname user=$user password=$password";

try {
    $db = new PDO("pgsql:$conn_str");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base : " . $e->getMessage());
}

// Récupération et validation des données POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST["nom"] ?? "");
    $prenom = trim($_POST["prenom"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telephone = trim($_POST["telephone"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm-password"] ?? "";
    $conditions = $_POST["conditions"] ?? "";

    // Vérification des champs obligatoires
    if (!$nom || !$prenom || !$email || !$password || !$confirm_password || !$conditions) {
        die("Tous les champs obligatoires doivent être remplis et les conditions acceptées.");
    }

    // Vérification que les mots de passe correspondent
    if ($password !== $confirm_password) {
        die("Les mots de passe ne correspondent pas.");
    }

    // Vérification que l'email n'existe pas déjà
    $sqlCheck = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
    $stmtCheck = $db->prepare($sqlCheck);
    $stmtCheck->execute(['email' => $email]);
    if ($stmtCheck->fetchColumn() > 0) {
        die("Cette adresse email est déjà utilisée.");
    }

    // Hashage du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertion dans la base
    $sqlInsert = "INSERT INTO utilisateurs (nom, prenom, email, telephone, password) VALUES (:nom, :prenom, :email, :telephone, :password)";
    $stmtInsert = $db->prepare($sqlInsert);
    $stmtInsert->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'telephone' => $telephone,
        'password' => $passwordHash
    ]);

    echo "Inscription réussie ! Vous pouvez maintenant <a href='login.html'>vous connecter</a>.";
} else {
    echo "Méthode non autorisée.";
}

