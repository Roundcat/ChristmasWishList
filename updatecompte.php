<?php

session_start();

if(isset($_SESSION['user']) == "") {
  header('Location: authentification.php');
}
$user = $_SESSION['user'];
$uid = $user['uid'];

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

$connexion->exec('UPDATE utilisateur SET username = \'' . $_REQUEST['nom'] . '\',
                                      userfirstname = \'' . $_REQUEST['prenom'] . '\',
                                      login = \'' . $_REQUEST['login'] . '\',
                                      usermail = \'' . $_REQUEST['email'] . '\',
                                      password = \'' . $_REQUEST['motdepasse_1'] . '\'
                                      WHERE uid = ' .$uid);

// on récupère tout le contenu de la table cadeau
$reponse = $connexion->query('SELECT * FROM utilisateur WHERE uid =' . $uid);

// on affiche chaque entrée une à une
$donnees = $reponse->fetch();

$_SESSION['user']['password'] = $donnees['password'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Arnaud Charron">
    <link rel="icon" href="img/favicon.ico">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      [class*="col"] { margin-bottom: 20px; }
        img { width: 100%; }
    </style>
    <title>Christmas Wish List</title>
  </head>

  <body>
    <div class="container">

      <?php include("header2.php"); ?>

      <?php include("menu2.php"); ?>

      <div class="site_body">

            <!-- Form Name -->
            <legend>Vos informations personnelles</legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
                <p>Après modification, voici vos nouvelles informations enregistrées.
                  Notez bien vos informations de connexion (votre e-mail et mot de passe) qui vous seront demandés pour accéder à l'ensemble du site.</p>
              </div>

              <div class="col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                <ul class="list-group">
                  <li class="list-group-item"><strong>Votre nom</strong> : <?php echo htmlspecialchars ($donnees['username']); ?> </li>
                  <li class="list-group-item"><strong>Votre prénom</strong> : <?php echo htmlspecialchars ($donnees['userfirstname']); ?> </li>
                  <li class="list-group-item"><strong>Votre surnom</strong> : <?php echo htmlspecialchars ($donnees['login']); ?> </li>
                  <li class="list-group-item"><strong>Votre e-mail</strong> : <?php echo htmlspecialchars ($donnees['usermail']); ?> </li>
                  <li class="list-group-item"><strong>Votre mot de passe</strong> : <?php echo htmlspecialchars ($donnees['password']); ?></li>
                </ul>
              </div>

              <?php
              // on termine le traitement de la requête
              $reponse->closeCursor();
              ?>

              </div>

            </div>
          </div>

      <hr>
      <?php include("footer.php"); ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
