<?php
  function getBmi($h, $w) {
    $bmi = $w / ($h * $h) * 703;
    return number_format($bmi, 2, '.', '');
  }

  $ftErr = "";
  $inErr = "";
  $wtErr = "";
?>

<form action="" method="post">
  <label>Width</label><input type="text" name="feet" placeholder="feet" /><input type="text" name="inches" placeholder="inches" /><br />
  <label>Height</label><input type="text" name="weight" /><br /><br />
  <button type="submit">Calculate BMI</button>
</form>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["feet"])) {
      $ftErr = "Feet value is required";
    } else {
      $feet = $_POST['feet'];
    }

    if (empty($_POST["inches"])) {
      $inErr = "Inches value is required";
    } else {
      $inches = $_POST['inches'];
    }

    if (empty($_POST["weight"])) {
      $wtErr = "Weight value is required";
    } else {
      $weight = $_POST['weight'];
    }

    $height = ($feet * 12) + $inches;
    echo "<h3>BMI is: " . getBmi($height, $weight) . "</h3>";
    echo "<br />$ftErr<br />$inErr<br />$wtErr<br />";
  }
?>
