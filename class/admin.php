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

    <?php
    if ($dbc) {
      echo "<br />connected!<br />";
    } else {
      echo "<br />not connected!<br />";
    }

    $populate_query = "SELECT * FROM location";
    $run_query = mysqli_query($dbc, $populate_query);

    if($check_query) {
      echo "<table><tr><th>Street Address</th><th>City</th><th>State</th></tr></table>";
      while($row=mysqli_fetch_array($run_query, MYSQLI_ASSOC)) {
        echo '<tr><td>' . $row["street"] . '</td><td>' . $row["city"] . '</td><td>' . $row["state"] . '</td></tr>';
        echo '<td><input type="button" id="' . $row["property_id"] . '" name="property" value=""/></td>';
      }
      echo '</table>';
    } else {
      echo $result;
      echo $dbc;
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
