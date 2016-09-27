<?php
  function getArea($h, $w) {
    $area = $w * $h;
    return number_format($area, 2, '.', '');
  }

  $htErr = "";
  $wtErr = "";
?>

<form action="" method="post">
  <label for="aWidth">Width</label><input type="text" name="aWidth" id="aWidth" value="<?php echo $width;?>"/><br />
  <label for="aHeight">Height</label><input type="text" name="aHeight" id="aHeight" value="<?php echo $height;?>"/><br /><br />
  <button type="submit">Find Area</button>
</form>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["aWidth"])) {
      echo "Width value is required<br />";
    } else {
      $width = $_POST['aWidth'];
    }

    if (empty($_POST["aHeight"])) {
      echo "Height value is required<br />";
    } else {
      $height = $_POST['aHeight'];
    }
    echo "<h3>Your area is: " . getArea($height, $width) . "</h3>";
  }
?>
