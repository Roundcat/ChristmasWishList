<?php
session_start();

if(isset($_SESSION['user']) == "") {
  header('Location: authentification.php');
}

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

$user = $_SESSION['user'];
$listeid = $_SESSION['listid'];

// on récupère tout le le libellé de la table liste où l'on veut ajouter un cadeau
$reponse = $connexion->query('SELECT libelleliste FROM liste WHERE listeid =' . $listeid);

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

        <form method="post" action="newgift.php" class="form-horizontal">
          <fieldset>

            <legend>Ajouter un souhait dans la liste : <?php echo htmlspecialchars ($donnees['libelleliste']); ?></legend>

            <div class="col-sm-12 col-md-offset-2 col-md-8 col-offset-lg-2 col-lg-8">
              <p><strong><?php echo ($user['userfirstname']); ?></strong>, remplissez ce formulaire pour ajouter un souhait de cadeau à la liste <strong><?php echo htmlspecialchars ($donnees['libelleliste']); ?></strong>.</p>
            </div>

            <!-- Champ texte nom du souhait -->
            <div class="form-group">
              <label class="col-md-4 col-lg-4 control-label" for="giftname">Le souhait désiré pour Noël</label>
              <div class="col-md-4 col-lg-4">
                <input id="giftname" name="giftname" placeholder="nom du souhait" class="form-control input-md" required="" type="text" maxlength="64">
              </div>
            </div>

            <!-- Textarea descriptif du souhait-->
            <div class="form-group">
              <label class="col-md-4 col-lg-4 control-label" for="descriptgift">Description de mon souhait</label>
              <div class="col-md-4 col-lg-4">
                <textarea class="form-control" id="descriptgift" name="descriptgift" cols="20" onkeypress="javascript:MaxLengthTextArea(this, 255);"></textarea>
              </div>
            </div>

            <!-- Bouton d'action pour ajouter le souhait -->
            <div class="form-group">
              <label class="col-md-4 col-lg-4 control-label" for="addgift"></label>
              <div class="col-md-4 col-lg-4">
                <button id="addgift" name="addgift" class="btn btn-success"><span class="glyphicon glyphicon-gift"></span> Ajouter le souhait</button>
              </div>
            </div>

          </fieldset>
        </form>

      </div>

      <hr>
      <?php include("footer.php"); ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>
  </body>
</html>
