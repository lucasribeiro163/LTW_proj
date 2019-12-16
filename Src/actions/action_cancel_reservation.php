<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');


  $house_id = $_GET['house'];
  $username = $_SESSION['username'];


  cancelReservation($house_id, $username);   
  $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation was succesfully cancelled!');
  




  
   header('Location: ../pages/myReservations.php');

    


  
?>