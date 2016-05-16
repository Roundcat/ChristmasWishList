<?php

session_start();

if(isset($_SESSION['user']) == "") {
  header('Location: authentification.php');
}
$user = $_SESSION['user'];
$uid = $user['uid'];
$listeid = $_SESSION['listid'];
$listname = addslashes($_REQUEST['listname']);
$descriptlist = addslashes($_REQUEST['descriptlist']);

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// Requête de mise à jour des éléments de la liste $listeid
$connexion->exec('UPDATE liste SET libelleliste = \'' . $listname . '\',
                                      descriptifliste = \'' . $descriptlist . '\'
                                      WHERE listeid = ' .$listeid);

// on récupère tout le contenu de la table liste
$reponse = $connexion->query('SELECT * FROM liste WHERE listeid =' . $listeid);

// on affiche chaque entrée une à une
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

      <?php include("header2.php"); ?>

      <?php include("menu2.php"); ?>

      <div class="site_body">

            <legend>Modification de la liste : <?php echo htmlspecialchars ($donnees['libelleliste']); ?></legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-2  col-md-8 col-offset-lg-3 col-lg-6">
                <p>Après modification, voici les nouvelles informations de la liste <strong><?php echo htmlspecialchars ($donnees['libelleliste']); ?></strong>.</p>
              </div>

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
                <div class="panel panel-primary">
                  <table class="table table-striped- table-condensed">
                    <div class="panel-heading">
                      <h3 class="panel-title">Les informations de la liste</h3>
                    </div>
                    <thead>
                      <tr>
                        <th>Titre de la liste</th>
                        <th>Message accompagnant la liste</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo htmlspecialchars ($donnees['libelleliste']); ?></td>
                        <td><?php echo htmlspecialchars ($donnees['descriptifliste']); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <?php
              // on termine le traitement de la requête
              $reponse->closeCursor();
              ?>

            </div>

      </div>

      <hr>
      <?php include("footer.php"); ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
