<?php
include('header.html');
include('error_report.php');
require('db_connect.php');

$type=$_POST['addType'];
$street=$_POST['addStreet'];
$city=$_POST['addCity'];
$state=$_POST['states'];
$zip=$_POST['addZip'];
$bed=$_POST['addBed'];
$bath=$_POST['addBath'];
$garage=$_POST['addGarage'];
$pets=$_POST['addPets'];
$amenity=$_POST['addAmenities'];
$desc=$_POST['addDesc'];
$county=$_POST['addCounty'];
$elem=$_POST['elem'];
$middle=$_POST['middle'];
$high=$_POST['high'];
$rent=$_POST['rent'];
$status=$_POST['rentStatus'];
$availDate=$_POST['availDate'];
$newPropertyID='';

mysqli_autocommit($dbc, false);

$flag=TRUE;

//test the transaction
$testLocation="INSERT INTO location (street, city, state, zip, type_id) VALUES ('$street', '$city', '$state', '$zip', '$type')";
$testResidential="INSERT INTO res_info (bed, bath, garage, pets) VALUES ('$bed', '$bath', '$garage', '$pets')";
$testDetails="INSERT INTO details (amenities, details.desc) VALUES ('$amenity', '$desc')";
$testSchool="INSERT INTO school (county, elementary, middle, high) VALUES ('$county', '$elem', '$middle', '$high')";
$testRent="INSERT INTO rent (rent, status, availability) VALUES ('$rent', '$status', '$availDate')";

$query_array = array($testLocation, $testResidential, $testDetails, $testSchool, $testRent);

foreach ($query_array as $q) {
  echo "\n" . $q . "\n";
  $resultRun = mysqli_query($dbc, $q);

  if (!$resultRun) {
    $flag = false;
    echo "Error details: " . mysqli_error($dbc);
  }
}; mysqli_rollback($dbc);

if($flag) {
	mysqli_autocommit($dbc, true);

  $result = mysqli_query($dbc, $testLocation);
	if($result) {

  	$getID="SELECT property_id FROM rental_location WHERE street='$street'";
  	$resultID = mysqli_query($dbc, $getID);
  	$row=mysqli_fetch_array($resultID, MYSQLI_ASSOC);
  	$newPropertyID=$row['property_id'];

    if(!empty($newPropertyID)) {
      $addResidential="INSERT INTO res_info (property_id, bed, bath, garage, pets) VALUES ('$newPropertyID', '$bed', '$bath', '$garage', '$pets')";
  		$addDetails="INSERT INTO details (property_id, amenities, details.desc) VALUES ('$newPropertyID','$amenity', '$desc')";
  		$addSchool="INSERT INTO school (property_id, county, elementary, middle, high) VALUES ('$newPropertyID','$county', '$elem', '$middle', '$high')";
  		$addRent="INSERT INTO rent (property_id, rent, status, availability) VALUES ('$newPropertyID','$rent', '$status', '$availDate')";

      $add_array = array($addResidential, $addDetails, $addSchool, $addRent);
      foreach ($add_array as $q) {
        $exec_q = mysqli_query($dbc, $q);
      }
    }
	} else {
		echo "This did not work." . mysqli_error($dbc);
	}



	//mysqli_commit($dbc);
	echo "<p>The following property and property details have been added to the database:</p>";
	echo "<h3>Property #$newPropertyID: $street, $city, $state  $zip</h3>";
	echo "<p>Bed(s): $bed<br/>Bathroom(s): $bath</br>Garage: $garage<br/>Pets Allowed: $pets<br/>";
	echo "Amenities: $amenity<br/>Description: $desc<br>Elementary School: $elem<br/>Middle School: $middle<br/>";
	echo "High School: $high<br/>County: $county</p>";
	echo "<p>Rent: $rent per month<br/>Availability: $status<br/>Available Date: $availDate</p>";
} else {
	mysqli_rollback($dbc);
	echo "<p>The property was not added to the database. There was a problem with the form submission</p>";
};

include('../includes/footer.html');
?>
