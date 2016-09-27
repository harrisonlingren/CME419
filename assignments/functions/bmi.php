<?php
  function getBmi($h, $w) {
    $bmi = $w / ($h * $h) * 703;
    return number_format($bmi, 2, '.', '');
  }

  function getWeightStat($b) {
    if ($b > 30) {
      return "obese";
    } elseif ($b > 24.9) {
      return "overweight";
    } elseif ($b > 18.5) {
      return "normal";
    } else {
      return "underweight";
    }
  }

  $ftErr = "";
  $inErr = "";
  $wtErr = "";
?>

<form action="" method="post">
  <label>Width</label><input type="text" name="feet" placeholder="feet" value="<?php echo $feet;?>"/><input type="text" name="inches" value="<?php echo $inches;?>"placeholder="inches" /><br />
  <label>Height</label><input type="text" name="weight" value="<?php echo $weight;?>"/><br /><br />
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
    $bmi = getBmi($height, $weight);

    echo "<h3>Your BMI is: " . $bmi . ". Your weight class is " . getWeightStat($bmi) . ".</h3>";
    echo "<br />$ftErr<br />$inErr<br />$wtErr<br />";
  }
?>
