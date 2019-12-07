<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../page/login.php'));

  $email = $_POST['email'];

  if (checkIfUsernameExists($email) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email is being use already!');
    die(header('Location: ../pages/editProfile.php'));
  }
  
  
  update_email($_SESSION['username'], $email);

  header('Location: ../pages/main_page.php');
?>