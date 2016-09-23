<?php

  $pageTitle = "Test page";
  include('header.php');

  $firstName = 'Bob';
  $lastName = 'Smith';
  $item = 'shirt';
  $color = 'Red';
  $price = 9.98;
  $quantity = 2;
  $subtotal = $price * $quantity;
  $SubtotalStr = number_format($subtotal, 2);
  $total = $subtotal * 1.07;
  $totalStr = number_format($total, 2);

  echo ($fullName . '<br />' . $color . " " . $item . ": " . $price . " each, x" . $quantity . "<br /> Total: " . $totalStr);

  include('footer.php');
?>
