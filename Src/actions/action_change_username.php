<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../page/login.php'));

  $username = $_POST['username'];

  if (checkIfUsernameExists( $username) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username is being use already!');
    die(header('Location: ../pages/editProfile.php'));
  }
  
  update_username($_SESSION['username'], $username);

  header('Location: ../pages/main_page.php');
?>