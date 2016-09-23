<!doctype html>
<html>
<head>
  <style>
    form {margin:20px;background-color:rgb(200,200,200); border:1px solid gray;
    padding:20px; border-radius:10px; float:left;}
    label {display:inline-block; width:100px; text-align:right;vertical-align:top;}
    input, textarea, select {margin-bottom:10px; border:1px solid gray; border-radius:5px;
    padding:4px; width:150px;}
    #submit {width: 100px; background-color: rgb(50,150,50); color: white; border: 1px solid white;
    position: relative;left: 105px;}
    input[type=radio] {width:10px;margin-right:5px;}
    [for$="male"] {width:50px; text-align:left;}
    div {float:left;margin-left:25px;}
  </style>
</head>

<body>
  <?php
    $msg = '';
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
  ?>
  <form method="post" action="">
    <label for="fName">First Name</label>
    <input type="text" placeholder="First Name" name="fName" id="fName" /><br />

    <label for="lName">Last Name</label>
    <input type="text" placeholder="Last Name" name="lName" id="lName" /><br />

    <label for="email">Email</label>
    <input type="text" placeholder="Email" name="email" id="email" /><br />

    <label>Birthday</label>
    <select name="birthMonth" placeholder="Month" id="birthMonth" />
      <?php
        $months = array('January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December');
        foreach ($months as $x) {
          echo "<option value='$x'>$x</option>";
        }
      ?>
    </select>

    <select name="birthDay" placeholder="Day" id="birthDay" />
      <?php
        for ($x=1;$x<=31;$x++) {
          echo "<option value='$x'>$x</option>";
        }
      ?>
    </select>

    <select name="birthYear" placeholder="Year" id="birthYear" />
      <?php
        for ($x=1980;$x<=2010;$x++) {
          echo "<option value='$x'>$x</option>";
        }
      ?>
    </select><br />

    <label>Gender:</label>
    <input type="radio" name="gender" value="male" id="male" <?php if($gender=="male") {echo 'checked="checked"';} ?> >Male</input>
    <input type="radio" name="gender" value="female" id="female" <?php if($gender=="female") {echo 'checked="checked"';} ?> >Female</input>
    <br />

    <label>Major</label>
    <select name="major" placeholder="Major..." id="major">
      <?php
        $majors = array(
          "CSD"=>"Communication Science and Disorders",
          "DMP"=>"Digital Media Production",
          "IM"=>"Interactive Media",
          "RIS"=>"Recording Industry Studies",
          "CCMS"=>"Critical Communication and Media Studies",
          "HCOL"=>"Human Communication and Organizational Leadership",
          "J"=>"Journalism",
          "SM"=>"Sports Media",
          "SC"=>"Strategic Communication",
          "PR"=>"Public Relations",
          "A"=>"Advertising"
        );
        foreach ($majors as $x => $y) {
          echo "<option value='$x'>$y</option>";
        }
      ?>
    </select><br />

    <label for="comments">Comments</label>
    <textarea placeholder="Comments" name="comments" id="comments"><?php echo $comments; ?></textarea>
    <br /><br />
    <button type="submit" name="submit" id="submit">Submit</button>
  </form>

  <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
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
      
      if (empty($firstName) || empty($lastName) || empty($email) || !validate($email)) {
        $msg = '<p>Your form did not submit. Please include the following:</p><ul>';
        if (empty($firstName)) {$msg .= '<li>First Name: ' . $firstName . '</li>';}
        if (empty($lastName)) {$msg .= '<li>Last Name: ' . $lastName . '</li>';}
        if (empty($email) || !validate($email)) {$msg .= '<li>Email:' . $email . '</li>';}
      } else {
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }*/

        $msg = "<p>Thank you, $fullName for submitting your information. The following
        information was obtained from your form:</p>
        <br /><br />
        Email: $email <br />Birth date: $birthMonth $birthDay, $birthYear <br />Gender: $gender <br />Major(s): $majors[$major] <br />Comments: $comments";

        $headers = "MIME-Version: 1.0\r\nContent-type:text/html;charset=UTF-8\r\n";
        mail($email, "Your submission", $msg, $headers);
      }
      echo $msg;
    }
  ?>

</body>
</html>
