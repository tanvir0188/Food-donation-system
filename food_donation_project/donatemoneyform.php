<?php
include("login.php");


if ($_SESSION['name'] == '') {
    header("location: signin.php");
}


$connection = mysqli_connect("localhost:3306", "root", "");
$db = mysqli_select_db($connection, 'demo');


if (isset($_POST['submit'])) {

    $amount = mysqli_real_escape_string($connection, $_POST['amount']);
    $email = $_SESSION['email'];
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phoneno = mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district = mysqli_real_escape_string($connection, $_POST['district']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    $query = "insert into donate_money(email,
    amount, name, phoneno, location, address) 
    values('$email','$amount','$name', '$phoneno', '$district', '$address')";
    $query_run = mysqli_query($connection, $query);

    $errors = [];
    if (empty($amount) || !is_numeric($amount) || $amount == 0) {
        $errors[] = "Valid amount is required";
    }




    if (!empty($errors)) {
        echo '<div style="color: red;">';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    } else if ($query_run) {

        echo '<script type="text/javascript">alert("Thank you for your donation!")</script>';
        header("location:delivery.html");
    } else {
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Donation Form</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body style="background-color: #06C167;">
    <div class="min-h-screen flex items-center justify-center">
        <div class="regformf">
            <form action="" method="post">
                <p class="logo">Money <b style="color: #06C167; ">Donate</b></p>

                <div class="input">
                    <label for="amount">Donation Amount (TK):</label>
                    <input type="number" id="amount" name="amount" step="0.01" required />
                </div>

                <div class="input">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo "" . $_SESSION['name']; ?>" required />
                </div>

                <div class="input">
                    <label for="phoneno">Phone Number:</label>
                    <input type="text" id="phoneno" name="phoneno" maxlength="11" pattern="[0-9]{11}" required />
                </div>
                <div class="input">
                    <label for="location"></label>
                    <label for="district">District:</label>
                    <select id="district" name="district" class="p-2 border border-black">
                        <option value="Dhaka">Dhaka</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Rajbari">Rajbari</option>
                    </select>

                    <label for="address" style="padding-left: 10px;">Address:</label>
                    <input type="text" id="address" name="address" required /><br>
                </div>


                <div class="btn">
                    <button type="submit" name="submit">Donate</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>