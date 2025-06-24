<?php
// Connexion à MySQL
$host = 'localhost';
$dbname = 'SRCT';
$user = 'dba';
$password = 'ghjk'; // modifie si besoin

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$mdp = $_POST['password'] ?? '';
$confirm = $_POST['confirm-password'] ?? '';

if ($mdp !== $confirm) {
    die("Les mots de passe ne correspondent pas.");
}

$hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

// Insertion dans la table users
try {
    $sql = "INSERT INTO users (username, prenom, email, telephone, password) 
            VALUES (:username, :prenom, :email, :telephone, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':telephone' => $telephone,
        ':password' => $hashedPassword
    ]);

       // Redirection vers la page login après inscription réussie
    header("Location: login.html"); // Remplace login.php par la bonne URL
    exit; // Important : arrêter le script après redirection
    // header("Location: confirmation.html");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
