<?php
  include_once('../includes/database.php');

  function getCities(){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idCidade FROM Habitacao');
    $stmt->execute(array());
    $stmt->fetch();
    $cityList = [];
    for($i =0 ; $i< count($stmt) , ++$i){
        $temp = getCity($stmt[$i])
        push_array($cityList,$temp);
    }
    return $cityList;
  }

  function getCity($cityId){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT nome FROM Cidade WHERE idCidade = ?');
    $stmt->execute($cityId);
    return $stmt->fetch();
  }
?>