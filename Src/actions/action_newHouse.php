<?php
  include_once('../includes/session.php');
  include_once('../database/db_list.php');
  include_once('../database/db_user.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(header('Location: ../pages/login.php'));

  $title = $_POST['listingTitle'];
  $price = $_POST['price'];
  $location = $_POST['location'];
  $type_id = $_POST['Type'];
  $nr_bedrooms = $_POST['Nrbedrooms'];
  $nr_bathrooms = $_POST['Nrbathrooms'];
  $max_people = $_POST['maxGuests'];
  $description = $_POST['description'];
  $rating = 1;
  $city_id = $_POST['Country'];
  $picture = 1;
  $id = getUserId($_SESSION['username']);

  echo "title: " . $title. "<br>";
  echo "price: " . $price. "<br>";
  echo "id: " . $id. "<br>";
  echo "username: ". $_SESSION['username']. "<br>";
  $id = 5;

/*  // insert image
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
          $id = $_GET['house'];

          echo "Upload: " . $_FILES["file"]["name"] . "<br>";
          echo "Type: " . $_FILES["file"]["type"] . "<br>";
          echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
          echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

          if(getHousePhoto($id) == 0)
            insertHouseImage($id);
      
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

          echo "<div class='sucess'>"."Stored in: " .
          $originalFileName ."</div>";
        
        }
      }
      else {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'couldn\'t upload image, only jpg, bmp, jpeg , gif and png are valid formats to the picture !');
        //die(header('Location: ../pages/newHouse.php'));
      } 
    }
    else
    {
      $_SESSION['messages'][] = array('type' => 'success', 'content' => 'New house for rent without picture!');
      //die(header('Location: ../pages/main_page.php'));
    }*/
  
  try {
    $idHabitacao = insertHouse($id, $nr_bedrooms, $nr_bathrooms, $max_people, $title, $description, $location, $price, $rating, $city_id, $type_id);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'New house for rent!');
   // header('Location: ../pages/main_page.php');
  } catch (PDOException $e) {
    die($e->getMessage());
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to enter new house!');
    header('Location: ../pages/editProfile.php');
  }
?>