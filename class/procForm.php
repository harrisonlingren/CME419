<!doctype html>
<html>
<head>

</head>

<body>
  <?php
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $birthMonth = $_POST['birthMonth'];
    $birthDay = $_POST['birthDay'];
    $birthYear = $_POST['birthYear'];
    $gender = $_POST['gender'];
    $major = $_POST['major'];
    $comments = $_POST['comments'];
    $fullName = $firstName . " " . $lastName;

    $msg = "<p>Thank you, $fullName for submitting your information. The following
    information was obtained from your form:</p>
    <br /><br />
    Email: $email <br />Birth date: $birthMonth $birthDay, $birthYear <br />Gender: $gender <br />Major(s): $major <br />Comments: $comments";

    mail($email, "Your submission", $msg);
    echo $msg;
  ?>
</body>

</html>
