<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../page/login.php'));

  $title = $_POST['listingTitle'];
  $price = $_POST['price'];
  $location = $_POST['location'];
  $type_id = $_POST['Type'];
  $nr_bedrooms = $_POST['Nrbedrooms'];
  $nr_bathrooms = $_POST['Nrbathrooms'];
  $max_people = $_POST['maxGuests'];
  $description = $_POST['description'];
  $rating = 0;
  $city_id = $_POST['Country'];

  $id = getId($_SESSION['username']);

  try {
    insertHouse($id, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $city_id, $type_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'New house for rent!');
    header('Location: ../pages/main_page.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to enter new house!');
    header('Location: ../pages/editProfile.php');
  }
?>