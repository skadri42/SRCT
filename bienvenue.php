<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: login.html"); // Redirige si l'utilisateur n'est pas connecté
    exit;
}
$nom = $_SESSION['utilisateur'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <meta http-equiv="refresh" content="0.5;url=index.php">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            background-color: #f0f0f0;
        }
        .message {
            font-size: 2em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="message">Bienvenue <?= htmlspecialchars($nom) ?> !</div>
</body>
</html>
