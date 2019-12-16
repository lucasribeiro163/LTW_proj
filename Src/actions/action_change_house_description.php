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

  $description = $_POST['description'];

  // Remove disallowed characters
  $description = preg_replace ("/[^0-9\?\.ça-zA-Z\s]/", '', $description);
  
  try {
    update_house_description($house_id, $description);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'The description of the house was updated!');
    header('Location: ../pages/myList.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update des$description!');
    die(header("Location: ../pages/edit_house.php?house=$house_id"));
  }
?>