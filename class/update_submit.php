<?php
include('header.php');
include('error_report.php');
require('db_connect.php');

$prop = $_POST['updateID'];
$street = $_POST['addStreet'];
$city = $_POST['addCity'];
$state = $_POST['addState'];
$zip = $_POST['addZip'];
$beds = $_POST['addBed'];
$bath = $_POST['addBath'];
$garage = $_POST['addGarage'];
$pets = $_POST['addPets'];
$rent = $_POST['rent'];
$availability = $_POST['availDate'];
$status = $_POST['rentStatus'];
$amenities = $_POST['addAmenities'];
$desc = $_POST['addDesc'];
$elementary = $_POST['elem'];
$middle = $_POST['middle'];
$high = $_POST['high'];
$county = $_POST['addCounty'];

$flag = TRUE;
mysqli_autocommit($dbc, false);

$update_queries = array();
$update_queries['location'] = "UPDATE location SET street='$street', city='$city', state='$state', zip='$zip' WHERE property_id = $prop";
$update_queries['res_info'] = "UPDATE res_info SET bed='$beds', bath='$bath', garage='$garage', pets='$pets' WHERE property_id = $prop";
$update_queries['rent'] = "UPDATE rent SET rent='$rent', availability='$availability', status='$status' WHERE property_id = $prop";
$update_queries['school'] = "UPDATE school SET high='$high', middle='$middle', elementary='$elementary', county='$county' WHERE property_id = $prop";
$update_queries['details'] = "UPDATE details SET amenities='$amenities', details.desc='$desc' WHERE property_id = $prop";

foreach($update_queries as $table=>$query) {
  $run_update = mysqli_query($dbc, $query);
  if (!$run_update) {
    $flag = false;
    echo "<br /><br /><b><i>Error on table:</i> $table</b> Details below:<br />" . mysqli_error($dbc);
  }
}

if ($flag) {
  if (mysqli_commit($dbc)) {
    echo "<br /><hr /><br /><h3>Success!</h3>";
  }
} else {
  echo "<br /><hr /><br /><h3>Property #$prop could not be updated. Please see your administrator for assistance.</h3>";
}

?>
