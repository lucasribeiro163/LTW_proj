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


  for($i = 0 ; $i< count($availability) ; ++$i){
    if(($availability[$i]['dataCheckIn'] >= $check_in && $availability[$i]['dataCheckIn'] <= $check_out) || 
    ($availability[$i]['dataCheckOut'] >= $check_in && $availability[$i]['dataCheckOut'] <= $check_out) ||
    ($availability[$i]['dataCheckOut'] >= $check_out && $availability[$i]['dataCheckIn'] <= $check_in) ){
        $available = false;
    }
  }

  if($available){
    $reservas = createReservation($check_in, $check_out, $nrpeople, $precoNoite, $house_id);   
    $_POST['available'] = 1;
  }
  else
    $_POST['available'] = 2;




  
  header('Location: ../pages/house.php?house='.$house_id);

    


  
?>