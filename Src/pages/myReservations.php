<?php 
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_lists.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: login.php'));


  if(empty($_GET)){
    $country = null;
  } else  $country = $_GET['country'];
  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: login.php'));


  $user_id = getPersonId($_SESSION['username']);
  $reservation_ids = getReservationById($user_id);


  foreach ($reservation_ids as $k => $reservation_id)
    $houses[$k] = getHouseOfReservation($reservation_id['idReserva'])[0];

  if (!empty($houses)) {
  foreach ($houses as $k => $house)
    $houses[$k]['list_items'] = getHouseItems($houses[$k]['idHabitacao']);
  }
  else{
      $houses = -1;
  }



  draw_header($_SESSION['username']);
  draw_my_reservations($houses);
  draw_footer();
?>