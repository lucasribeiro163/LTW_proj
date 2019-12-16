<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $description = $_POST['description'];

  // Remove disallowed characters
  $description = preg_replace ("/[^0-9\?\.çãõa-zA-Z\s]/", '', $description);

  try {
    update_description($_SESSION['username'], $description);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our description was updated!');
    header('Location: ../pages/profile.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update description!');
    header('Location: ../pages/editProfile.php');
  }
?>