<?php function draw_login() { 
/**
 * Draws the login section.
 */ ?>
  <section id="login">
    
    <header><h2>Login in</h2></header>

    <form method="post" action="../actions/action_login.php">
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="submit" value="Login">
    </form>

    <footer>
      <p>Don't have an account? <a href="signup.php">Signup!</a></p>
    </footer>

  </section>
<?php } ?>

<?php function draw_signup() { 
/**
 * Draws the signup section.
 */ ?>
  <section id="signup">

    <header><h2>New Account</h2></header>

    <form method="post" action="../actions/action_signup.php">
      <input type="text" name="username" placeholder="username" required> 
      <input type="text" name="name" placeholder="name" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="submit" value="Signup">
    </form>

    <footer>
      <p>Already have an account? So just <a href="login.php">Login!</a></p>
    </footer>

  </section>
<?php }

function draw_listing() { 
/**
 * Draws the signup section.
 */ ?>
  <section id="listing">

    <header><h1>Create your home's listing</h1></header>
    <h2>By filling the following requeriments</h2>

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
<?php } ?>