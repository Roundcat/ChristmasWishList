<?php
session_start();

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];
$listname = addslashes($_REQUEST['listname']);
$descriptlist = addslashes($_REQUEST['descriptlist']);

// on insère dans la table liste la nouvelle liste
$connexion->exec('INSERT INTO liste(libelleliste,
                                    descriptifliste,
                                    uid)
                  VALUES (\'' . $listname . '\',
                          \'' . $descriptlist . '\',
                          ' . $uid . ')');

// on récupère tout le contenu de la table cadeau
$reponse = $connexion->query('SELECT * FROM liste WHERE listeid=LAST_INSERT_ID()');

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

            <!-- Form Name -->
            <legend>Votre liste</legend>

            <div class="row">

              <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
              <p><strong><?php echo ($user['userfirstname']); ?></strong>, vous venez de créer une liste de souhait de cadeaux pour Noël sur <strong>Christmas Wish List</strong>.<br />
                Voici les informations concernant cette liste que vous venez de créer.</p>
              </div>

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
                <div class="panel panel-primary">
                  <table class="table table-striped- table-condensed">
                    <div class="panel-heading">
                      <h3 class="panel-title">La nouvelle liste que je viens de créer</h3>
                    </div>
                    <thead>
                      <tr>
                        <th>Titre de la liste</th>
                        <th>Description accompagnant la liste</th>
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
                <!-- Récupération de l'identifiant de la liste -->
                <input type="hidden" name="listeid" value ="<?php echo htmlspecialchars ($donnees['listeid']); ?>">


              <?php
              $_SESSION['listid'] = $donnees['listeid'];
              // on termine le traitement de la requête
              $reponse->closeCursor();
              ?>

            <br/><br/>

              <div class="col-sm-12 col-md-offset-2 col-md-8 col-offset-lg-2 col-lg-8">
                <p>Pour ajouter vos souhaits de cadeaux, cliquez sur le bouton ci-dessous.</p>
                <br/><br/>
              <!-- Button -->
                <div class="col-sm-12 col-md-offset-4 col-md-8 col-lg-offset-2 col-lg-8">
                  <?php echo('<a href="ajoutersouhait.php?listid=' . $donnees['listeid'] . '"><button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-gift"></span> Ajouter un souhait</button></a>'); ?>
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
