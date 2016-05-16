<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];
$giftid = $_GET['giftid'];

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// Requête pour chercher l'id du cadeau choisi
$verif = $connexion->query('SELECT COUNT(*) AS nbgift FROM reserver WHERE cadeauid = ' . $giftid);
$exist = $verif->fetch();
$nbgift = $exist['nbgift'];

if($nbgift < 1) { // si cadeauid n'est pas dans la table reserver
  // on insère le cadeau choisi dans la table reserver et on l'associe à l'utilisateur qui le choisit
  $connexion->exec('INSERT INTO reserver(uid,
                                        cadeauid)
                    VALUES (' . $uid . ',
                            ' . $giftid . ')');

// Requête pour chercher les informations du cadeau
  $reponse = $connexion->query('SELECT * FROM reserver WHERE cadeauid = ' . $giftid);

  $donnees = $reponse->fetch();
  ?>

  <!-- afficher une boite de dialogue indiquant que le cadeau est maintenant réservé -->
  <script type="text/javascript">
    alert("Le cadeau choisi est maintenant r\351serv\351 !\nMerci.");
    history.back();
  </script>
  <?php

 } else { ?>
  <!-- afficher une boite de dialogue indiquant que le cadeau est déjà réservé -->
  <script type="text/javascript">
    alert("Le cadeau choisi est d\351j\340 r\351serv\351 !!\nMerci d'en choisir un qui n'est pas r\351serv\351.");
    history.back();
  </script>
  <?php
}

?>
