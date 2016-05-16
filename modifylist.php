<?php
session_start();

if(isset($_SESSION['user']) == "") {
  header('Location: authentification.php');
}
$user = $_SESSION['user'];
$listeid = $_SESSION['listid'];

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// on récupère tout le le libellé de la table liste que l'on veut modifier
$reponse = $connexion->query('SELECT libelleliste, descriptifliste FROM liste WHERE listeid =' . $listeid);

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

      <div class="site_body" id="body">

        <legend>Modifier la liste : <?php echo htmlspecialchars ($donnees['libelleliste']); ?></legend>

        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12">
            <p><strong><?php echo ($user['userfirstname']) ?></strong>, vous pouvez modifier les informations concernant la liste <strong><?php echo htmlspecialchars ($donnees['libelleliste']); ?></strong>
              que vous avez enregistré sur <strong>Christmas Wish List</strong>.</p>
          </div>

          <form class="form-horizontal" action="updatelist.php" method="post">
            <fieldset>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Titre de la liste</label>
                <div class="col-md-5">
                  <input name="listname" value="<?php echo htmlspecialchars ($donnees['libelleliste']); ?>" class="form-control input-md" type="text">
                </div>
              </div>

              <!-- Text textarea-->
              <div class="form-group">
                <label class="col-md-4 control-label">Message accompagnant ma liste</label>
                <div class="col-md-5">
                  <textarea id="descriptlist" name="descriptlist" class="form-control" rows=10 onkeypress="javascript:MaxLengthTextArea(this, 255);"><?php echo htmlspecialchars ($donnees['descriptifliste']); ?></textarea>
                </div>
              </div>

              <!-- Button (double) -->
              <div class="form-group">
                <div class="col-sm-12 col-md-offset-4 col-md-5 col-lg-offset-4 col-lg-5">
                  <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-edit"></span> Modifier la liste</button>
                  <a href="index.php"><button class="btn btn-danger" onclick="redirectionIndex()"><span class="glyphicon glyphicon-remove-circle"></span> Annuler</button></a>
                </div>
              </div>

            </fieldset>
          </form>

          </div>
        </div>
      </div>
      </div>

      <hr>
      <?php include("footer.php"); ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>

  </body>
</html>
