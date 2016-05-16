<?php

$errors = [];

if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {
  $errors['name'] = "Vous n'avez pas renseigné votre nom";
}

if(!array_key_exists('mail', $_POST) || $_POST['mail'] == '' || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
  $errors['mail'] = "Vous n'avez pas renseigné votre email ou votre email est invalide";
}

if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
  $errors['message'] = "Vous n'avez pas entré de message";
}

session_start();

if(!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['inputs'] = $_POST;
  header('Location: contact.php');
} else {
  $_SESSION['success'] = 1;
  $message = $_POST['message'];
  $headers = 'FROM: ' . $_POST['mail'];
  mail('arnaudcharron@gmail.com', 'Formulaire de contact de Christmas Wish List', $message, $headers);
  header('Location: contact.php');
}

?>
