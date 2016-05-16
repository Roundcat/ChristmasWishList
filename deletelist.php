<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// on récupère tout le contenu de la table cadeau
$reponse = $connexion->query('SELECT * FROM liste WHERE uid =' . $uid);

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
            <legend>Vos listes</legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-offset-lg-2 col-lg-6">
              <p><strong><?php echo ($user['userfirstname']); ?></strong>, cliquez sur la liste à supprimer.<br/>
                Attention cette action est irréversible et vous perdrez toutes les données liées à cette liste.</p>
              </div>

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
                <div class="panel panel-primary">
                  <table class="table table-striped- table-condensed">
                    <div class="panel-heading">
                      <h3 class="panel-title">Mes listes</h3>
                    </div>
                    <thead>
                      <tr>
                        <th>Titre de la liste</th>
                        <th>Message accompagnant la liste</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while($donnees = $reponse->fetch()) { ?>
                        <tr>
                          <input type="hidden" name="listeid" value ="<?php echo htmlspecialchars ($donnees['listeid']); ?>">
                          <td><?php echo('<a href="deleteconfirmlist.php?listid=' . $donnees['listeid'] . '">' . htmlspecialchars($donnees['libelleliste']) . '</a>'); ?></td>
                          <td><?php echo htmlspecialchars ($donnees['descriptifliste']); ?></td>
                        </tr>
                        <input type="hidden" name="listeid" value ="<?php echo htmlspecialchars ($donnees['listeid']); ?>">
                    <?php  } ?>
                    </tbody>
                  </table>
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
