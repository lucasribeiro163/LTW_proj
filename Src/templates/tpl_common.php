<?php function draw_header($username) { 
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
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans+Condensed:300" rel="stylesheet">
      <script src="../js/main.js" defer></script>
    </head>
    

    <body>
      <header id="options">
        <img src =../../Mockups/logo2.png alt="Rent a house">
        <a href="../../Src/pages/aboutUs.php"><i class="fas fa-info-circle"></i></a>
          <?php if ($username != NULL) { ?>
          <nav>
            <ul>
              <li><?=$username?></li>
              <li><a href="../actions/action_logout.php">Logout</a></li>
            </ul>
          </nav>
        <?php } ?>
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
    <div>Rent A House.Inc</div>
    </footer>
  </body>
</html>
<?php } ?>