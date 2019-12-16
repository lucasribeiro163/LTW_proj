<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $password = $_POST['password'];
  $password1 = $_POST['password1'];

  //checks if passwords match
  if ($password != $password1 ) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Passwords don\'t match!');
    die(header('Location: ../pages/editProfile.php'));
  }
  
  try {
    update_password($_SESSION['username'], $password );
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our password was updated!');
    header('Location: ../pages/profile.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update password!');
    header('Location: ../pages/editProfile.php');
  }
?>