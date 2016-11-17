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
$bath = $_POST['updateID'];
$garage = $_POST['addGarage'];
$pets = $_POST['addPets'];
$rent = $_POST['rent'];
$availability = $_POST['availDate'];
$status = $_POST['rentStatus'];
$amenities = $_POST['addAmenities'];
$desc = $_POST['addDesc'];

$update_location = "UPDATE location SET street='$street', city='$city', state='$state', zip='$zip' WHERE property_id = $prop\n";
$update_property = "UPDATE res_info SET bed='$beds', bath='$bath', garage='$garage', pets='$pets' WHERE property_id = $prop\n";
$update_rental = "UPDATE rent SET rent='$rent', availability='$availability', status='$status' WHERE property_id = $prop\n";
$update_details = "UPDATE details SET amenities='$amenities', details.desc='$desc' WHERE property_id = $prop";

echo $update_location . '<br />';
echo $update_property . '<br />';
echo $update_rental . '<br />';
echo $update_details . '<br />';

mysqli_autocommit($dbc, false);
mysqli_query($dbc, $update_location);
mysqli_query($dbc, $update_property);
mysqli_query($dbc, $update_rental);
mysqli_query($dbc, $update_details);

$result = $mysqli_commit($dbc);
if ($result) {
  echo $result . ": transaction succeeded!";
} else {
  echo $result . ": transaction failed.";
}

?>
