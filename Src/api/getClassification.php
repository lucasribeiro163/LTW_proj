<?php
  include_once('../database/db_list.php');
    
  $houseID=$_GET['houseId'];

  $classification = getClassification($houseID);
  $send = array();
  array_push($send , $classification[0]['classificacaoHabitacao']);
  echo json_encode($send);
?>
