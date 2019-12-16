<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');


  $check_in = $_POST['check-in'];
  $check_out = $_POST['check-out'];
  $house_id = $_POST['idHabitacao'];
  $precoNoite = $_POST['precoNoite'];
  $nrpeople = $_POST['nrpeople'];

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

  if($nrpeople > $max_people['0']['maxHospedes'])
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'This house cant fit that many people!');

  if($available){
    $reservas = createReservation($check_in, $check_out, $nrpeople, $precoNoite, $house_id);   
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Reservation was successful!');
  }
  else
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Those dates aren\'t available!');
 
  header("Location: ../pages/house.php?house=$house_id");

?>