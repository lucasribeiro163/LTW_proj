<?php
  include_once('../includes/database.php');

  /**
   * gets all houses id with country id equal to the argument passed
   */
  function getHousesWithId($country) {
    $db = Database::instance()->db();
    $idCountry  = getCountryId($country);
    $stmt = $db->prepare('SELECT idHabitacao FROM Habitacao WHERE idPais = ?');
    $stmt->execute(array($idCountry[0]['idPais']));
    return $stmt->fetchAll(); 
  }

  /**
   * get all houses id's
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

  /**
   * get the id of a country name passed as argument
   */
  function getCountryId($country){
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idPais FROM Pais WHERE nome = ?');
    $stmt->execute(array($country));
    return $stmt->fetchAll(); 
  }

  /**
   * gets all the house items of the house with the id passed by argument
   */
  function getHouseItems($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  /**
   * get the name of the country, yous id is passed by id
   */
  function getCountry($country_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT nome FROM Pais WHERE idPais = ?');
    $stmt->execute(array($country_id));
    return $stmt->fetchAll(); 
  }
  
  /**
   * checks if the house already has a picture associated
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
   * Returns all the info from a hoyse with id equal to house_id
   */
  function getHouseInfoArray($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  /**
   * Inserts a new house into the database. return the id of the house inserted
   */
  function insertHouse($idUser, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $country_id, $type_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Habitacao VALUES(? , ? , ? , ? , ? , ? , ?, ? , ?, ?, ?, ? , ?)');
    //auto increment id of the houses
    $stmt->execute(array (NULL, $idUser, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $country_id, $type_id, 0));
    return $db->lastInsertId();
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
   * Creates a new reservation an returns the array of reservations parameters
   */
  function createReservation($check_in, $check_out, $nr_people, $price, $house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO Reserva VALUES(NULL, ? , ? , ? , ? , ? , ? )');
    $stmt->execute(array($check_in, $check_out, $nr_people, $price, 0, $house_id));

    $db1 = Database::instance()->db();
    $stmt2 = $db1->prepare('SELECT * FROM Reserva');
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
   * Gets the max number of people the house can have
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

  /**
   * Updates the house title of the house with the id passed by argument
   * to the title passed in the second argument
   */
  function update_house_title($house_id, $title) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Habitacao SET titulo = ? WHERE idHabitacao = ?');
    $stmt->execute(array($title, $house_id));
  }

  /**
   * Updates the house description of the house with the id passed by argument
   * to the description passed in the second argument
   */
  function update_house_description($house_id, $description) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Habitacao SET descricaoHabitacao  = ? WHERE idHabitacao = ?');
    $stmt->execute(array($description, $house_id));
  }

  /**
   * Updates the house description of the house with the id passed by argument
   * to the description passed in the second argument
   */
  function update_house_picture($house_id, $value) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Habitacao SET picture  = ? WHERE idHabitacao = ?');
    $stmt->execute(array($value, $house_id));
  }

  /**
   * gets all reservations belonging to a user
   */
  function get_house_reservation( $house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Reserva WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  /**
   * deletes a single reservation with the id passed by argument
   */
  function delete_reservation($reservation_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('DELETE FROM Reserva WHERE idReserva = ?');
    $stmt->execute(array($reservation_id));
  }


  function getReservations($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Reserva WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  /**
   * gets reservations by the id of the user who made them
   */
  function getReservationById($user_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idReserva FROM Efetua WHERE idCliente = ?');
    $stmt->execute(array($user_id));
    return $stmt->fetchAll(); 
  }

  /**
   * gets house from reservartion 
   */
  function getHouseOfReservation($reservation_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT idHabitacao FROM Reserva WHERE idReserva = ?');
    $stmt->execute(array($reservation_id));
    return $stmt->fetchAll(); 
  }

  /**
   * gets reservations dates by the id of a user and the id of the specific 
   */
  function getHouseReservationDatesByUser($user_id, $house_id) {

    $reservation_ids = getReservationById($user_id);
    
    foreach ($reservation_ids as $reservation_id){

      if(getHouseOfReservation($reservation_id['idReserva'])[0]['idHabitacao'] == $house_id){
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT dataCheckIn, dataCheckOut FROM Reserva WHERE idReserva = ? AND idHabitacao = ?');
        $stmt->execute(array($reservation_id['idReserva'], $house_id));
        return $stmt->fetchAll();
      }
    }
  }

  function getClassification($house_id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT classificacaoHabitacao FROM Habitacao WHERE idHabitacao = ?');
    $stmt->execute(array($house_id));
    return $stmt->fetchAll(); 
  }

  /**
   * gets id of user by his username
   */
  function getIdByUsername($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT id FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetchAll(); 
  }


  /**
   * Cancels reservation by user and house id
   */
  function cancelReservation($house_id, $username) {
    
    $user_id = getIdByUsername($username)[0]['id'];

    $reservation_ids = getReservationById($user_id);
    
    foreach ($reservation_ids as $reservation_id){

      if(getHouseOfReservation($reservation_id['idReserva'])[0]['idHabitacao'] == $house_id){
        $db = Database::instance()->db();
        $stmt = $db->prepare('DELETE FROM Reserva WHERE idHabitacao = ?');
        $stmt->execute(array($house_id));
      }
    }
  }

  /*
  * Get comments with photo and username
  */
  function getComments($houseID){
    
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT ClassificacaoPorCliente.descricaoAnfitriao,Utilizador.picture, Utilizador.username , ClassificacaoPorCliente.classificacaoAnfitriao
    FROM ClassificacaoPorCliente,Reserva,Efetua,Utilizador
    WHERE ClassificacaoPorCliente.idReserva=Reserva.idReserva and Reserva.idReserva=Efetua.idReserva
    and Efetua.idCliente=ClassificacaoPorCliente.idCliente and Utilizador.id=Efetua.idCliente and Reserva.idHabitacao= ?');
    $stmt->execute(array($houseID));
    return $stmt->fetchAll(); 
  }

  /**
   * Inserts a new house into the database. return the id of the house inserted
   */
  function insert_comment($stars,  $description, $id) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('INSERT INTO ClassificacaoPorCliente VALUES(? , ? , ? , ? , ? , ? , ?, ? , ?)');
    //auto increment id of the houses
    $stmt->execute(array (NULL, $stars, NULL, NULL, NULL, $stars, $description, NULL, $id));
    return $db->lastInsertId();
  }




?>

