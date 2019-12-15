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

  $price_per_night = $_POST['price_per_night'];

  // Remove disallowed characters (only numbers are accepted)
  $price_per_night = preg_replace ("/[^0-9]/", '', $price_per_night);
  
  try {
    changePrice($house_id, $price_per_night);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'The price of the house was updated!');
    header('Location: ../pages/myList.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update price!');
    header('Location: ../pages/myLists.php');
  }
?>