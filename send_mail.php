<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "durandcelian.14@icloud.com"; // Ton mail
    $sujet = "Nouveau message via le formulaire";
    $contenu = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $sujet, $contenu, $headers)) {
        // Redirection avec paramètre success
        header("Location: index.php?success=1");
        exit;
    } else {
        // Redirection avec paramètre erreur
        header("Location: index.php?error=1");
        exit;
    }
}
?>
