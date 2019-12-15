<?php function draw_lists($lists) {
/**
 * Draws a section (.lists) containing several lists
 * as articles. Uses the draw_list function to draw
 * each list.
 */ ?>
  <section class="lists">
  
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
<a href= "house.php?house=<?=$idHabitacao?>">
<img id="defaultImage" src="<?php echo $image; ?>" alt="house image"></img> </a>
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

        $precoNoite = $item['precoNoite'];
        $morada = $item['morada'];
        $cidade = getCity($item['idCidade']);
        $idHabitacao = $item['idHabitacao'];
        if(getHousePhoto($item['idHabitacao']) == 0) 
          $image = "../images/houses/originals/default0.jpg";
        else $image = "../images/houses/thumbs_medium/$idHabitacao.jpg";
      
      }
    }
  }

    ?>
    <section id="house_ad">
    <header>  
        <h1><?=$item['titulo']?></h1>
        <h2><?=$item['descricaoHabitacao']?></h2>
        <h2><?=htmlspecialchars($morada)?>
        ,
        <?=print_r($cidade[0]['nome'])?></h2>
    </header>

    <form action="../actions/action_rent.php" method="post">
        <input type="hidden" name="idHabitacao" value="<?=$house;?>" />
        <input type="hidden" name="precoNoite" value="<?=$precoNoite;?>" />
        <a>Check-in: <input type="date" name="check-in"></a>
        <a>Check-out: <input type="date" name="check-out"></a>
        <a>Nr of people: <input type="number" name="nrpeople"></a>
        <button id="rent_button">Rent</button>
      </form>
    </section>

    <section id="someImage">
      <img src="<?php echo $image; ?>" alt="house image">
    </section>
    
<?php }


function draw_my_lists($lists) {
/**
 * Draws a section (.lists) containing all the lists of the user
 * as articles. Uses the draw_list function to draw
 * each list.
 */ ?>
  <section class="lists">
  
  <?php
    foreach($lists as $list){
     draw_mylist($list);
    } //I'm going to change to draw_edit_item and add actions
  ?>

  </section>
<?php } ?>

<?php function draw_mylist($list) {
/**
 * Draw a single list as an article (.list). Uses the
 * draw_item function to draw each item. Expects each 
 * list to have an list_id, list_name and list_items 
 * fields.
 */ ?>
  <article class="list">
      <?php 
        foreach ($list['list_items'] as $item)
          draw_myitem($item);
      ?>
  </article>
<?php } ?>

<?php function draw_myitem($item) {
/**
 * Draws a single item. A dropBox will appear on click 
 **/
  $cidade = getCity($item['idCidade']);
  $idHabitacao = $item['idHabitacao'];
  if(getHousePhoto($item['idHabitacao']) == 0) 
    $image = "../images/houses/thumbs_small/default0.jpg";
  else $image = "../images/houses/thumbs_small/$idHabitacao.jpg";
  
?>
  <img id="defaultImage" src="<?=$image?>" alt="house image"></img>
  <section id="Info">
    <h1><?=$item['titulo']?></h1>
    <h2><?=$cidade[0]['nome']?></h2>
    <section id="address">
      <?=htmlspecialchars($item['morada'])?>
    </section>


  <a href="../../Src/pages/aboutUs.php">Edit House</a>
  <a href="../../Src/pages/myList.php">See rents</a>

<?php } ?>
