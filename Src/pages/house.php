<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');
  include_once('../templates/tpl_lists.php');
  include_once('../database/db_list.php');


  $house = $_GET['house'];

  // Lists of all houses
  $lists = getHouses();
  foreach ($lists as $k => $list)
    $lists[$k]['list_items'] = getHouseItems($list['idHabitacao']);

  draw_header($_SESSION['username']);
  draw_house_ad($house, $lists);
  draw_footer();
?>