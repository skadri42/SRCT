<?php
require_once 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    $conditions = isset($_POST['conditions']);

    if ($password !== $confirmPassword) {
        die("Les mots de passe ne correspondent pas.");
    }

    if (!$conditions) {
        die("Vous devez accepter les conditions d'utilisation.");
    }

    // Vérification de l'unicité de l'email
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->fetchColumn() > 0) {
        die("Cet email est déjà utilisé.");
    }

    

    // Insertion en base de données
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, telephone, mot_de_passe)
                           VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe)");
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'telephone' => $telephone,
        'mot_de_passe' => $password
    ]);

    header("Location: login.html");
    exit;
}
?>

