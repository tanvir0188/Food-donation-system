<?php
include 'connection.php';

if (isset($_POST['reset'])) {

  $email = $_POST['email'];
  $newPassword = $_POST['new_password'];


  $sql = "SELECT * FROM login WHERE email = '$email'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE login SET password = '$hashedPassword' WHERE email = '$email'";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
      echo "<h1><center>Password reset successfully</center></h1>";
    } else {
      echo '<script type="text/javascript">alert("Password reset failed")</script>';
    }
  } else {
    echo "<h1><center>User not found</center></h1>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <link rel="stylesheet" href="loginstyle.css">

</head>

<body>
  <div class="container">
    <div class="regform">
      <form action="" method="post">
        <p class="logo">Food <b style="color: #06C167;">Donate</b></p>
        <p id="heading">Reset Password</p>

        <div class="input">
          <label class="textlabel" for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>

        <div class="input">
          <label class="textlabel" for="new_password">New Password</label>
          <input type="password" id="new_password" name="new_password" required />
        </div>

        <div class="btn">
          <button type="submit" name="reset">Reset Password</button>
        </div>

        <div class="signin-up">
          <p style="font-size: 20px; text-align: center;">Remember your password? <a href="signin.php"> Sign in</a></p>
        </div>
      </form>
    </div>
  </div>



</body>

</html>