<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username is invalid!');
    die(header('Location: ../pages/login.php'));
  }

  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    header('Location: ../pages/main_page.php');
  } else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
    header('Location: ../pages/login.php');
  }

?>