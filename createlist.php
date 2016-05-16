<?php
session_start();

if(isset($_SESSION['user']) == "") {
  header('Location: authentification.php');
}
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

      <div class="site_body" id="body">
        <form method="post" action="newlist.php" class="form-horizontal">
          <fieldset>
            <!-- Form Name -->
            <legend>Créer ma liste</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="listname">Titre de la liste (requis)</label>
              <div class="col-md-5">
                <input id="listname" name="listname" placeholder="ma liste de Noël" class="form-control input-md" required="" type="text" maxlength="64">

              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="descriptlist">Message accompagnant ma liste</label>
              <div class="col-md-5">
                <textarea class="form-control" id="descriptlist" name="descriptlist" rows=10 onkeypress="javascript:MaxLengthTextArea(this, 255);"></textarea>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="buttonValideListe"></label>
              <div class="col-md-4">
                <button id="creerliste" name="creerliste" class="btn btn-success"><span class="glyphicon glyphicon-th-list"></span> Créer ma liste</button>
                <a href="index.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Annuler</button></a>
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
