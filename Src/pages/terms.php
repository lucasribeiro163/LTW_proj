<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');

  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    draw_header(null);
  else draw_header($_SESSION['username']); 

  draw_terms();
  draw_footer();
?>