<?php
  function getBmi($h, $w) {
    $bmi = $weight / ($height * $height) * 703;
    return $bmi;
  }

  $ftErr = "";
  $inErr = "";
  $wtErr = "";
  $feet = 0;
  $inches = 0;
  $weight = 0;
?>

<form action="" method="post">
  <label>Width</label><input type="text" id="feet" placeholder="feet" /><input type="text" id="inches" placeholder="inches" /><br />
  <label>Height</label><input type="text" id="weight" /><br /><br />
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
    echo $ftErr + "\n" + $inErr + "\n" + $wtErr;
    echo "<br />Feet: $feet, Inches: $inches<br />Total Height: $height<br />Weight:$weight"

    echo getBmi($height, $weight);
  }
?>
