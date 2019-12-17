<?php
  include_once('../database/db_list.php');
  header('Content-Type: text/html; charset=utf-8');

  $houseID=$_GET['houseId'];

  $comments = getComments($houseID);
  $send = array();
  for($i=0 ; $i< sizeof($comments,0); $i++)
    {
        $description['descricao'] = $comments[$i]['descricaoAnfitriao'];
        $temp2 = array();
        $name['username'] = $comments[$i]['username'];
        $photo['picture'] = $comments[$i]['picture'];
        $classification['classification'] = $comments[$i]['classificacaoAnfitriao'];
        array_push($temp2 ,$description); 
        array_push($temp2 ,$photo); 
        array_push($temp2 ,$name);
        array_push($temp2 ,$classification); 
        array_push($send , $temp2);
    }
    echo json_encode($send,JSON_UNESCAPED_UNICODE);//handle special chars
?>
