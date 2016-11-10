<?php
include('header.php');
//include('error_report.php');
require('db_connect.php');
?>

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

  <div id="addDiv">
    This is the Add Property
  </div>
  <div id="updateDiv">
    This is the Update Property
  </div>
  <div id="deleteDiv">
    This is the Delete Property
  </div>

  <script src="adminForm.js"></script>
</body>
</html>
