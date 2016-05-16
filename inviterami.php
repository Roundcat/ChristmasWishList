<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$usermail = $user['usermail'];
$uid = $user['uid'];

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

          <form class="form-horizontal" method="post" action="postinvitami.php">
            <fieldset>
              <!-- Form Name -->
              <legend>Inviter un ami</legend>
              <div class="form-group">
              <div class="col-md-offset-3 col-md-6">
                <p>Veuillez remplir les trois champs ci-dessous pour inviter un ami à venir voir votre liste de souhait et pourquoi pas en réserver un.</p>
              </div>
            </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="mymail">Mon adresse e-mail</label>
                <div class="col-md-5">
                  <input id="mymail" name="mymail" class="form-control input-md" required="" type="text" value="<?=$_SESSION['user']['usermail']?>">
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="friendmail">L'adresse e-mail de mon ami</label>
                <div class="col-md-5">
                  <input id="friendmail" name="friendmail" placeholder="E-mail de mon ami" class="form-control input-md" required="" type="text">
                </div>
              </div>
              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="msginvit">Message pour mon ami</label>
                <div class="col-md-5">
                  <textarea class="form-control" id="friend_msg_invit" name="friend_msg_invit">Bonjour, viens voir la liste que j'ai envoyée au Père Noël. Inscris-toi sur ChristmasWishList</textarea>
                </div>
              </div>
              <!-- Button -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="buttonSubmitMsg"></label>
                <div class="col-md-4">
                  <button id="buttonValideListe" name="buttonValideListe" class="btn btn-success" type="submit"><span class="glyphicon glyphicon-envelope"></span> Envoyer</button>
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
  </body>
</html>

<?php
  unset($_SESSION['inputs']);
  unset($_SESSION['success']);
  unset($_SESSION['errors']);
?>
