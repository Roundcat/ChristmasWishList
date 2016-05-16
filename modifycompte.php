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

        <legend>Mon compte</legend>

        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12">
            <p><strong><?php echo ($user['userfirstname']) ?></strong>, vous pouvez modifier les informations concernant votre compte
              que vous avez enregistré sur <strong>Christmas Wish List</strong>.</p>
          </div>

          <form class="form-horizontal" action="updatecompte.php" method="POST" onsubmit="return verify(this.motdepasse_1, this.motdepasse_2)">
            <fieldset>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Votre prénom</label>
                <div class="col-md-5">
                  <input name="prenom" value="<?php echo htmlspecialchars ($user['userfirstname']); ?>" class="form-control input-md" type="text">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Votre nom</label>
                <div class="col-md-5">
                  <input name="nom" value="<?php echo htmlspecialchars ($user['username']); ?>" class="form-control input-md" type="text">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Votre surnom</label>
                <div class="col-md-5">
                  <input name="login" value="<?php echo htmlspecialchars ($user['login']); ?>" class="form-control input-md" type="text">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Votre e-mail</label>
                <div class="col-md-5">
                  <input name="email" value="<?php echo htmlspecialchars ($user['usermail']); ?>" class="form-control input-md" type="text">
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Votre mot de passe</label>
                <div class="col-md-5">
                  <input name="motdepasse_1" value="<?php echo htmlspecialchars ($user['password']); ?>" class="form-control input-md" type="password">
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Retapez votre mot de passe</label>
                <div class="col-md-5">
                  <input name="motdepasse_2" class="form-control input-md" type="password">
                </div>
              </div>

              <!-- Button (double) -->
              <div class="form-group">
                <div class="col-sm-12 col-md-offset-4 col-md-5 col-lg-offset-4 col-lg-5">
                  <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-edit"></span> Modifier mon compte</button>
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
    <script type="text/javascript">
    // Fonction pour vérifier que la saisie des mots de passe est identique
    var fieldalias="mot de passe";

    function verify(element1, element2) {
      var passed=false;

       if (element1.value=='') {
        alert("Veuillez entrer votre "+fieldalias+" dans le premier champ!");
        element1.focus();
       } else if (element2.value=='') {
        alert("Veuillez confirmer votre "+fieldalias+" dans le second champ!");
        element2.focus();
       } else if (element1.value!=element2.value) {
        alert("Les deux "+fieldalias+" ne condordent pas");
        element1.select();
       } else
        passed = true;
        return passed;
    }
    </script>
  </body>
</html>
