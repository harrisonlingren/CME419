<?php
  $prop = $_POST['property_id'];
?>

<form method="POST" action="update_submit.php">
  <?php
    $get_loc_data = "select street, city, state, zip, county from location inner join school using (property_id) where location.property_id = $prop";
    $loc_data_query = mysqli_query($dbc, $get_loc_data);
    $loc_data = mysqli_fetch_array($loc_data_query, MYSQLI_ASSOC);
  ?>
  <fieldset>
    <legend>Property Information</legend>
    <label for="addStreet">Street:</label>
    <input type="text" id="addStreet" name="addStreet" required value="<?php echo $loc_data['street']; ?>"/><br/>
    <label for "addCity">City:</label>
    <input type="text" id="addCity" name="addCity" required value="<?php echo $loc_data['city']; ?>"/><br/>
    <label for="addState">State:</label>
    <select name="states" required>
      <?php
        foreach($states as $key => $value) {
          if ($key == $loc_data['state']) {
            echo "<option value='$key' selected>$value</option>";
          } else {
            echo "<option value='$key'>$value</option>";
          }
        }
      ?>
    </select><br/>
    <label for="addZip">Zip:</label>
    <input type="text" id="addZip" name="addZip" required value="<?php echo $loc_data['zip']; ?>"/><br/>
    <label for="addCounty">County:</label>
    <input type="text" id="addCounty" name="addCounty" required value="<?php echo $loc_data['county']; ?>"/><br/>
  </fieldset>

  <?php
    $get_prop_data = "select bed, bath, garage, pets, amenities, desc from res_info inner join details using (property_id) where res_info.property_id = $prop";
    $prop_data_query = mysqli_query($dbc, $get_prop_data);
    $prop_data = mysqli_fetch_array($prop_data_query, MYSQLI_ASSOC);
  ?>
  <fieldset>
    <legend>Property Details</legend>
    <input type="hidden" name="addType" value="residential" required/><br/>
    <label for="addBed">Bed:</label>
    <input type="number" id="addBed" required/><br/>
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

  <?php
    $get_school_data = "select elementary, middle, high from school where location.property_id = $prop";
    $school_data_query = mysqli_query($dbc, $get_school_data);
    $school_data = mysqli_fetch_array($school_data_query, MYSQLI_ASSOC);
  ?>
  <fieldset>
    <legend>School Information</legend>
    <label for="elem">Elementary School:</label>
    <input type="text" for="elem" name="elem" required/><br/>
    <label for="middle">Middle School:</label>
    <input type="text" for="middle" name="middle" required/><br/>
    <label for ="high">High School:</label>
    <input type="text" for "high" name="high" required/><br/>
  </fieldset>

  <?php
    $get_rent_data = "select street, city, state, zip, county from location inner join school using (property_id) where location.property_id = $prop";
    $rent_data_query = mysqli_query($dbc, $get_rent_data);
    $rent_data = mysqli_fetch_array($rent_data_query, MYSQLI_ASSOC);
  ?>
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
  <input type="submit" value="Update Property" name="updateSubmit" id="updateSubmit"/>
  <input type="button" value="Cancel" id="cancelButton" name="cancelButton" onclick="leavePage()" />
</form>

<script>
  function leavePage() {
    if (confirm("Are you sure you want to leave without saving?")) {
      location.href='admin.php';
    }
  }
</script>
