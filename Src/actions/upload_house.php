<?php
  include_once('../includes/database.php');
  include_once('../includes/session.php');
  include_once('../database/db_user.php');
  include_once('../database/db_list.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $id = $_POST['house_id'];

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
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload house image, try again please!');
        die(header('Location: ../pages/myLists.php'));
      }
      else
      {      

        if(getHousePhoto($id) == 0)
          update_house_picture($id, 1);
    
        // Generate filenames for original, small and medium files
        $originalFileName = "../images/houses/originals/$id.jpg";
        $smallFileName = "../images/houses/thumbs_small/$id.jpg";
        $mediumFileName = "../images/houses/thumbs_medium/$id.jpg";
      
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
      $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload house image, only jpg, bmp, jpeg , gif and png are valid formats to the picture !');
      //continues in the edit_house page of the house the user is changing
      die(header("Location: ../pages/edit_house.php?house=$id"));
    } 
  }
  else
  {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload house image, try a smaller one!');
    //continues in the edit_house page of the house the user is changing
    die(header("Location: ../pages/edit_house.php?house=$id"));
  }
  header("Location: ../pages/myList.php");

?>