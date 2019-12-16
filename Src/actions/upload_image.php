<?php
  include_once('../includes/database.php');
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  //only jpg, bmp, jpeg , gif anf png are valid formats to the picture
  $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
  $upload_exts = end(explode(".", $_FILES["image"]["name"]));
  if(($_FILES["image"]["size"] < 2000000)){
    if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg")
      || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/pjpeg"))
      && in_array($upload_exts, $file_exts))
    {
      if ($_FILES["image"]["error"] > 0)
      {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload image, try again please!');
        die(header('Location: ../pages/editProfile.php'));
      }
      else
      {      
        // Get image ID 
        $username = $_SESSION['username'];

        if(getPersonImage($username) == 0)
          insertPersonImage($username);
    
        // Generate filenames for original, small and medium files
        $originalFileName = "../images/person/originals/$username.jpg";
        $smallFileName = "../images/person/thumbs_small/$username.jpg";
        $mediumFileName = "../images/person/thumbs_medium/$username.jpg";
      
        // Move the uploaded file to its final destination
        move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
      
        // Crete an image representation of the original image
        $original = imagecreatefromjpeg($originalFileName);
      
        $width = imagesx($original);     // width of the original image
        $height = imagesy($original);    // height of the original image
        $square = min($width, $height);  // size length of the maximum square
      
        // Create and save a small square thumbnail
        $small = imagecreatetruecolor(200, 200);
        imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
        imagejpeg($small, $smallFileName);
      
        // Calculate width and height of medium sized image (max width: 400)
        $mediumwidth = $width;
        $mediumheight = $height;
        if ($mediumwidth > 400) {
          $mediumwidth = 400;
          $mediumheight = $mediumheight * ( $mediumwidth / $width );
        }
      
        // Create and save a medium image
        $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
        imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
        imagejpeg($medium, $mediumFileName);
      
      }
    }
    else {
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload image, only jpg, bmp, jpeg , gif and png are valid formats to the picture !');
      die(header('Location: ../pages/editProfile.php'));
    } 
  }
  else
  {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload image, try a smaller one!');
    die(header('Location: ../pages/editProfile.php'));
  }
  //see the new profile with the new profile image
  header("Location: ../pages/profile.php");
?>