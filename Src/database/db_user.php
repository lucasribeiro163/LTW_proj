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

  function insertUser($username, $password, $email, $name) {
    $db = Database::instance()->db();

    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO Utilizador VALUES(?, ?, ?, ?, ?, ?)');
    $stmt->execute(array(NULL, $username, $name, $email, NULL, password_hash($password, PASSWORD_DEFAULT, $options)));

    // Get user id
    $id = $db->lastInsertId();
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

  function checkIfExists($username, $email) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE email = ?');
    $stmt->execute(array($email));
    return $stmt->fetch();
  }

  function getId($username){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return $user['id'];
  }

  function getPersonImage($username) {
    $id = getId($username);
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM imagesPersons WHERE id = ?');
    $stmt->execute(array($id));

    $exists = $stmt->fetch();
    return $exists['id'];
  }
?>
