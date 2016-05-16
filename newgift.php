<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];

$listeid = $_SESSION['listid'];
$giftname = addslashes($_REQUEST['giftname']);
$descriptgift = addslashes($_REQUEST['descriptgift']);

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

$connexion->exec('INSERT INTO cadeau(libellecadeau,
                                    descriptifcadeau,
                                    listeid)
                      VALUES (\'' . $giftname . '\',
                              \'' . $descriptgift . '\',
                                ' . $listeid . ')
                      ');

// on récupère tout le contenu de la table cadeau
$reponse = $connexion->query('SELECT * FROM cadeau WHERE cadeauid=LAST_INSERT_ID()');

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

      <?php include("header2.php"); ?>

      <?php include("menu2.php"); ?>

      <div class="site_body">

            <!-- Form Name -->
            <legend>Votre liste</legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-8">
              <p><strong><?php echo ($user['userfirstname']); ?></strong>, vous venez d'ajouter un cadeau à votre liste. Voici vos souhaits concernant cette liste.</p>
              </div>

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
                <div class="panel panel-primary">
                  <table class="table table-striped- table-condensed">
                    <div class="panel-heading">
                      <h3 class="panel-title">Le souhait que je viens d'ajouter</h3>
                    </div>
                    <thead>
                      <tr>
                        <th>Nom du souhait</th>
                        <th>Description du souhait</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo htmlspecialchars ($donnees['libellecadeau']); ?></td>
                        <td><?php echo htmlspecialchars ($donnees['descriptifcadeau']); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              <?php
              // on termine le traitement de la requête
              $reponse->closeCursor();
              ?>

            <br /></br /><br />

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-offset-lg-2 col-lg-8">
                <p>Pour ajouter un autre souhait de cadeaux, cliquez sur le bouton ci-dessous.</p>
                <br /><br />
              <!-- Button -->
                <div class="col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-2 col-lg-8">
                  <a href="ajoutersouhait.php"><button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-gift"></span> Ajouter un souhait</button></a>
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
