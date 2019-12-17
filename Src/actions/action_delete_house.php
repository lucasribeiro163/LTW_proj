<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $house_id = $_POST['house_id'];

  // Remove disallowed characters (only numbers are accepted)
  $house_id = preg_replace ("/[^0-9]/", '', $house_id );
  
  $user_id = getPersonId($_SESSION['username']);

  // Verify if user owns the house
  if(!checkIsHouseOwner($user_id, $house_id))
    die(header('Location: ../pages/main_page.php'));
  
  try {
    //gets all reservations of the houses we want to delete
    $reservation = get_house_reservation($house_id);
    //deletes all the reservations of the house
    for($i = 0; $i < count($reservation); $i++)
        delete_reservation($reservation[$i]['idReserva']);
    //deletes the house it selfs
    deleteHouse($house_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'The house was deleted!');
    header('Location: ../pages/myList.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to delete!');
    die(header("Location: ../pages/edit_house.php?house=$house_id"));
  }
?>