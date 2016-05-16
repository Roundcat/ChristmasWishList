<?php

$usermail = $_REQUEST['email'];
// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// Requête pour appeler les informations de l'utilisateur ayant l'adresse email
$reponse = $connexion->query('SELECT * FROM utilisateur WHERE usermail = \'' . $_REQUEST['email'] . '\'');

// on va chercher la réponse à la requête
$donnees = $reponse->fetch();
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

      <?php include("header.php"); ?>

      <?php include("menu.php"); ?>

      <div class="site_body">

        <legend>Vos identifiants de connexion</legend>

        <div class="row">

          <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
            <p>Voici vos identifiants de connexion.
                Notez-les bien, ils vous seront demandés pour accéder à l'ensemble du site.</p>
          </div>

          <div class="col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8">
            <p><strong>Votre e-mail</strong> : <?php echo htmlspecialchars ($donnees['usermail']); ?> <br/>
              <strong>Votre mot de passe</strong> : <?php echo htmlspecialchars ($donnees['password']); ?></p>
          </div>

          <?php
          // on termine le traitement de la requête
          $reponse->closeCursor();
          ?>

          <br/><br/><br/>

          <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
            <p>Vous pouvez vous connecter à nouveau sur <strong>Christmas Wish List</strong>.<br/>
            <p>Accéder au formaulaire de connexion en cliquant sur le bouton ci-dessous :</p>
            <br/><br/>
            <!-- Button -->
            <div class="col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-2 col-lg-8">
              <a href="authentification.php"><button type="" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-user"></span> Se connecter</button></a>
            </div>
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
