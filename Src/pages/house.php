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

  // Lists of all houses
  $lists = getHouses();
  foreach ($lists as $k => $list)
    $lists[$k]['list_items'] = getHouseItems($list['idHabitacao']); 

  draw_header($_SESSION['username']);
  draw_house_ad($_SESSION['username'],$house, $lists);
  draw_footer();
?>