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
      echo "connected!<br />";
    } else {
      echo "not connected!<br />";
    }

    $populate_table = "select street, city, state from location where type_id=1";
    $check_query = mysqli_query($dbc, $populate_table);

    if($check_query) {
      echo "<table><tr><th>Street Address</th><th>City</th><th>State</th></tr></table>";
      while($row=mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
        echo '<tr><td>' . $row["street"] . '</td><td>' . $row["city"] . '</td><td>' . $row["state"] . '</td></tr>';
        echo '<td><input type="button" id="' . $row["property_id"] . '" name="property" value=""/></td>';
      }
      echo '</table>';
    } else {
      echo $result;
      echo 'Could not load query: ' . $populate_table;
    }
    ?>


  </div>
  <div id="deleteDiv">
    This is the Delete Property
  </div>

  <script src="adminForm.js"></script>
</body>
</html>
