<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../page/login.php'));

  $name = $_POST['name'];
  
  update_email($_SESSION['username'], $name);

  header('Location: ../pages/main_page.php');
?>