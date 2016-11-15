<?php
include('header.php');
//include('error_report.php');
require('db_connect.php');
require('states.php');

$prop = $_POST['updateID'];
echo "<h3>ID: $prop</h3>";
?>


<h2>Admin Portal</h2>
<form method="POST" action="update_submit.php">

  <!-- Location fields -->
  <?php
    $get_loc_data = "select street, city, zip, county from location inner join school using (property_id) where type_id = 0 and location.property_id = $prop";
    $loc_data_query = mysqli_query($dbc, $get_loc_data);

    if ($loc_data_query) {
      $loc_data = mysqli_fetch_array($loc_data_query, MYSQLI_ASSOC);
    } else {
      echo "Could not fetch data for query: $loc_data_query";
    }
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

  <!-- Property fields -->
  <?php
    $get_prop_data = "select bed, bath, garage, pets, amenities, details.desc from res_info inner join details using (property_id) where res_info.property_id = $prop";
    $prop_data_query = mysqli_query($dbc, $get_prop_data);

    if ($prop_data_query) {
      $prop_data = mysqli_fetch_array($prop_data_query, MYSQLI_ASSOC);
    } else {
      echo "Could not fetch data for query: $prop_data_query";
    }
  ?>
  <fieldset>
    <legend>Property Details</legend>
    <input type="hidden" name="addType" value="residential" required/><br/>
    <label for="addBed">Bed:</label>
    <input type="number" id="addBed" required value="<?php echo $prop_data['bed']; ?>"/><br/>
    <label for="addBath">Bath:</label>
    <input type="number" id="addBath" name="addBath" required value="<?php echo $prop_data['bath']; ?>"/><br/>
    <label for="addGarage">Garage:</label>
    <input type="text" id="addGarage" name="addGarage" required value="<?php echo $prop_data['garage']; ?>"/><br/>
    <label>Are pets allowed?</label>
    <?php
      if ($prop_data['pets'] == 1) {
        echo '<input type="radio" id="noPets" name="addPets" value="0" required />
        <label for="noPets">No</label>
        <input type="radio" id="yesPets" name="addPets" value="1" required checked/>
        <label for="yesPets">Yes</label><br/>';
      } else {
        echo '<input type="radio" id="noPets" name="addPets" value="0" required checked />
        <label for="noPets">No</label>
        <input type="radio" id="yesPets" name="addPets" value="1" required />
        <label for="yesPets">Yes</label><br/>';
      }
    ?>
    <label for="addAmenities">Amenities:</label>
    <textarea id="addAmenities" name="addAmenities"><?php echo $prop_data['amenities']; ?></textarea><br/>
    <label for="addDesc">Description:</label>
    <textarea id="addDesc" name="addDesc"><?php echo $prop_data['desc']; ?></textarea><br/>
  </fieldset>

  <!-- School fields -->
  <?php
    $get_school_data = "select elementary, middle, high from school where property_id = $prop";
    $school_data_query = mysqli_query($dbc, $get_school_data);
    if ($school_data_query) {
      $school_data = mysqli_fetch_array($school_data_query, MYSQLI_ASSOC);
    } else {
      echo "Could not fetch data for query: $school_data_query";
    }
  ?>
  <fieldset>
    <legend>School Information</legend>
    <label for="elem">Elementary School:</label>
    <input type="text" for="elem" name="elem" required value="<?php echo $school_data['elementary']; ?>"/><br/>
    <label for="middle">Middle School:</label>
    <input type="text" for="middle" name="middle" required value="<?php echo $school_data['middle']; ?>"/><br/>
    <label for ="high">High School:</label>
    <input type="text" for "high" name="high" required value="<?php echo $school_data['high']; ?>"/><br/>
  </fieldset>

  <!-- Rent fields -->
  <?php
    $get_rent_data = "select rent, availability, status from rent where property_id = $prop";
    $rent_data_query = mysqli_query($dbc, $get_rent_data);
    if ($rent_data_query) {
      $rent_data = mysqli_fetch_array($rent_data_query, MYSQLI_ASSOC);
    } else {
      echo "Could not fetch data for query: $rent_data_query";
    }
  ?>
  <fieldset>
    <legend>Property Rent</legend>
    <label for="rent">Rent:</label>
    <input type="number" for="rent" name="rent" required value="<?php echo $rent_data['rent']; ?>"/><br/>
    <label>Rental Status:</label>

    <?php
      if ($rent_data['status'] == "0") {
        echo '<input type="radio" id="available" name="rentStatus" value="0" required checked/>
        <label for="available">Available</label>
        <input type="radio" id="leased" name="rentStatus" required value="1"/>
        <label for="leased">Leased</label><br/>';
      } else {
        echo '<input type="radio" id="available" name="rentStatus" value="0" required/>
        <label for="available">Available</label>
        <input type="radio" id="leased" name="rentStatus" value="1" required checked/>
        <label for="leased">Leased</label><br/>';
      }
    ?>

    <label for="availDate">Available Date:</label>
    <input type="date" id="availDate" name="availDate" required value="<?php echo $rent_data['availability']; ?>"/><br/>
  </fieldset>

  <input type="hidden" name="updateID" value="<?php echo $prop; ?>" />
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

<?php include('footer.php'); ?>
