<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');

  $check_in = $_POST['check-in'];
  $check_out = $_POST['check-out'];
  $house_id = $_POST['idHabitacao'];
  $precoNoite = $_POST['precoNoite'];
  $nrpeople = $_POST['nrpeople'];

  // Remove disallowed characters
  $check_in  = preg_replace ("/[^0-9\\\-]/", '', $check_in );

  // Remove disallowed characters
  $check_out  = preg_replace ("/[^0-9\\\-]/", '', $check_out );

  // Remove disallowed characters (only numbers are accepted)
  $house_id = preg_replace ("/[^0-9]/", '', $house_id );
  
  // Remove disallowed characters (only numbers and dot are accepted)
  $precoNoite  = preg_replace ("/[^0-9\.]/", '', $precoNoite  );

  // Remove disallowed characters (only numbers are accepted)
  $nrpeople = preg_replace ("/[^0-9]/", '', $nrpeople );

  $available = true;

  $availability = getAvailability($house_id);
  $max_people = getNrPeople($house_id);


  for($i = 0 ; $i< count($availability) ; ++$i){
    if(($availability[$i]['dataCheckIn'] >= $check_in && $availability[$i]['dataCheckIn'] <= $check_out) || 
    ($availability[$i]['dataCheckOut'] >= $check_in && $availability[$i]['dataCheckOut'] <= $check_out) ||
    ($availability[$i]['dataCheckOut'] >= $check_out && $availability[$i]['dataCheckIn'] <= $check_in)){
        $available = false;
    }
  }

  if($nrpeople > $max_people['0']['maxHospedes']){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'This house cant fit that many people!');
    die(header("Location: ../pages/house.php?house=$house_id"));
  }

  $user_id = getIdByUsername($_SESSION['username']);

  if($available){
    $reservas = createReservation($check_in, $check_out, $nrpeople, $precoNoite, $house_id, $user_id);   
    //print_r($reservas);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation was successful!');
    header("Location: ../pages/myReservations.php");
  }
  else{
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Those dates aren\'t available!');
    die(header("Location: ../pages/house.php?house=$house_id"));
  }

?>