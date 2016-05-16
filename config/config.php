<?php
// Connexion à la base de données et test de présence d'erreurs
$bddUsername = 'root';
$bddPassword = '';
$bddDsn = 'mysql:host=localhost;dbname=christmaswishlist';
try {
  $connexion = new PDO($bddDsn, $bddUsername, $bddPassword);
}
catch (Exception $e) {
  die('Erreur ! : ' . $e->getMessage());
}
?>
