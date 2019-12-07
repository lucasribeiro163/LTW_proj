<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    header('Location: ../pages/main_page.php');
  }  else if (checkIfExists($username, $email) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email is being use already!');
    die(header('Location: ../pages/login.php'));
  } else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
    header('Location: ../pages/login.php');
  }

?>