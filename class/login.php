<?php include('header.php'); ?>

<form action="loggedin.php" method="POST">

  <label for="user">Username</label>
  <input type="text" name="user" id="user" /> <br />

  <label for="pass">Password</label>
  <input type="password" name="pass" id="pass" /><br /><br />

  <button type="submit">Log in</button>

</form>

<?php include('footer.php'); ?>
