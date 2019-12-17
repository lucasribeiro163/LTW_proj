<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $username = $_POST['username'];
  

  if (checkIfUsernameExists( $username) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username is being use already!');
    die(header('Location: ../pages/editProfile.php'));
  }

  //picture of the person is associated with her username, so we have to rename files
  $oldUsername = $_SESSION['username'];
  $originalFileName = "../images/person/originals/$oldUsername.jpg";
  $smallFileName = "../images/person/thumbs_small/$oldUsername.jpg";
  $mediumFileName = "../images/person/thumbs_medium/$oldUsername.jpg";

  $newOriginalFileName = "../images/person/originals/$username.jpg";
  $newSmallFileName = "../images/person/thumbs_small/$username.jpg";
  $newMediumFileName = "../images/person/thumbs_medium/$username.jpg";

  //changes the images associated with the person to files with the new username
  if (file_exists($originalFileName)) {
    rename($originalFileName, $newOriginalFileName );
    rename( $smallFileName, $newSmallFileName);
    rename($mediumFileName, $newMediumFileName);
 }

  try {
    update_username($oldUsername, $username);
    session_destroy();
    session_start();
    $_SESSION['username'] = $username; //change log username to new username
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Our username was updated!');
    header('Location: ../pages/profile.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update username!');
    header('Location: ../pages/editProfile.php');
  }
?>