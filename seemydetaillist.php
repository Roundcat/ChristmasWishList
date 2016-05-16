<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];
$listeid = $_GET['listid'];
$_SESSION['listid'] = $listeid;
// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// on récupère tout le contenu de la table cadeau
$reponse = $connexion->query('SELECT libelleliste, descriptifliste FROM liste WHERE listeid =' . $listeid);
$donnees = $reponse->fetch();

$req = $connexion->query('SELECT * FROM cadeau WHERE listeid =' . $listeid);
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
            <legend>Détails de votre liste : <?php echo htmlspecialchars ($donnees['libelleliste']); ?></legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-offset-lg-2 col-lg-6">
              <p><strong><?php echo ($user['userfirstname']); ?></strong>, retrouvez les informations de la liste <strong><?php echo htmlspecialchars ($donnees['libelleliste']); ?></strong>.</p>
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
                  <div class="panel panel-primary">
                    <table class="table table-striped- table-condensed">
                      <div class="panel-heading">
                        <h3 class="panel-title">Les souhaits de la liste</h3>
                      </div>
                      <thead>
                        <tr>
                          <th>Nom du souhait</th>
                          <th>Description du souhait</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      while($gift = $req->fetch()) { ?>
                        <tr>
                          <td><?php echo htmlspecialchars($gift['libellecadeau']); ?></td>
                          <td><?php echo htmlspecialchars ($gift['descriptifcadeau']); ?></td>
                        </tr>
                        <?php  } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

              <?php
              // on termine le traitement de la requête
              $reponse->closeCursor();
              ?>
              <!-- Button -->
              <div class="col-sm-12 col-md-offset-3 col-md-3">
                <a href="ajoutersouhait.php"><button class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-gift"></span> Ajouter un souhait</button></a>
              </div>
              <div class="col-sm-12 col-md-offset-1 col-md-3">
                <a href="modifylist.php"><button class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-gift"></span> Modifier la liste</button></a>
              </div>
              <!-- Préparation du bouton pour imprimer une liste
              <div class="col-sm-12 col-md-offset-1 col-md-3">
                <a href="imprimlistpdf.php"><button class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-print"></span> Imprimer la liste</button></a>
              </div> -->

            </div>
          </div>

      <hr>
      <?php include("footer.php"); ?>

      </div>
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>
