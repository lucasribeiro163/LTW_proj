<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $country = $_POST['country'];

  // Remove disallowed characters (only numbers are accepted)
  $country = preg_replace ("/[^0-9]/", '', $country );
  
  try {
    update_country($_SESSION['username'], $country) ;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our country was updated!');
    header('Location: ../pages/profile.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update country!');
    header('Location: ../pages/editProfile.php');
  }
?>