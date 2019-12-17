<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $password1 = $_POST['password1'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $country = $_POST['country']; 
  $description = $_POST['description']; 

  // Remove disallowed characters
  $name = preg_replace ("/[^a-zA-Z\s]/", '', $name);

  // Remove disallowed characters (only numbers are accepted)
  $country = preg_replace ("/[^0-9]/", '', $country );
  
  // Remove disallowed characters
  $email = preg_replace ("/[^0-9\?\.çãõa-zA-Z@\s]/", '', $email);

  // Remove disallowed characters
  $description = preg_replace ("/[^0-9\?\.çãõa-zA-Z\s]/", '', $description);

  // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/signup.php'));
  }

  if ($password != $password1 ) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Passwords don\'t match!');
    die(header('Location: ../pages/signup.php'));
  }

  if (checkIfEmailExists($email) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email is being use already!');
    die(header('Location: ../pages/signup.php'));
  }

  if (checkIfUsernameExists($username) != null) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username is being use already!');
    die(header('Location: ../pages/signup.php'));
  }

  try {
    insertUser($username, $password, $email, $name, $country, $description);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/main_page.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to signup!');
    header('Location: ../pages/signup.php');
  }
?>