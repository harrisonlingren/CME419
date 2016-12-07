<?php include('header.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass = md5($pass);

    $login_q = "SELECT firstname FROM rental_users WHERE user = '$user' and pass = '$pass'";
    $exec_q = mysqli_query($dbc, $exec_q);

    if ($exec_q) {
      $user_name = mysqli_fetch_array($exec_q, MYSQLI_ASSOC);
      if (isset($user_name)) {
        $_SESSION['firstname'] = $user_name;
      } else {
        echo "User $user not found!";
      }
    } else {
      echo "Problem with query: $login_q";
    }
  } else {
    header('Location: https://blue.butler.edu/~hlingren/CME419/class/login.php');
  }

?>
