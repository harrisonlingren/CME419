<?php
  include('header.php');
  include('error_report.php');
  require('db_connect.php');

  $prop = $_POST['updateID'];
  $flag = TRUE;

  mysqli_autocommit($dbc, false);
  mysqli_begin_transaction($dbc, MYSQL_TRANS_START_READ_ONLY);

  $delete_queries = array();
  $delete_queries['location'] = "delete from location where property_id = $prop";
  $delete_queries['res_info'] = "delete from res_info where property_id = $prop";
  $delete_queries['details'] = "delete from details where property_id = $prop";
  $delete_queries['school'] = "delete from school where property_id = $prop";
  $delete_queries['rent'] = "delete from rent where property_id = $prop";

  foreach($delete_queries as $table=>$query) {
    $run_delete = mysqli_query($dbc, $query);
    if (!$run_delete) {
      $flag = false;
      echo "<br /><br /><b><i>Error on table:</i> $table</b> Details below:<br />" . mysqli_error($dbc);
    }
  }

  if ($flag) {
    if (mysqli_commit($dbc)) {
      echo "<br /><hr /><br /><h3>Success!</h3>";
    }
  } else {
    echo "<br /><hr /><br /><h3>Property #$prop could not be deleted. Please see your administrator for assistance.</h3>";
  }
?>
