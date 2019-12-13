<?php
  include_once('../includes/database.php');

  function getCities(){
    
    $cityList = getCitiesArray();
    
    $list =[];
    for($i =0 ; $i< count($cityList) ; ++$i){
        $temp =$cityList[$i]['nome'];
        array_push($list,$temp);
    }
    return $list;
  }
  function getCitiesArray(){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT nome FROM Cidade');
    $stmt->execute();
    return $stmt->fetchAll();
  }

?>  