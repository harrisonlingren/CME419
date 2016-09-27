<?php
  function getArea($h, $w) {
    $area = $w * $h;
    return number_format($area, 2, '.', '');
  }

  $htErr = "";
  $wtErr = "";
?>

<form action="" method="post">
  <label for="aWidth">Width</label><input type="text" name="aWidth" id="aWidth" /><br />
  <label for="aHeight">Height</label><input type="text" name="aHeight" id="aHeight" /><br /><br />
  <button type="submit">Find Area</button>
</form>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["aWidth"])) {
      $wtErr = "Width value is required";
    } else {
      $width = $_POST['aWidth'];
    }

    if (empty($_POST["aHeight"])) {
      $htErr = "Weight value is required";
    } else {
      $height = $_POST['aHeight'];
    }

    $height = ($feet * 12) + $inches;
    echo "<h3>BMI is: " . getArea($height, $width) . "</h3>";
    echo "<br />$htErr<br />$wtErr<br />";
  }
?>
