<?php
  include_once('../database/db_searchInfo.php');

  $cityList = getCities();
  echo json_encode($cityList);
?>
