<?php

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// Requête qui va compter le nombre de login ayant pour login celui rentré
$log = $connexion->query('SELECT COUNT(login) FROM utilisateur WHERE login =' . $_REQUEST['login']);

if($log > 1) { // si le login est dans la table affiche une boite de dialogue

  echo ('<script type="text/javascript">' . 'alert("Ce surnom est déjà utilisé !\n Veuillez en choisir un autre.");' . 'window.location.replace("creercompte.php");' . '</script>');

} else {

$username = addslashes($_REQUEST['nom']);
$userfirstname = addslashes($_REQUEST['prenom']);
$login = addslashes($_REQUEST['login']);
$usermail = addslashes($_REQUEST['email']);
$password = addslashes($_REQUEST['motdepasse_1']);

// Requête d'insertion du nouvel utilisateur
$connexion->exec('INSERT INTO utilisateur(genre,
                                          username,
                                          userfirstname,
                                          login,
                                          usermail,
                                          password)
                  VALUES (' . $_REQUEST['radios'] . ',
                          \'' . $username . '\',
                          \'' . $userfirstname . '\',
                          \'' . $login . '\',
                          \'' . $usermail . '\',
                          \'' . $password . '\')');
}

// on récupère tout le contenu de la table utilisateur
$reponse = $connexion->query('SELECT * FROM utilisateur WHERE uid=LAST_INSERT_ID()');

// on affiche chaque entrée une à une
$donnees = $reponse->fetch();

session_start();

$_SESSION['user'] = $donnees;
$user = $_SESSION['user'];
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
        <legend>Vos informations personnelles</legend>

        <div class="row">

          <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
            <p><strong><?php echo ($user['userfirstname']); ?></strong>, voici les informations que vous avez enregistrées.
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

          <br/><br/><br/>

          <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
            <p><strong><?php echo ($user['userfirstname']); ?></strong>, vous êtes maintenant enregistrés sur <strong>Christmas Wish List</strong>.<br />
            <p>Créer votre première liste de souhait en cliquant dans le menu en haut sur " créer une liste ".</p>
          </div>

        </div>

        <hr>
        <?php include("footer.php"); ?>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
