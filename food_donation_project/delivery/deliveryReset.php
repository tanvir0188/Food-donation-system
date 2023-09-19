<?php
include '../connection.php';

if (isset($_POST['reset'])) {

    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];


    $sql = "SELECT * FROM delivery_persons WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE delivery_persons SET password = '$hashedPassword' WHERE email = '$email'";
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

    <title>Reset Password</title>
    <link rel="stylesheet" href="deliverycss.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <div class="center">
        <h1>Reset Password</h1>
        <form method="post">
            <div class="txt_field">
                <input type="email" name="email" required />
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" id="new_password" name="new_password" required />
                <span></span>
                <label>Password</label>


            </div>

            <input type="submit" value="Reset" name="reset">
            <div class="signup_link">
                Go to <a href="deliverylogin.php">Sign in</a>
            </div>
        </form>
    </div>


</body>

</html>