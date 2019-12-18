<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  include_once('../database/db_list.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $comment = $_POST['comment'];
  // Remove disallowed characters
  $comment = preg_replace ("/[^0-9\?\.çãõa-zA-Z\s]/", '', $comment);
  $house_id = $_POST['house_id'];
  // Remove disallowed characters (only numbers are accepted)
  $house_id = preg_replace ("/[^0-9]/", '', $house_id );

  $stars = $_POST['stars'];
  // Remove disallowed characters (only numbers are accepted)
  $stars = preg_replace ("/[^0-9]/", '', $stars );
  $id = getPersonId($_SESSION['username']);
  try {
    insert_comment($stars,  $comment, $id) ;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our comment was added!');
    header('Location: ../pages/main_page.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add comment!');
    header('Location: ../pagese.php');
  }
?>