<?php 
include_once('../database/db_user.php');

function draw_header($username) { 
/**
 * Draws the header for all pages. Receives an username
 * if the user is logged in in order to draw the logout
 * link.
 */?>
  <!DOCTYPE html>
  <html lang="en-us">

    <head>
      <title>Rent a house</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
      <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather|+Sans+Condensed:300">
      <script src="../js/dropbox.js" defer></script>
      <script src="../js/changeColor.js" defer></script>
      <script src="../js/changeImage.js" defer></script>
    </head>
    
    <body>
      <header id="options">
      <a href="../../Src/pages/login.php"><img src =../images/logo2.png alt="Rent a house"></a>
      <a href="../../Src/pages/contacts.php"><i class="fas fa-phone"></i></a>
      <a href="../../Src/pages/aboutUs.php"><i class="fas fa-info-circle"></i></a>
        <?php 
        if ($username != NULL) {  ?>
          <div class="dropdown">
            <button onclick="myFunction()" class="userDropdown"><?=$username?></button>
              <div id="myDropdown" class="dropdown-content">
              <a href="../../Src/pages/aboutUs.php">My places</a>
              <a href="../../Src/pages/aboutUs.php">My Lists</a>
              <a href="../../Src/pages/aboutUs.php">Rents</a>
              <a href="../../Src/pages/newHouse.php">Listing</a>
              <a href="../../Src/pages/profile.php">Profile</a>
              <a href="../actions/action_logout.php">Logout</a>
          </div>
        </div>
        <?php
        }
        ?>
      </header>
      <?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
          <?php foreach($_SESSION['messages'] as $message) { ?>
            <div class="<?=$message['type']?>"><?=$message['content']?></div>
          <?php } ?>
        </section>
      <?php unset($_SESSION['messages']); } ?>
<?php } ?>

<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
   <footer id="f1"> 
    <div>© 2019 Rent A House, Inc. All rights reserved.</div>
      <a>Change Color</a>
    </footer>
  </body>
</html>
<?php } ?>