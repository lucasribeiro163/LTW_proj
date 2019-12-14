<?php
  include_once('../includes/database.php');

  function getHouses() {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idHabitacao FROM Habitacao');
    $stmt->execute();
    return $stmt->fetchAll(); 
  }

  function getHouseItems($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  function getCity($city_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT nome FROM Cidade WHERE idCidade = ?');
    $stmt->execute(array($city_id));
    return $stmt->fetchAll(); 
  }
  
  function getHousePhoto($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    $house = $stmt->fetch();
    return $house['picture'];
  }

  /**
   * Returns the ids of houses belonging to a certain user.
   */
  function getUserHouseIds($user_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idHabitacao FROM Possui WHERE idAnfitriao = ?');
    $stmt->execute(array($user_id));
    return $stmt->fetchAll(); 
  }

  /**
   * Returns all the info from a hoyse with id equal to house_id
   */
  function getHouseInfoArray($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  /**
   * Inserts a new house into the database.
   */
  function insertHouse($idUser, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $city_id, $type_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Habitacao( idDono, numQuartos, numBanho, maxHospedes , titulo , descricaoHabitacao, morada , precoNoite, classificacaoHabitacao, idCidade, idTipo, picture) VALUES(? , ? , ? , ? , ?, ? , ?, ?, ?, ? , ?, ?)');
    //picture is always insert with picture = 0 and update if the upload is ok
    $stmt->execute(array ($idUser, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $city_id, $type_id, 0));
    return $db->lastInsertId();
  }

  
  function insertHouseImage($house_id) {
    // Database connection
    $dbh = Database::instance()->db(); 
    // Insert image data into database
    $stmt = $dbh->prepare('UPDATE Habitacao SET picture = ? WHERE idHabitacao = ?');
    $stmt->execute(array(1, $house_id));

  }

  /**
   * Verifies if a user owns a House with id house_id
   */
  function checkIsHouseOwner($user_id, $house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Possui WHERE idAnfitriao = ? AND idHabitacao = ?');
    $stmt->execute(array($user_id, $house_id));
    return $stmt->fetch()?true:false; // return true if a line exists
  }

  /**
   * Changes house price
   */
  function changePrice($house_id, $new_price) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Habitacao SET precoNoite = ? WHERE idHabitcao = ?;');
    $stmt->execute(array($new_price, $house_id));
  }

  /**
   * Deletes a user from database
   */
  function deleteUser($user_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('DELETE FROM Utilizador WHERE id = ?');
    $stmt->execute(array($user_id));
  }

  /**
   * Deletes a house from database
   */
  function deleteHouse($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('DELETE FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
  }

  /**
   * Set Reservation state has completed
   */
  function toggleReservation($reservation_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Reserva SET idEstado = 2 WHERE idReserva = ?');
    $stmt->execute(array($reservation_id));
  }

  /**
   * Creates a new reservation
   */
  function createReservation($check_in, $check_out, $nr_people, $price, $house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Reserva VALUES(NULL, ? , ? , ? , ? , 0 , ? )');
    $stmt->execute(array($check_in, $check_out, $nr_people, $price, $house_id));
  }

?>

