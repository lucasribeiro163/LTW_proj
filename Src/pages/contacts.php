<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');

  // Verify if user is logged in
  if (isset($_SESSION['username']))
    draw_header($_SESSION['username']);
  else draw_header(null);
  
  draw_contacts();
  draw_footer();
?>