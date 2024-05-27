<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ministère De l'Education Tunisie</title>
  <link rel="stylesheet" href="css.css">
</head>
<body>
  <header>
    <img src="tun.png" alt="Logo de la Tunisie" aria-label="Logo de la Tunisie">
    <h1>Ministère De l'Education Tunisie En ligne</h1>
  </header>
  <main>
    <h2>Se connecter</h2>
    <h5>Administrateur/Directeur/Parent/Eleve </h5>
    <form action="Login.php" method="post">
      <label for="username">Identifiant:</label>
      <input type="text" id="username" name="username" required aria-describedby="usernameHelp">
      <small id="usernameHelp" class="form-text text-muted"></small>
      <label for="password">Mot de passe:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Se connecter</button>
      <?php
      // Vérification si le paramètre d'erreur est présent dans l'URL
      if(isset($_GET['error']) && $_GET['error'] == 1) {
          // Affichage du message d'erreur
          echo '<p style="color: red;">Identifiant ou mot de passe incorrect</p>';
      }
      ?>
      <a href="#" class="forgot-password">Mot de passe oublié ?</a>
    </form>
  </main>
  <footer>
    <p>Ministère de l'Éducation, Tunisie</p>
    <p>Copyright © 2024 Edunet Tous droits réservés.</p>
    <p>Centre national des technologies en éducation</p>
    <address>
      3, Rue Asdrubal, 1002 Lafayette - Tunis.<br>
      Tél: 71 833 800
    </address>
  </footer>
</body>
</html>
