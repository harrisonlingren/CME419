<?php include('header.php'); ?>

<form action="loggedin.php" method="POST">

  <label for="user">Username</label>
  <input type="text" name="user" id="user" />

  <label for="pass">Password</label>
  <input type="password" name="pass" id="pass" />

  <button type="submit">Submit</button>

</form>

<?php include('footer.php'); ?>
