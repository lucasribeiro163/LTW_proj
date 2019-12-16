<?php 
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_lists.php');

  //get variables
  if(empty($_GET)){//no caso de não haver parametros
    $country = 'null';
    $date1 = 'null';
    $date2 = 'null';
    $price = 'null';
  } else  {
      $country = $_GET['country'];//obtem contry
    if($_GET['date1']!='null')
      $date1 =  new DateTime($_GET['date1']);//se nao for null passar logo para objecto em formato de dateTime
    else $date1 = 'null';
    if($_GET['date2']!='null')
      $date2 =  new DateTime($_GET['date2']);//se nao for null passar logo para objecto em formato de dateTime
    else $date2 = 'null';
    
      $price =  $_GET['price'];//obtem preco
  }

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: login.php'));

  // Lists of all houses
  if($country == 'null')
    $final = getHouses();//obtem todas as casas
  else $final= getHousesWithId($country);//obtem todas as casas de um certo pais

  if($date1 != 'null')//se a primeira data nao for nula
  {
    if($date2 != 'null'){//se a segunda data nao for nula
      //search houses that are available
      $days = $date2->diff($date1);//ver quantos dias difere a data1 da data2
      $days = abs((int)$days->format("%r%a"));//passar os dias para um inteiro positivo
      $date = $date1->format('Y-m-d');//obter a data em formato 'Y-m-d'
      for($i=0 ; $i < $days ; $i++){
        $temp = getHouseDate($date);//obter casas disponiveis nesse dia
        if(empty($temp) || empty($final))//caso o acumulador ou o temp seja null, então não há casas para mostrar que correspondam ao pedido, sair de imediato
          {
            $final=array();//set do final como nulo
            break;
          }
        $final = array_uintersect($final , $temp ,'compareDeepValue');//ver a interseção entre o acumulador e o temporario
        $date = date('Y-m-d', strtotime("+ 1 day",strtotime($date)));//adicionar um dia
      }
    }
    //search houses available on that day
    else{
      $date1List=getHouseDate($date1->format('Y-m-d'));//obter as casas disponiveis nesse dia
      $final= array_uintersect($final , $date1List ,'compareDeepValue');
    }
  }

  if($price != 'null')
  {
    $priceList = getHousesPrice($price);//obter as casas com esse preço
    $final= array_uintersect($final , $priceList , 'compareDeepValue');
  }
  
  foreach ($final as $k => $list)
    $final[$k]['list_items'] = getHouseItems($list['idHabitacao']);

  draw_header($_SESSION['username']);
  draw_lists($final);
  draw_footer();

  function compareDeepValue($val1, $val2)
{
   return strcmp($val1['idHabitacao'], $val2['idHabitacao']);
}
?>
