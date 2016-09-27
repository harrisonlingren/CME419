<?php
  function getMpg($m, $g) {
    $mpg = $m / $g;
    return number_format($mpg, 2, '.', '');
  }

  function getBool($m, $r) {
    switch ($r) {
      case 'bad':
        if ($m < 18) {return true;}
      case 'avg':
        if ($m > 17 && $m < 27) {return true;}
      case 'good':
        if ($m > 26) {return true;}
      default:
        return false;
        break;
    }
  }

  $miErr = "";
  $galErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["miles"])) {
      $miErr = "Miles value is required";
    } else {
      $miles = $_POST['miles'];
    }

    if (empty($_POST["gallons"])) {
      $galErr = "Gallons value is required";
    } else {
      $inches = $_POST['gallons'];
    }

    $mpg = getMpg($miles, $gallons);
  }
?>

<form action="" method="post">
  <label for="miles">Miles Driven</label><input type="text" id="miles" name="miles" /><br />
  <label for="gallons">Gallons of Gas Used</label><input type="text" id="gallons" name="gallons" /><br /><br />
  <label>Car Efficiency</label>
  <input type="radio" id="bad" <?php echo "selected=" . getBool($mpg, "bad"); ?> /><label for="bad">Bad Efficiency</label><br />
  <input type="radio" id="avg" <?php echo "selected=" . getBool($mpg, "avg"); ?> /><label for="avg">Average Efficiency</label><br />
  <input type="radio" id="good" <?php echo "selected=" . getBool($mpg, "good"); ?> /><label for="good">Good Efficiency</label><br /><br />
  <button type="submit">Check Efficiency</button>
</form>

<?php
    echo "<h3>MPG is: $mpg</h3>";
    echo "<br />$miErr<br />$galErr";
?>
