<?php
  include_once('../includes/database.php');
  /*
  *Gets all of the houses in a certain contry
  */
  function getHousesWithId($country) {
    $db = Database::instance()->db();
    $idCountry  = getCountryId($country);
    $stmt = $db->prepare('SELECT idHabitacao FROM Habitacao WHERE idPais = ?');
    $stmt->execute(array($idCountry[0]['idPais']));
    return $stmt->fetchAll(); 
  }

  /*
  *Gets all of the houses
  */
  function getHouses() {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idHabitacao FROM Habitacao');
    $stmt->execute();
    return $stmt->fetchAll(); 
  }

  /*
  *Gets all of the houses available in a certain date
  */
  function getHouseDate($date) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idHabitacao FROM Disponivel WHERE Disponivel.data=?');
    $stmt->execute(array($date));
    return $stmt->fetchAll(); 
  }

  function getHousesPrice($price){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idHabitacao FROM Habitacao WHERE precoNoite<=?');
    $stmt->execute(array($price));
    return $stmt->fetchAll();
  }

  /*
  *Gets name of contryid
  */
  function getCountryId($country){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idPais FROM Pais WHERE nome = ?');
    $stmt->execute(array($country));
    return $stmt->fetchAll(); 
  }

  /*
  *Gets a certain house items
  */
  function getHouseItems($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  
  function getCountry($country_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT nome FROM Pais WHERE idPais = ?');
    $stmt->execute(array($country_id));
    return $stmt->fetchAll(); 
  }
  
  /*
  *Gets house photo
  */
  function getHousePhoto($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idHabitacao = ?');
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
   * Returns all the info from a house with id equal to house_id
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
  function insertHouse($idUser, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $country_id, $type_id, $picture) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Habitacao VALUES(? , ? , ? , ? , ? , ? , ?, ? , ?, ?, ?, ? , ?)');
    $stmt->execute(array (NULL, $idUser, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $country_id, $type_id, $picture));
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
   * Creates a new reservation an returns the array of reservations
   */
  function createReservation($check_in, $check_out, $nr_people, $price, $house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Reserva VALUES(NULL, ? , ? , ? , ? , 0 , ? )');
    $stmt->execute(array($check_in, $check_out, $nr_people, $price, $house_id));

    $db = Database::instance()->db();
    $stmt2 = $db->prepare('SELECT * FROM Reserva');
    $stmt2->execute();
    return $stmt2->fetchAll(); 
  }


  /**
   * Checks dates for check in and check out
   */
  function getAvailability($house_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT dataCheckIn, dataCheckOut FROM Reserva WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll();
  }

  /**
   * Gets number of poeple for house
   */
  function getNrPeople($house_id){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT maxHospedes FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll();
  }

  function getUserHouseItems($userId) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idDono = ?');
    $stmt->execute(array($userId));
    return $stmt->fetchAll(); 
  }


?>

