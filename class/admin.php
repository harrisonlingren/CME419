<?php
include('header.php');
//include('error_report.php');
require('db_connect.php');
?>

<html>
<head>
  <style>
    table {
      border-collapse: collapse;
    }
    table, td, th {
      border: 1px solid black;
    }
  </style>
</head>
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

    <?php
    if ($dbc) {
      echo "<br />connected!<br />";
    } else {
      echo "<br />not connected!<br />";
    }

    $populate_query = "select * from location";
    $run_query = mysqli_query($dbc, $populate_query);

    if($run_query) {
      echo "<table><tr><th>Street Address</th><th>City</th><th>State</th><th></th></tr>";
      while($row=mysqli_fetch_array($run_query, MYSQLI_ASSOC)) {
        echo '<tr><td>' . $row["street"] . '</td><td>' . $row["city"] . '</td><td>' . $row["state"] . '</td>';
        echo '<td><input type="button" id="edit-' . $row["property_id"] . '" name="property" value="Edit"/><input type="button" id="delete-' . $row["property_id"] . '" name="property" value="Delete"/></td></tr>';
      }
      echo '</table>';
    } else {
      echo $result;
      echo 'Could not load query: ' . $populate_query;
    }
    ?>
  </div>
  <div id="deleteDiv">
    This is the Delete Property
  </div>

  <script src="adminForm.js"></script>
</body>
</html>
