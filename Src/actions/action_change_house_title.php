<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $house_id = $_POST['house_id'];
  $user_id = getPersonId($_SESSION['username']);

  // Verify if user owns the house
  if(!checkIsHouseOwner($user_id, $house_id))
    die(header('Location: ../pages/main_page.php'));

  $title = $_POST['title'];

  // Remove disallowed characters
  $title = preg_replace ("/[^0-9\?\.çãõa-zA-Z\s]/", '', $title);
  
  try {
    update_house_title($house_id, $title);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'The title of the house was updated!');
    header('Location: ../pages/myList.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update title!');
    die(header("Location: ../pages/edit_house.php?house=$house_id"));
  }
?>