<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../page/login.php'));

  $listingTitle = $_POST['listingTitle'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $location = $_POST['Location'];
  $type = $_POST['Type'];
  $Nrbedrooms = $_POST['Nr of bedrooms'];
  $Nrbathroom = $_POST['Nr of bathroom'];
  $maxGuests = $_POST['maxGuests'];
  $description = $_Post['description'];

  if (checkIfLocationExists( $location) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username is being use already!');
    die(header('Location: ../pages/editProfile.php'));
  }

  try {
   // create_house($_SESSION['username'], $username);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'New house for sale!');
    header('Location: ../pages/main_page.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to enter new house!');
    header('Location: ../pages/editProfile.php');
  }
?>