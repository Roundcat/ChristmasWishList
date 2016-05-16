<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];
$listeid = $_GET['listid'];

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// on récupère tout le contenu de la table cadeau
$reponse = $connexion->exec('DELETE FROM liste WHERE listeid =' . $listeid);

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
            <legend>Suppression d'une liste</legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-offset-lg-2 col-lg-6">
                <p><strong><?php echo ($user['userfirstname']); ?></strong>, la liste vient d'être supprimée.</p>
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
