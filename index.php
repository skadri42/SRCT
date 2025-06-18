<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_GET['success'])) {
    echo '<div class="success-message">Votre message a été envoyé avec succès !</div>';
}
if (isset($_GET['error'])) {
    echo '<div class="error-message">Une erreur est survenue lors de l\'envoi du message.</div>';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="SRCT – Suivez vos projets de codage, découvrez des tutoriels et gérez efficacement votre repertoire de scripts en ligne.">
  <title>SRCT</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>

<body>
 <header>
    <div class="container">
      <div class="header-content">
        <h1 class="logo">SRCT</h1>
        <nav>
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#realisations">Réalisations</a></li>
            <li><a href="#contact">Contact</a></li>
            <?php if (isset($_SESSION['utilisateur'])) : ?>
              <li>
                <a href="logout.php">Déconnexion (<?php echo htmlspecialchars($_SESSION['utilisateur']); ?>)</a>
              </li>
            <?php else : ?>
              <li><a href="login.html">Connexion</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <h2>Votre partenaire digital</h2>
      <p>Développement web, visibilité, et solutions sur mesure.</p>
    </div>
  </section>

  <section id="services" class="services">
    <div class="container">
      <h2>Nos Services</h2>
      <div class="service-grid">
        <div class="service">
          <div class="icon">🌐</div>
          <h3>Création de site</h3>
          <p>Sites vitrines, e-commerce ou sur-mesure adaptés à vos besoins.</p>
        </div>
        <div class="service">
          <div class="icon">📈</div>
          <h3>Référencement</h3>
          <p>Optimisation SEO/SEA pour améliorer votre visibilité en ligne.</p>
        </div>
        <div class="service">
          <div class="icon">💡</div>
          <h3>Stratégie digitale</h3>
          <p>Accompagnement sur mesure pour votre transformation numérique.</p>
        </div>
      </div>
    </div>
  </section>


  <section id="realisations" class="realisations">
    <div class="container">
      <h2>Nos Réalisations</h2>
      <p>Découvrez quelques projets réalisés pour nos clients.</p>

      <div class="realisations-grid">
        <div class="realisation-card">
          <a href="https://celianoli.github.io/celiancv" target="_blank"><img src="image/cvcelian.png"
              alt="Réalisation 1"></a>
          <div class="realisation-content">
            <h3>Site CV - Durand Célian</h3>
            <p>Un CV en ligne moderne avec des animations fluides et une mise en page responsive.</p>
          </div>
        </div>

        <div class="realisation-card">
          <a href="https://thomaslrpn.github.io/SiteCV" target="_blank"><img src="image/thomascv.png"
              alt="Réalisation 2"></a>
          <div class="realisation-content">
            <h3>Site CV - Larpin Thomas</h3>
            <p>Un CV professionnel avec une interface épurée et une navigation intuitive.</p>
          </div>
        </div>

        <div class="realisation-card">
          <a href="https://riri99-source.github.io/Riri99-sourceCV.github.io/" target="_blank"><img src="image/rita.png"
              alt="Réalisation 3"></a>
          <div class="realisation-content">
            <h3>Site CV - Riad Rita</h3>
            <p>Un CV créatif avec un design unique et une présentation dynamique des compétences.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="equipe" class="equipe">
    <div class="container">
      <h2>Notre Équipe</h2>
      <div class="equipe-grid">
        <div class="membre">
          <img src="./image/profil.jpg" alt="Célian">
          <p>Célian</p>
        </div>
        <div class="membre">
          <img src="image/thomasphoto.jpg" alt="Thomas">
          <p>Thomas</p>
        </div>
        <div class="membre">
          <img src="image/rita.jpg" alt="Rita">
          <p>Rita</p>
        </div>
        <div class="membre">
          <img src="image/samyphoto.jpg" alt="Samy">
          <p>Samy</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="contact-container">
      <h2>Contactez-nous</h2>
      <p>Vous avez une question ? N'hésitez pas à nous envoyer un message !</p>
      <div id="success-message" class="success-message" style="display: none;">Votre message a été envoyé avec succès !
      </div>
      <div id="error-message" class="error-message" style="display: none;">Une erreur est survenue lors de l'envoi du
        message.</div>
        <form action="send_mail.php" method="POST">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
      </form>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2025 SRCT - Tous droits réservés</p>
      <div class="footer-links">
        <a href="mentions-legales.html">Mentions Légales</a>
        <a href="politique-confidentialite.html">Politique de Confidentialité</a>
      </div>
    </div>
  </footer>

  <script>
    // Script pour le menu burger
    document.addEventListener('DOMContentLoaded', function () {
      const logo = document.querySelector('.logo');
      const nav = document.querySelector('nav');
      const navLinks = document.querySelectorAll('nav ul li a');

      logo.addEventListener('click', function () {
        nav.classList.toggle('active');
        logo.classList.toggle('active');
      });

      // Fermer le menu au clic sur un lien
      navLinks.forEach(link => {
        link.addEventListener('click', function () {
          nav.classList.remove('active');
          logo.classList.remove('active');
        });
      });
    });

    // Script existant pour l'envoi d'email
    function sendEmail(e) {
      e.preventDefault();

      const templateParams = {
        from_name: document.getElementById('name').value,
        from_email: document.getElementById('email').value,
        message: document.getElementById('message').value,
        to_email: 'celian.durand@epitech.eu,thomas.larpin@epitech.eu,rita.riad@epitech.eu,samy.benali@epitech.eu'
      };

      emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', templateParams)
        .then(function (response) {
          document.getElementById('success-message').style.display = 'block';
          document.getElementById('error-message').style.display = 'none';
          document.getElementById('contact-form').reset();
        }, function (error) {
          document.getElementById('error-message').style.display = 'block';
          document.getElementById('success-message').style.display = 'none';
        });

      return false;
    }
  </script>
</body>

</html>
