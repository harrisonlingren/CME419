<!doctype html>
<html>
<head>

</head>

<body>
  <form method="post" action="thanks.php">
    <input type="text" placeholder="First Name" required name="fName" id="fName" /><br />
    <input type="text" placeholder="Last Name" required name="lName" id="lName" /><br />
    <input type="text" placeholder="Email" required name="email" id="email" /><br />

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

    <select name="gender" id="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select><br />

    <select name="major" placeholder="Major..." id="major">
      <?php
        $majors = array(
          "Communication Science and Disorders",
          "Digital Media Production",
          "Interactive Media",
          "Recording Industry Studies",
          "Critical Communication and Media Studies",
          "Human Communication and Organizational Leadership",
          "Journalism",
          "Sports Media",
          "Strategic Communication",
          "Public Relations",
          "Advertising"
        );
        foreach ($majors as $x) {
          echo "<option value='$x'>$x</option>";
        }
      ?>
    </select><br />

    <input type="text" placeholder="Comments" name="comments" id="comments" /><br /><br />
    <button type="submit">Submit</button>
  </form>
</body>
</html>
