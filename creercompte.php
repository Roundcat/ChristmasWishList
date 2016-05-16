<!DOCTYPE html>
<html lang="en">
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

        <legend>Créer un compte</legend>
        <form name="inscription" class="form-horizontal" action="inscription.php" method="post" onsubmit="return validation(this);">
          <fieldset>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="radios">Civilité</label>
              <div class="col-md-4">
                <label class="radio-inline" for="radios-0">
                  <input name="radios" value="0" checked="checked" type="radio">
                  Monsieur
                </label>
                <label class="radio-inline" for="radios-1">
                  <input name="radios" value="1" type="radio">
                  Madame
                </label>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="">Votre prénom</label>
              <div class="col-md-5">
                <input name="prenom" placeholder="votre prénom" class="form-control input-md" required="" type="text">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="">Votre nom</label>
              <div class="col-md-5">
                <input name="nom" placeholder="votre nom" class="form-control input-md" required="" type="text">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="">Votre surnom</label>
              <div class="col-md-5">
                <input name="login" placeholder="votre surnom" class="form-control input-md" required="" type="text">
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="">Votre e-mail</label>
              <div class="col-md-5">
                <input name="email" placeholder="votre e-mail" class="form-control input-md" required="" type="text" onblur="verifMail(this);">
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="">Votre mot de passe</label>
              <div class="col-md-5">
                <input name="motdepasse_1" placeholder="votre mot de passe" class="form-control input-md" required="" type="password">
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label">Retapez votre mot de passe</label>
              <div class="col-md-5">
                <input name="motdepasse_2" class="form-control input-md" required="" type="password">
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label"></label>
              <div class="col-md-4">
                <button class="btn btn-success" type="submit">Créer mon compte</button>
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
    <script type="text/javascript">
    // fonction pour comparer deux mots de passe entrés
    function validation(f) {
      if (f.motdepasse_1.value == '' || f.motdepasse_2.value == '') {
        alert('Tous les champs ne sont pas remplis');
        f.motdepasse_1.focus();
        return false;
        }
      else if (f.motdepasse_1.value != f.motdepasse_2.value) {
        alert('Ce ne sont pas les mêmes mots de passe!');
        f.motdepasse_1.focus();
        return false;
        }
      else if (f.motdepasse_1.value == f.motdepasse_2.value) {
        return true;
        }
      else {
        f.motdepasse_1.focus();
        return false;
        }
      }
    </script>
  </body>
</html>
