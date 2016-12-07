<?php
  if (!isset($_SESSION['firstname'])) {
    echo $_SESSION['firstname'];
    header('Location: https://blue.butler.edu/~hlingren/CME419/class/login.php');
  }

  include('header.php');
?>
<h2>Admin Portal</h2>


<label for="actionDropdown">Action:</label>
<select id="actionDropdown">
  <option value="update" checked>Update Property</option>
  <option value="add">Add Property</option>
  <option value="delete">Delete Property</option>
</select>

<div id="addDiv">
  <form method="post" action="add_submit.php">
    <fieldset>
      <legend>Property Information</legend>
      <label for="addStreet">Street:</label>
      <input type="text" id="addStreet" name="addStreet" required/><br/>
      <label for "addCity">City:</label>
      <input type="text" id="addCity" name="addCity" required/><br/>
      <label for="addState">State:</label>
      <select name="states" required>
      <?php foreach($states as $key => $value) {
        echo "<option value='$key'>$value</option>";
      } ?>
      </select><br/>
      <label for="addZip">Zip:</label>
      <input type="text" id="addZip" name="addZip" required/><br/>
      <label for="addCounty">County:</label>
      <input type="text" id="addCounty" name="addCounty" required/><br/>
    </fieldset>
    <fieldset>
      <legend>Property Details</legend>
      <input type="hidden" name="addType" value="residential" required/><br/>
      <label for="addState">Bed:</label>
      <input type="number" id="addBed" name="addBed" required/><br/>
      <label for="addBath">Bath:</label>
      <input type="number" id="addBath" name="addBath" required/><br/>
      <label for="addGarage">Garage:</label>
      <input type="text" id="addGarage" name="addGarage" required/><br/>
      <label>Are pets allowed?</label>
      <input type="radio" id="noPets" name="addPets" value="0" required/>
      <label for="noPets">No</label>
      <input type="radio" id="yesPets" name="addPets" value="1" required/>
      <label for="yesPets">Yes</label><br/>
      <label for="addAmenities">Amenities:</label>
      <textarea id="addAmenities" name="addAmenities"></textarea><br/>
      <label for="addDesc">Description:</label>
      <textarea id="addDesc" name="addDesc"></textarea><br/>
    </fieldset>
    <fieldset>
      <legend>School Information</legend>
      <label for="elem">Elementary School:</label>
      <input type="text" for="elem" name="elem" required/><br/>
      <label for="middle">Middle School:</label>
      <input type="text" for="middle" name="middle" required/><br/>
      <label for ="high">High School:</label>
      <input type="text" for "high" name="high" required/><br/>
    </fieldset>
    <fieldset>
      <legend>Property Rent</legend>
      <label for="rent">Rent:</label>
      <input type="number" for="rent" name="rent" required/><br/>
      <label>Rental Status:</label>
      <input type="radio" id="available" name="rentStatus" value="0" required/>
      <label for="available">Available</label>
      <input type="radio" id="leased" name="rentStatus" value="1"/>
      <label for="leased">Leased</label><br/>
      <label for="availDate">Available Date:</label>
      <input type="date" id="availDate" name="availDate" required/><br/>
    </fieldset>
    <input type="submit" value="Add Property" name="addSubmit" id="addSubmit"/>
    <input type="button" value="Cancel" id="cancelButton" name="cancelButton" onclick="leavePage()" />
  </form>
</div>

<div id="updateDiv">
  <div id="tableDivUpdate">
    <?php
      // if ($dbc) {
      //   echo "<br />connected!<br />";
      // } else {
      //   echo "<br />not connected!<br />";
      // }

      $populate_query = "select * from location where type_id = 0";
      $run_query = mysqli_query($dbc, $populate_query);

      if($run_query) {
        echo '<form action="update_property.php" method="post">
        <input type="submit" value="Update selected property" id="updateSubmit"/>
        <table><tr><th>Update?</th><th>Street Address</th><th>City</th><th>State</th></tr>';
        while($row=mysqli_fetch_array($run_query, MYSQLI_ASSOC)) {
          echo '<tr><td><input type="radio" name="updateID" id="' . $row['property_id'] . '" value="' . $row['property_id'] . '" /></td>';
          echo '<td>' . $row["street"] . '</td><td>' . $row["city"] . '</td><td>' . $row["state"] . '</td></tr>';
        }
        echo '</table></form>';
      } else {
        echo $result;
        echo 'Could not load query: ' . $populate_query;
      }
    ?>
  </div>
</div>

<div id="deleteDiv">
  <div id="tableDivDelete">
    <?php
      // if ($dbc) {
      //   echo "<br />connected!<br />";
      // } else {
      //   echo "<br />not connected!<br />";
      // }

      $populate_query = "select * from location where type_id = 0";
      $run_query = mysqli_query($dbc, $populate_query);

      if($run_query) {
        echo '<form action="delete_property.php" method="post">
        <input type="submit" value="Delete selected property" id="deleteSubmit"/>
        <table><tr><th>Delete?</th><th>Street Address</th><th>City</th><th>State</th></tr>';
        while($row=mysqli_fetch_array($run_query, MYSQLI_ASSOC)) {
          echo '<tr><td><input type="radio" name="updateID" id="' . $row['property_id'] . '" value="' . $row['property_id'] . '" /></td>';
          echo '<td>' . $row["street"] . '</td><td>' . $row["city"] . '</td><td>' . $row["state"] . '</td></tr>';
        }
        echo '</table></form>';
      } else {
        echo $result;
        echo 'Could not load query: ' . $populate_query;
      }
    ?>
  </div>
</div>

<script>
  function leavePage() {
    if (confirm("Are you sure you want to leave without saving?")) {
      updateProperty();
    }
  }
</script>

<?php include('footer.php'); ?>
