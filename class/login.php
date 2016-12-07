<?php include('header.php'); ?>

<form action="loggedin.php" method="POST">

  <label for="user">Username</label><br />
  <input type="text" name="user" id="user" /> <br />

  <label for="pass">Password</label><br />
  <input type="password" name="pass" id="pass" /><br /><br />

  <button type="submit">Submit</button>

</form>

<?php include('footer.php'); ?>
