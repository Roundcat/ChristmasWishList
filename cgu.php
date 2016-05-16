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

      <div class="site_body">
        <legend>Conditions générales d'utilisation</legend>

        <div class="row">

        <div class="col-sm-12 col-md-12">
          <p><strong>Christmas Wish List</strong>, d&eacute;sign&eacute; ci-dessous par "christmaswishlist.com"<br /><em>et</em><br />L'utilisateur du service, d&eacute;sign&eacute; par "l'Utilisateur".</p>
          <h2>1. Pr&eacute;sentation</h2>
          <p><strong>christmaswishlist.com</strong> est un service gratuit de gestion de liste de souhaits, cr&eacute;&eacute; par Arnaud Charron.</p>
          <h2>2. Disponibilit&eacute; du service</h2>
          <p><strong>christmaswishlist.com</strong> s'efforce de maintenir le service accessible 24h/24, 7j/7, mais ne pourrait &ecirc;tre sanctionn&eacute;
            pour toute panne ou interruption du service. De m&ecirc;me, <strong>christmaswishlist.com</strong> se r&eacute;serve
            le droit de mettre fin au service ou de l'interrompre &agrave; tout moment, sans pr&eacute;avis.</p>
            <h2>3. Vie priv&eacute;e</h2>
          <p><strong>christmaswishlist.com</strong> s'engage a respecter les vies priv&eacute;es. <br />
            <strong>Les informations personnelles saisies par l'Utilisateur ne sont pas transmises ou c&eacute;d&eacute;es &agrave; un tiers.</strong><br />
            Conform&eacute;ment &agrave; la loi n&deg;78-17 relative &agrave; l'informatique, aux fichiers et aux libert&eacute;s du 6 janvier 1978,
            l'Utilisateur dispose d'un droit d'acc&egrave;s, de modification et de suppression de ses donn&eacute;es personnelles.
            Pour exercer ce droit de suppression, l'Utilisateur doit contacter le responsable du service via <a href="contact.php">le formulaire de contact</a>.</p>
          <p>L'Utilisateur s'engage &agrave; ne pas diffuser de photos ou tenir des propos &agrave; caract&egrave;re pornographique, p&eacute;dophile ou raciste.<br />
            <strong>christmaswishlist.com</strong> se r&eacute;serve le droit de bloquer et/ou supprimer l'acc&egrave;s au service de l'Utilisateur
            si ce dernier ne respecte pas ces conditions g&eacute;n&eacute;rales d'utilisation.</p>
          <h2>4. Responsabilit&eacute; et Protection des mineurs</h2>
          <p>En aucun cas <strong>christmaswishlist.com</strong> ne pourrait &ecirc;tre tenu pour responsable des souhaits indiqu&eacute;s par l'Utilisateur.<br />
            Cependant, et afin d'assurer une qualit&eacute; de service pour tous et de pr&eacute;server la protection des mineurs,
            <strong>christmaswishlist.com</strong> s'engage a supprimer tout souhait &agrave; caract&egrave;re pornographique, p&eacute;dophile ou raciste.
            De plus, <strong>christmaswishlist.com</strong> se r&eacute;serve le droit de supprimer tout souhait qui serait consid&eacute;r&eacute;comme inadapt&eacute; au service.</p>
        </div>

        </div>
        
      </div>

      <hr>
      <?php include("footer.php"); ?>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>
  </body>
</html>
