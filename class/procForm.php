<!doctype html>
<html>
<head>

</head>

<body>
  <?php
  $firstName = $_POST['fName'];
  $lastName = $_POST['lName'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $majors = $_POST['majors'];
  $comments = $_POST['comments'];

  $fullName = $firstName . " " . $lastName;

  echo "<p>Thank you, $fullName for submitting your information. The following
  information was obtained from your form:</p>";

  echo "Email: $email <br />Gender: $gender <br />Major(s): $majors <br />Comments: $comments";
  ?>
</body>

</html>
