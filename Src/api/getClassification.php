<?php
  include_once('../database/db_list.php');
    
  $houseID=$_GET['houseId'];
  
  // Remove disallowed characters (only numbers are accepted)
  $houseID = preg_replace ("/[^0-9]/", '', $houseID );

  $classification = getClassification($houseID);
  $send = array();
  array_push($send , $classification[0]['classificacaoHabitacao']);
  echo json_encode($send);
?>
