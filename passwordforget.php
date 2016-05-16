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

      <?php include("header.php"); ?>

      <?php include("menu.php"); ?>

      <div class="site_body">
        <legend>Mot de passe oublié</legend>

        <div class="row">

          <div class="col-sm-12 col-md-offset-3 col-md-8 col-offset-lg-3 col-lg-6">
            <p>Vous avez perdu votre mot de passe !!</p>
            <p>Vous êtes au bon endroit.</p>
            <p>Ne vous inquiétez pas.</p>
            <p>Remplissez le formulaire ci-dessous et vous recevrez un mail avec vos informations de connexion.</p>

          </br></br>

          <form method="post" action="recuppwd.php">
            <!-- Text input -->
            <div class="form-group">
              <label class="col-md-4 control-label">Adresse e-mail</label>
              <div class="col-md-5">
                <input type="text" name="email" placeholder="votre e-mail" class="form-control input-md" required="">
              </div>
            </div>
            <!-- Button -->
            <div class="form-group">
              <div class="col-md-offset-4 col-md-4">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-envelope"></span> Envoyer</button>
              </div>
            </div>
          </form>

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
