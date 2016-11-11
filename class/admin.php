<?php
include('header.php');
//include('error_report.php');
require('db_connect.php');
require('states.php');
?>
<h2>Admin Portal</h2>
  <div id="formDiv">
    <?php require('propert_form.php'); ?>
  </div>

  <div id="tableDiv">
    <input type="button" value="Add new property" id="addPropertyButton" onclick="goToForm()" name="addPropertyButton" />

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
        echo '<td><input type="button" id="' . $row["property_id"] . '" class="editBtn" name="property" value="Edit"/>';
        echo '<input type="button" id="' . $row["property_id"] . '" class="deleteBtn" name="property" value="Delete"/></td></tr>';
      }
      echo '</table>';
    } else {
      echo $result;
      echo 'Could not load query: ' . $populate_query;
    }
    ?>
  </div>

<?php include('footer.php'); ?>
