<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $title = $_POST['listingTitle'];
  // Remove disallowed characters
  $title = preg_replace ("/[^0-9\.ça-zA-Z\s]/", '', $title);
  $price = $_POST['price']; //only numbers allowed
  $location = $_POST['location'];
  // Remove disallowed characters
  $type_id = $_POST['Type'];
  $nr_bedrooms = $_POST['Nrbedrooms'];
  $nr_bathrooms = $_POST['Nrbathrooms'];
  $max_people = $_POST['maxGuests'];
  $description = $_POST['description'];

  // Remove disallowed characters
  $description = preg_replace ("/[^0-9\?\.ça-zA-Z\s]/", '', $description);
  $rating = 1;
  $country_id = $_POST['Country'];
  $username = $_SESSION['username'];
  $personId = getPersonId($username);
  
  // Remove disallowed characters (only numbers are accepted)
  $country_id = preg_replace ("/[^0-9]/", '', $country_id );

  try {
    $id = insertHouse($personId, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $country_id, $type_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'New house for rent!');
    header("Location: ../pages/myList");
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to enter new house!');
    header('Location: ../pages/newHouse.php');
  }
?>