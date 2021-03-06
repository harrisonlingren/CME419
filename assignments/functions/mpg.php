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
      echo "Miles value is required<br />";
    } else {
      $miles = $_POST['miles'];
    }

    if (empty($_POST["gallons"])) {
      echo "Gallons value is required<br />";
    } else {
      $gallons = $_POST['gallons'];
    }
    $mpg = getMpg($miles, $gallons);
    $msg = "You get $mpg miles to the gallon.";
  }
?>

<form action="" method="post">
  <label for="miles">Miles Driven</label><input type="text" id="miles" name="miles" value="<?php echo $miles;?>"/><br />
  <label for="gallons">Gallons of Gas Used</label><input type="text" id="gallons" name="gallons" value="<?php echo $gallons;?>"/><br /><br />
  <label>Car Efficiency</label><br />
  <input type="radio" id="bad" selected="<?php echo getBool($mpg, 'bad') ? 'true' : 'false'; ?>" /><label for="bad">Bad Efficiency</label><br />
  <input type="radio" id="avg" selected="<?php echo getBool($mpg, 'avg') ? 'true' : 'false'; ?>" /><label for="avg">Average Efficiency</label><br />
  <input type="radio" id="good" selected="<?php echo getBool($mpg, 'good') ? 'true' : 'false'; ?>" /><label for="good">Good Efficiency</label><br /><br />
  <button type="submit">Check Efficiency</button>
</form>

<?php echo $msg;?>
