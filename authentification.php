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
    <script type="text/javascript" src="js/function.js"></script>
    <title>Christmas Wish List</title>
  </head>

  <body>
    <div class="container">

      <?php include("header.php"); ?>

      <?php include("menu.php"); ?>

      <div class="site_body">
        <fieldset>

          <legend>Identifiez-vous</legend>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">

                <!-- Section pour accéder au formulaire de création de compte -->
                <div class="col-md-6 col-lg-5" id="creer_compte">
                  <h1 id="title_identifier">Créer mon compte</h1><hr>
                  <p>Si vous n'êtes pas encore inscrit sur <strong>Christmas Wish List</strong>, merci de cliquer sur ce bouton :</p><br>
                  <!-- Bouton accés à la page du formulaire d'inscription -->
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
                      <a href="creercompte.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Créer votre compte</button></a>
                    </div>
                  </div>
                </div>

                <!-- Section pour se connecter -->
                <div class="col-md-6 col-lg-5" id="deja_inscrit">
                  <form class="form-horizontal" method="post" action="connexion.php">
                    <h1 id="title_identifier">Déjà inscrit ?</h1><hr>
                    <!-- Champ texte adresse email -->
                    <div class="form-group">
                      <label class="col-xs-12 col-sm-12 col-md-4 control-label">Adresse e-mail</label>
                      <div class="col-xs-12 col-sm-12 col-md-5">
                        <input type="text" id="usermail" name="usermail" placeholder="votre e-mail" class="form-control input-md" required="">
                      </div>
                    </div>
                    <!-- Champ texte Password -->
                    <div class="form-group">
                      <label class="col-xs-12 col-sm-12 col-md-4 control-label">Mot de passe</label>
                      <div class="col-xs-12 col-sm-12 col-md-5">
                        <input type="password" id="password" name="password" placeholder="votre mot de passe" class="form-control input-md" required="">
                        <a href="passwordforget.php"><span class="help-block">Mot de passe oublié ?</span></a>
                      </div>
                    </div>
                    <!-- Bouton de soumission du formulaire -->
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4">
                        <button type="submit" class="btn btn-success" onclick="connexion()"><span class="glyphicon glyphicon-user"></span> Connexion</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

          </fieldset>
      </div>

      <hr>
      <?php include("footer.php"); ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
