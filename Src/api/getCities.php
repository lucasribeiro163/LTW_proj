<?php
  include_once('../database/db_searchInfo.php');
  $city = getCities();
  echo json_encode($city);
?>
