<?php
  session_start();

  session_destroy();

  // Redirect to the login page or any other desired page
  header("Location: ../auth/login.php");
  exit();
?>
 