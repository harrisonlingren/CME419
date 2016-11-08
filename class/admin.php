<?php
include('header.php');
include('error_report.php');
require('db_connect.php');

<!doctype html>
<html>
<head></head>
<body>
  <form>
    <p>What would you like to do?</p>
    <select id="adminChoice">
      <option value="add">Add Property</option>
      <option value="update">Update Property</option>
      <option value="delete">Delete Property</option>
    </select>
    
  </form>
</body>
</html>
?>
