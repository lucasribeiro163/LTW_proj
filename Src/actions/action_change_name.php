<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../page/login.php'));

  $name = $_POST['name'];
  
  try {
    update_name($_SESSION['username'], $name);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our name was updated!');
    header('Location: ../pages/main_page.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update name!');
    header('Location: ../pages/editProfile.php');
  }
?>