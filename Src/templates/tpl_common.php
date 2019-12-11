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
      <input type="text" id="myInput" onkeyup="choose()" placeholder="Search for names.." title="Type in a name">

<ul id="myUL" >
  <li style="display:none"><a href="#">Aveiro</a></li>
  <li style="display:none"><a href="#">Braga</a></li>
  <li style="display:none"><a href="#">Coimbra</a></li>
  <li style="display:none"><a href="#">Evora</a></li>
  <li style="display:none"><a href="#">Faro</a></li>
  <li style="display:none"><a href="#">Funchal</a></li>
  <li style="display:none"><a href="#">Guimarães</a></li>
  <li style="display:none"><a href="#">Lisboa</a></li>
  <li style="display:none"><a href="#">Porto</a></li>
  <li style="display:none"><a href="#">Vila Nova de Gaia</a></li>
</ul>

<script>
function choose() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");//todas as opcoes
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if(filter =="")
            li[i].style.display = "none";
        else
        if(txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
        
    }
}
</script>
      <a href="../../Src/pages/contacts.php"><i class="fas fa-phone"></i></a>
      <a href="../../Src/pages/aboutUs.php"><i class="fas fa-info-circle"></i></a>
        <?php 
        if ($username != NULL) {  ?>
          <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><?=$username?></button>
              <div id="myDropdown" class="dropdown-content">
              <a href="../../Src/pages/aboutUs.php">My places</a>
              <a href="../../Src/pages/aboutUs.php">My Lists</a>
              <a href="../../Src/pages/aboutUs.php">My Rents</a>
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
      <button onclick="setColor()">Change Color</button>
    </footer>
  </body>
</html>
<?php } ?>