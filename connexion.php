<?php
session_start();

if(($_POST['usermail'] != "") && ($_POST['password'] != "")) {

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

  $reponse = $connexion->query('SELECT * FROM utilisateur WHERE usermail = \'' . $_REQUEST['usermail'] . '\'  AND password = \'' . $_REQUEST['password'] . '\'');

  $donnees = $reponse->fetch();

  if($_REQUEST['usermail'] != $donnees['usermail'] OR $_REQUEST['password'] != $donnees['password']) {
    echo ('<script type="text/javascript">' . 'alert("L\'utilisateur ou le mot de passe sont erron\351s !\n Veuillez les ressaisir ou inscrivez-vous sur le site.");' . 'window.location.replace("authentification.php");' . '</script>');

  } else {
    $_SESSION['user'] = $donnees;
    header('Location: index.php');
  }
}
?>
