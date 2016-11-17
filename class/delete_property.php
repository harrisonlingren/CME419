<?php
  include('header.php');
  include('error_report.php');
  require('db_connect.php');

  $prop = $_POST['updateID'];
  $get_delete_query = "select street, city, state, zip FROM location where property_id = $prop";
  $get_delete_rows = mysqli_query($dbc, $get_delete_query);

  if ($get_delete_rows) {
    $delete_data = mysqli_fetch_array($get_delete_rows, MYSQLI_ASSOC);
  }
?>

<p>You have selected to delete the following property:</p>
<?php echo '<h3>' . $delete_data["street"] . ',' . $delete_data["city"] . ',' . $delete_data["state"] . $delete_data["zip"] . '</h3>'; ?>
<form action="delete_submit.php" method="post">
  <input type="hidden" name="updateID" value="<?php echo $prop; ?>" />
  <input type="submit" name="deleteButton" id="deleteButton" />
  <input type="button" name="noDelete" id="delteButton" onclick="location.href('admin.php');" value="Cancel" />
</form>

<?php include('footer.php'); ?>
