<?php
  session_start();
  // Destroy session
  if(session_destroy()) {
    // Redirecting to homepage
    header("Location: http://".$_SERVER['HTTP_HOST'].'/index.php');
  }
?>