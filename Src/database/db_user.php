<?php
  include_once('../includes/database.php');

  /**
   * Verifies if a certain username, password combination
   * exists in the database. Use the sha1 hashing function.
   */
  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return ($password == $user['pass']);
  }

  function insertUser($username, $password, $email, $name,  $country) {
    $db = Database::instance()->db();

    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO Utilizador VALUES(?, ?, ?, ?, ?, ?)');
    $stmt->execute(array(NULL, $username, $name, $email, $country, password_hash($password, PASSWORD_DEFAULT, $options)));
    // Get user id
    $id = getId($username);
    $dbh = Database::instance()->db();
    // Insert image data into database
    $stmt = $dbh->prepare("INSERT INTO imagesPersons VALUES(?)");
    $stmt->execute($id);

  }

  function update_password($username, $password) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Utilizador SET pass = ? WHERE username = ?');
    $stmt->execute(array($password, $username));
  }

  function update_email($username, $email) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Utilizador SET email = ? WHERE username = ?');
    $stmt->execute(array($email, $username));
  }

  function update_username($username, $newUsername) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Utilizador SET username = ? WHERE username = ?');
    $stmt->execute(array($username, $newUsername));
  }

  function update_name($username, $name) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Utilizador SET nome = ? WHERE username = ?');
    $stmt->execute(array($name, $username));
  }

  function update_country($username, $country) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('UPDATE Utilizador SET idPais = ? WHERE username = ?');
    $stmt->execute(array($country, $username));
  }

  function checkIfEmailExists($email) {
    $db1 = Database::instance()->db();

    $stmt = $db1->prepare('SELECT * FROM Utilizador WHERE email = ?');
    $stmt->execute(array($email));
    return $stmt->fetch();
  }

  function checkIfUsernameExists($username ) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username  = ?');
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function getId($username){
    $dbm = Database::instance()->db();
    $stmt = $dbm->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return $user['id'];
  }

  function getPersonImage($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM imagesPersons WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function insertPersonImage($id) {
    // Database connection
    $db = Database::instance()->db(); 
    // Insert image data into database
    $stmt = $dbh->prepare("INSERT INTO imagesPersons VALUES(?)");
    $stmt->execute(array($id));
  }

  function getPersonName($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();
    return $user['nome'];
  }

  function getPersonEmail($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();
    return $user['email'];
  }

  
  function getPersonDescription($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();
    return $user['descricao'];
  }



  function getPersonCountry($username) {
    $db = Database::instance()->db();
    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();
    $country = $user['idPais'];

    $dbh = Database::instance()->db();
    $stmt1 = $dbh->prepare('SELECT * FROM Pais WHERE idPais = ?');
    $stmt1->execute(array($country));
    $countryName = $stmt1->fetch();
    return $countryName['nome'];
  }
?>
