<?php
include 'connection.php';

if (isset($_POST['sign'])) {

    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "select * from login where email='$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {

        echo "<h1><center>Account already exists</center></h1>";
    } else {

        $query = "insert into login(name,email,password,gender) values('$username','$email','$pass','$gender')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {


            header("location:signin.php");
        } else {
            echo '<script type="text/javascript">alert("data not saved")</script>';
        }
    }
}
?>




<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="loginstyle.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    </head>

    <body>

        <div class="container">
            <div class="regform">

                <form action=" " method="post">
                    <p class="logo">Food <b style="color: #06C167;">Donate</b></p>

                    <p id="heading">Create your account</p>

                    <div class="input">
                        <label class="textlabel" for="name">User name</label><br>

                        <input type="text" id="name" name="name" required />
                    </div>
                    <div class="input">
                        <label class="textlabel" for="email">Email</label>
                        <input type="email" id="email" name="email" required />






                    </div>
                    <label class="textlabel" for="password">Password</label>
                    <div class="password">

                        <input type="password" name="password" id="password" required />

                        <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>

                    </div>

                    <div class="radio">

                        <input type="radio" name="gender" id="male" value="male" required />
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Female</label>

                    </div>
                    <div class="btn">
                        <button type="submit" name="sign">Continue</button>
                    </div>



                    <div class="signin-up">
                        <p style="font-size: 20px; text-align: center;">
                            Already have an account?
                            <a href="signin.php">
                                Sign in
                            </a>
                            <br>
                            Go back to <a href="index.html">System</a>
                        </p>
                    </div>


                </form>
            </div>


        </div>



        <script src="admin/login.js"></script>

    </body>

    </html>