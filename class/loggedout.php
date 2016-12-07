<?php
  include('header.php');

  session_unset();
  session_destroy();

  echo "<h1>You are now logged out.</h1>";
?>
