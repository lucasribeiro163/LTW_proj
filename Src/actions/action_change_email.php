<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $email = $_POST['email'];

  // Remove disallowed characters
  $email = preg_replace ("/[^0-9\?\.çãõa-zA-Z@\s]/", '', $email);

  if (checkIfEmailExists($email) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email is being use already!');
    die(header('Location: ../pages/profile.php'));
  }
  
  try {
    update_email($_SESSION['username'], $email);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our email was updated!');
    header('Location: ../pages/profile.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update email!');
    header('Location: ../pages/editProfile.php');
  }
?>