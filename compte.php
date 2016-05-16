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

          <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
            <p><strong><?php echo ($user['userfirstname']) ?></strong>, vous trouverez toutes les informations concernant votre compte
              que vous avez enregistré sur <strong>Christmas Wish List</strong> dans le tableau ci-dessous.</br>
              En cliquant sur le bouton <a href="modifycompte.php">Modifier mon compte</a> vous pourrez accéder à un formulaire permettant de rectifier vos informations.</p>
          </div>

          <div class="col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
            <div class="panel panel-primary">
              <table class="table table-striped- table-condensed">
                <div class="panel-heading">
                  <h3 class="panel-title">Voici les informations concernant mon compte</h3>
                </div>
                <tbody>
                  <tr>
                    <th>Mon nom</th>
                    <td><?php echo htmlspecialchars ($user['username']); ?></td>
                  </tr>
                  <tr>
                    <th>Mon prénom</th>
                    <td><?php echo htmlspecialchars ($user['userfirstname']); ?></td>
                  </tr>
                  <tr>
                    <th>Mon surnom</th>
                    <td><?php echo htmlspecialchars ($user['login']); ?></td>
                  </tr>
                  <tr>
                    <th>Mon e-mail</th>
                    <td><?php echo htmlspecialchars ($user['usermail']); ?></td>
                  </tr>
                  <tr>
                    <th>Mon mot de passe</th>
                    <td><?php echo htmlspecialchars ($user['password']); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Button -->
            <div class="col-sm-12 col-md-offset-4 col-md-4">
              <a href="modifycompte.php"><button class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-edit"></span> Modifier mon compte</button></a>
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
