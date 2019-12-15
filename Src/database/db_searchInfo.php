<?php
  include_once('../includes/database.php');

  function getCountries(){
    
    $countryList = getCountriesArray();
    
    $list =[];
    for($i =0 ; $i< count($countryList) ; ++$i){
        $temp =$countryList[$i]['nome'];
        array_push($list,$temp);
    }
    return $list;
  }
  function getCountriesArray(){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT nome FROM Pais');
    $stmt->execute();
    return $stmt->fetchAll();
  }

?>  