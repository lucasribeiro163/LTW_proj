<?php function draw_login() { 
/**
 * Draws the login section.
 */ ?>
  <section id="login">
    
  <header>
      <h1>Welcome to our website</h1>
      <h2>Please log in using your credentials</h2>
  </header>

  <form method="post" action="../actions/action_login.php">
    <input type="text" name="username" placeholder="username" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="submit" value="login">
    <p>Don't have an account? <a href="signup.php">Signup!</a></p>
  </form>

  </section>

  <section id="someImage">
    <img src ="http://projectus.pt/wp-content/uploads/2018/10/007.jpg" alt="house">
  </section>
  
<?php } ?>

<?php function draw_signup() { 
/**
 * Draws the signup section.
 */ ?>
  <section id="signup">

    <header>
      <h1>Get ready to start.</h1>
      <h2>Please register so you can start.</h2>
    </header>

    <form method="post" action="../actions/action_signup.php">     
      <input type="email" name="email" placeholder="email" required>
      <input type="text" name="username" placeholder="username" required> 
      <input type="text" name="name" placeholder="name" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="password" name="password1" placeholder="password" required>     
      <input type="submit" value="signup">
      <p>Already have an account? So just <a href="login.php">Login!</a></p>
    </form>
  </section>

  <section id="someImage">
    <img src ="http://projectus.pt/wp-content/uploads/2018/10/007.jpg" alt="house">
  </section>

<?php }

function draw_listing() { 
/**
 * Draws the signup section.
 */ ?>
  <section id="listing">
    <header><h1>Create your home's listing.</h1></header>
    <h2>By filling the following requeriments.</h2>

    <form method="post" action="../actions/action_signup.php">
      <input type="text" name="listingTitle" placeholder="Enter a title for the listing" required> 
      <select name="Location" required>
        <option value="1" selected disabled>Location...</option>     
        <option value="Housebarn">1</option>
        <option value="flat">2</option>
        <option value="Apartment">3</option>
        <option value="Ranch-Style">4</option>
        <option value="Cabin">5</option>
        <option value="basement suite">6</option>
        <option value="Tiny home">7</option>
      </select> 
      <select name="Type" required>
        <option value="1" selected disabled>Type...</option>     
        <option value="Housebarn">1</option>
        <option value="flat">2</option>
        <option value="Apartment">3</option>
        <option value="Ranch-Style">4</option>
        <option value="Cabin">5</option>
        <option value="basement suite">6</option>
        <option value="Tiny home">7</option>
      </select> 
      <select name="Nr of bedrooms" required>
        <option value="1" selected disabled>Nr of bedrooms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>
      <select name="Nr of bathrooms" required>
        <option value="1" selected disabled>Nr of bathrooms</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>
      <textarea name="description" rows="4" cols="50">Enter a short description of the home.</textarea>
      <input type="submit" value="Submit">
    </form>

  </section>

  <section id="houseImage">
    <img src ="http://projectus.pt/wp-content/uploads/2018/10/007.jpg" alt="house">
  </section>
<?php } 

function draw_editProfile() { 
  /**
   * Draws the signup section.
   */ ?>
    <section id="editProfile">
  
      <header>
        <h1>Looking for a change.</h1>
        <h2>Edit your credentials below.</h2>
      </header>
  
      <form method="post" action="../actions/action_signup.php">     
        <input type="text" name="username" placeholder="username" required> 
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password1" placeholder="confirm password" required>     
        <select name="Country">
          <option value="Other" selected disabled>Home Contry</option>     
          <option value="Portugal">Portugal</option>
          <option value="United States of America">United States of America</option>
          <option value="Spain">Spain</option>
          <option value="France">France</option>
          <option value="United Kingdom">United Kingdom</option>
          <option value="Italy">Italy</option>
          <option value="Japan">Japan</option>        
          <option value="Angola">Angola</option>
          <option value="Australia">Australia</option>
          <option value="Finland">Finland</option>
          <option value="Mali">Mali</option>
          <option value="Peru">Peru</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="New Zealand">New Zealand</option>
          <option value="Turkey">Turkey</option>
          <option value="Brazil">Brazil</option>
          <option value="Argentina">Argentina</option>
        </select> 
        <input type="submit" value="edit">
      </form>

    </section>
  
    <section id="personImg">
      <img src="https://fotos.web.sapo.io/i/B1e04a0bb/19478664_y37lu.png" alt="person pic">
      <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
      </form>
    </section>
  
  <?php }

function draw_aboutUs(){
  /**
   * Draws the about us section.
   */ ?>
  <section id="aboutUs">
      <h1>About Us</h1>
  </section>

  <section id="descriptionAbout">
      <h3><p>This company started with the sole purpose of helping you find the home of your dreams.
         We quickly noticed a big hole in the market for an easy way to rent houses without dealing with the tedious process of it all.</p>
       <p> With Rent A House, it is as easy as clicking a button. All the houses available on this website are verified for your safety. 
         Feel free to add your home or to look around at our great range of selection and enjoy!</p></h3>
    </section>

<?php 
}

function draw_contacts(){
  /**
   * Draws the about us section.
   */ ?>
  <section id="contacts">
    <h1>Get in touch</h1>
    <img src="https://www.thebighousemuseum.com/wp-content/uploads/2013/07/about-the-big-house-1.jpg"></img>
  </section>

  <section id="rectangles">
    <div id="contactRectangle1">
      <p>jnfjbfi</p>
    </div>

    <div id="contactRectangle2">
      <p>jnfjbfi</p>
    </div>
  </section>

  <section id="descriptionAbout">
      <h3><p>This company started with the sole purpose of helping you find the home of your dreams.
         We quickly noticed a big hole in the market for an easy way to rent houses without dealing with the tedious process of it all.</p>
       <p> With Rent A House, it is as easy as clicking a button. All the houses available on this website are verified for your safety. 
         Feel free to add your home or to look around at our great range of selection and enjoy!</p></h3>
    </section>

<?php 
}