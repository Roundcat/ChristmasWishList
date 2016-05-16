<?php

$errors = [];

if(!array_key_exists('mymail', $_POST) || $_POST['mymail'] == '' || !filter_var($_POST['mymail'], FILTER_VALIDATE_EMAIL)) {
  $errors['mymail'] = "Vous n'avez pas renseigné votre email ou votre email est invalide";
}

if(!array_key_exists('friendmail', $_POST) || $_POST['friendmail'] == '' || !filter_var($_POST['friendmail'], FILTER_VALIDATE_EMAIL)) {
  $errors['friend'] = "Vous n'avez pas renseigné l'email ou l'email  de votre ami est invalide";
}

if(!array_key_exists('friend_msg_invit', $_POST) || $_POST['friend_msg_invit'] == '') {
  $errors['name'] = "Vous n'avez pas entré de message";
}

session_start();

if(!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['inputs'] = $_POST;
  header('Location: inviterami.php');
} else {
  $_SESSION['success'] = 1;
  $message = $_POST['friend_msg_invite'];
  $headers = 'FROM: ' . $_POST['mymail'];
  mail($_POST['friendmail'], 'Invitation pour venir voir la liste d\'un ami Christmas Wish List', $message, $headers);
  header('Location: inviterami.php');
}

?>
