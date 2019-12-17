<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $house_id = $_GET['house'];
  $username = $_SESSION['username'];

  // Remove disallowed characters (only numbers are accepted)
  $house_id  = preg_replace ("/[^0-9]/", '', $house_id );

  try {
    cancelReservation($house_id, $username);   
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation was successfully cancelled!'); 
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to cancel reservation!');
  }
  
  //header('Location: ../pages/myReservations.php');


?>