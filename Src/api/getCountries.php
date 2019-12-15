<?php
  include_once('../database/db_searchInfo.php');
  $country = getCountries();
  echo json_encode($country);
?>
