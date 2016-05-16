<?php
session_start();
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

      <?php
      if(isset($_SESSION['user']) == "") {
        include("header.php");
      } else {
        include("header2.php");
      }
      ?>

      <?php
      if(isset($_SESSION['user']) == "") {
        include("menu.php");
      } else {
        include("menu2.php");
      }
      ?>

      <?php if(array_key_exists('errors', $_SESSION)): ?>
        <div class="alert alert-danger">
          <?= implode('<br />', $_SESSION['errors']); ?>
        </div>
      <?php endif; ?>

      <?php if(array_key_exists('success', $_SESSION)): ?>
        <div class="alert alert-success">
          Votre email a bien été envoyé
        </div>
      <?php endif; ?>

      <div class="site_body" id="body">
        <form class="form-horizontal" action="postcontact.php" method="post">
        <fieldset>

        <!-- Form Name -->
        <legend>Me contacter</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputname">Votre nom</label>
          <div class="col-md-5">
          <input id="inputname" name="name" placeholder="votre nom" class="form-control input-md" required="" type="text" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputmail">Votre email</label>
          <div class="col-md-5">
          <input id="inputmail" name="mail" placeholder="votre e-mail" class="form-control input-md" required="" type="text" value="<?= isset($_SESSION['inputs']['mail']) ? $_SESSION['inputs']['mail'] : ''; ?>">

          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputmessage">Votre message</label>
          <div class="col-md-5">
            <textarea class="form-control" id="inputmessage" name="message"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="button1id"></label>
          <div class="col-md-8">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span> Valider</button>
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
