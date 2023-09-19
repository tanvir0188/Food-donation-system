<?php
include("login.php");


if ($_SESSION['name'] == '') {
    header("location: signin.php");
}
$connection = mysqli_connect("localhost:3306", "root", "");
$db = mysqli_select_db($connection, 'demo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $errors = [];
    if (empty($name) || empty($email) || empty($message)) {
        $errors[] = "valid input is required";
    }





    $query = "INSERT INTO user_feedback (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>
            alert('Feedback submitted successfully!');
            window.location.href = 'contact.html';
          </script>";
    } else {
        echo "<script>
            alert('Fill the form properly!');
            window.location.href = 'contact.html';
          </script>";
    }
    mysqli_close($connection);
}
