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

      if(isset($_SESSION['user']) == "") {
        include("menu.php");
      } else {
        include("menu2.php");
      }
      ?>

      <?php
      if(isset($_SESSION['user']) == "") { ?>
        <div class="site_body">
          <legend>Bienvenue sur Christmas Wish List</legend>

          <div class="col-sm-12 col-md-offset-2 col-md-8">
            <p>Si vous souhaitez gérer vos cadeaux de Noël facilement alors vous êtes au bon endroit.
              <strong>Christmas Wish List</strong> vous permet de partager votre liste avec un ou des membres de votre famille ou des amis.
              Contrairement à d'autres sites similaires, <strong>Christmas Wish List</strong> vous donne la possibilité de voir ce qui a déjà été acheté pour quelqu'un pour éviter de l'acheter en double.</p>
            <p>Ne soyez plus en panne d'idée et inspirez-vous des cadeaux d'autres utilisateurs du site.</p>
            <p><strong>Christmas Wish List</strong> est un service entièrement GRATUIT! Vous et vos proches pouvez partager les services de ce site gratuitement.</p>
            <p>Vous avez juste à cliquer sur le bouton ci-dessous et c'est parti !</p></br>
          </div>

          <!-- Button -->
            <div class="col-sm-12 col-md-offset-5 col-md-4">
              <a href="createlist.php"><button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-th-list"></span> Créer ma liste</button></a>
            </div>
        </div>
        <?php
      } else { ?>
        <div class="site_body">
          <legend>Bienvenue sur Christmas Wish List</legend>

          <div class="col-sm-12 col-md-offset-2 col-md-8">
            <p><strong><?php echo ($_SESSION['user']['userfirstname']); ?></strong>, vous êtes enregistrés sur <strong>Christmas Wish List</strong>.
              Vous avez accés à toutes les fonctionnalités qu'offre le site pour les utilisateurs connectés.</br>
              <strong><?php echo ($_SESSION['user']['userfirstname']); ?></strong>, vous allez pouvoir créer une ou plusieurs listes et y déposer vos souhaits de cadeaux pour Noël.</br>
              Vous êtes en manque d'inspiration, regardez les listes des autres utilisateurs et inspirez vous de leurs idées.</br>
              <strong>Christmas Wish List</strong> va également vous permettre de partager votre liste avec un ou des membres de votre famille ou des amis.</br>
              Contrairement à d'autres sites similaires, <strong>Christmas Wish List</strong> vous donne la possibilité de voir ce qui
              a déjà été acheté pour quelqu'un pour éviter de l'acheter en double.</br>
            <strong>Christmas Wish List</strong> est un service entièrement GRATUIT ! Vous et vos proches pouvez partager les services de ce site gratuitement.</p>
            <p><strong><?php echo ($_SESSION['user']['userfirstname']); ?></strong> c'est à vous. Cliquer sur le bouton ci-dessous et c'est parti !</p></br>
          </div>

          <!-- Button -->
            <div class="col-sm-12 col-md-offset-5 col-md-4">
              <a href="createlist.php"><button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-th-list"></span> Créer ma liste</button></a>
            </div>
        </div>
        <?php
      }
            ?>

      <hr>
      <?php include("footer.php"); ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>
    <script type="text/javascript" src="http://www.jimdo.com/l/usersnippets/snowfall.min.js"></script> 
  </body>
</html>
