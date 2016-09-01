<!DOCTYPE html>
<html>
<head>
  <title>Testing PHP</title>
</head>
<body>
  <?php
    $firstName = 'Bob';
    $lastName = 'Smith';
    $item = 'shirt';
    $color = 'Red';
    $price = 9.98;
    $quantity = 2;
    $subtotal = $price * $quantity;
    $total = $subtotal * 1.07;
  ?>

  <hr />
  <h3>Content that is required:</h3>

  <ul>
    <li>
      <?php echo 'Name: $firstName $lastname' ?>
    </li>
    <li>
      <?php echo 'Item: $color $item' ?>
    </li>
    <li>
      <?php echo 'Item Price: $price' ?>
    </li>
    <li>
      <?php echo 'Quantity: $quantity' ?>
    </li>
    <li>
      <?php echo 'Subtotal: $' + 'number_format($subtotal, 2)' ?>
    </li>
    <li>
      <?php echo 'Total: $' + 'number_format($total, 2)' ?>
    </li>
  </ul>

</body>
</html>
