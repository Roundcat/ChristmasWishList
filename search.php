<?php
session_start();

$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];

// Connexion à la base de données et test de présence d'erreurs
include("config/config.php");

// Je teste pour savoir si j'ai quelque chose dans POST
if(isset($_GET['keywords']) && !empty($_GET)) {
// J'ai quelque chose donc je peux continuer

// Je commence à séparer les différents mots clés
$keywords = explode(' ', $_GET['keywords']);
// J'initialise ma variable pour la requête SQL
$like = "";

foreach($keywords as $keyword) {
  // Si le mot clé est supérieur à 3 caractères (tu n'es pas obligé)
  if(strlen($keyword) >= 3) {
      // Je concatène
      // Le % en SQL est un joker, ça remplace n'importe quel caractère. Si tu veux que se soit une recherche explicite retire les %
      $like.= " login ='%".$keyword."%' OR";
      $like.= " login ='%".$keyword."' OR";
      $like.= " login ='%".$keyword."%' OR";
    }
}
// Je retire le dernier OR qui n'a pas lieu d'être
$like = substr($like, 0, strlen($like) - 3);

$reponse = $connexion->query('SELECT login FROM utilisateur WHERE ' . $like);
    while($donnees = $reponse->fetch()) {
        echo ($donnees);
    }
} else {
  // Je n'ai rien, j'informe l'utilisateur
  die('Veuillez saisir quelque chose dans le champs de recherche.');
    }
?>
