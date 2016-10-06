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
    $artist = $_POST['artist'];
    $song = $_POST['song'];
    $rank = $_POST['rank'];
  ?>
  <form method="post" action="">
    <label for="song">Song</label>
    <input type="text" placeholder="Song title..." name="song" id="song" /><br />

    <label for="rank">Rank</label>
    <input type="text" placeholder="Rank..." name="rank" id="rank" /><br />

    <label for="artist">Artist</label>
    <input type="text" placeholder="Artist..." name="artist" id="artist" /><br />

    <br /><button type="submit" name="submit" id="submit">Submit</button>
  </form>

  <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $artist = $_POST['artist'];
      $song = $_POST['song'];
      $rank = $_POST['rank'];

      $servername = "localhost";
      $username = "hlingren";
      $password = "db_pass";
      $dbname = "hlingren";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO music (rank, song, artist) VALUES ('$rank', '$song', '$artist')";

      if ($conn -> query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();

      $msg = "<p>Thank you, $fullName for submitting your information. The following
      information was obtained from your form:</p>
      <br /><br />
      Song: $song <br />Rank: $rank <br />Artist: $artist";

      echo $msg;
    }
  ?>

</body>
</html>
