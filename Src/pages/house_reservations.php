<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
  include_once('../templates/tpl_lists.php');
  include_once('../database/db_list.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: login.php'));

  $house = $_GET['house'];
  //gets user id
  $userId = getPersonId($_SESSION['username']);

  $reservations = getReservations($house);

  draw_header($_SESSION['username']);
  draw_house_reservations($reservations, $house);
  draw_footer();
?>