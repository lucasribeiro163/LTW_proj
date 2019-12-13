<?php function draw_lists($lists) {
/**
 * Draws a section (#lists) containing several lists
 * as articles. Uses the draw_list function to draw
 * each list.
 */ ?>
  <section id="lists">
  
  <?php
    foreach($lists as $list){
     draw_list($list);}
  ?>

  </section>
<?php } ?>

<?php function draw_list($list) {
/**
 * Draw a single list as an article (.list). Uses the
 * draw_item function to draw each item. Expects each 
 * list to have an list_id, list_name and list_items 
 * fields.
 */ ?>
  <article class="list">
      <?php 
        foreach ($list['list_items'] as $item)
          draw_item($item);
      ?>
  </article>
<?php } ?>

<?php function draw_item($item) {
/**
 * Draws a single item. Expects each item to have
 * an item_id, item_done and item_text fields. 
 **/
  $cidade = getCity($item['idCidade']);
  $idHabitacao = $item['idHabitacao'];
  if(getHousePhoto($item['idHabitacao']) == 0) 
    $image = "../images/houses/thumbs_small/default0.jpg";
  else $image = "../images/houses/thumbs_small/$idHabitacao.jpg";
  
?>
<a href= "house.php?house=<?=$idHabitacao?>"> <img id="defaultImage" src="<?php echo $image; ?>" alt="house image"></img> </a>
<section id="Info">
  <h1><?=$item['titulo']?></h1>
  <h2><?=$cidade[0]['nome']?></h2>
  <section id="address">
    <?=htmlspecialchars($item['morada'])?>
  </section>
</section>
<?php } ?>


<?php function draw_house_ad($house, $lists) {

  foreach($lists as $list){
    foreach ($list['list_items'] as $item){
      if($item['idHabitacao'] == $house){

        $morada = $item['morada'];
        $cidade = getCity($item['idCidade']);
        $idHabitacao = $item['idHabitacao'];
        if(getHousePhoto($item['idHabitacao']) == 0) 
          $image = "../images/houses/thumbs_medium/default0.jpg";
        else $image = "../images/houses/thumbs_medium/$idHabitacao.jpg";
      
      }
    }
  }
    ?>
    <section id="Info">
      <h1><?=$item['titulo']?></h1>
      <h2><?=$item['descricaoHabitacao']?></h2>
      <section id="address">
        <?=htmlspecialchars($morada)?>
        ,
        <?=print_r($cidade[0]['nome'])?>
      </section>
      <a>Check-in: <input type="date" name="check-in"></a>
      <a>Check-out: <input type="date" name="check-out"></a>
      <button id="rent_button">Rent</button>
    </section> 
    <img src="<?php echo $image; ?>" alt="house image"></img>  
    
    <section id ="mapSection"> 
      <div id="map"></div>
    </section>
<?php } ?>