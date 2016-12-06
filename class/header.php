<?php
  require('db_connect.php');
  require('states.php');
?>

<html>
<head>
  <title><?php echo 'Rental Properties'; ?></title>
  <link href="style.css" rel="stylesheet" />
</head>
<body>
  <header>
    <h1 class="title">Rental Properties</h1>
    <ul>
      <li><a href="list.php">List</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="admin.php">Administration</a></li>
    </ul>
  </header>
