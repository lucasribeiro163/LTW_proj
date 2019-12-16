<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $name = $_POST['name'];

  // Remove disallowed characters
  $name = preg_replace ("/[^a-zA-Z\s]/", '', $name);
  
  try {
    update_name($_SESSION['username'], $name);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our name was updated!');
    header('Location: ../pages/profile.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update name!');
    header('Location: ../pages/editProfile.php');
  }
?>