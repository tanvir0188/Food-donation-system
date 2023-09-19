<?php
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
include "../connection.php";
include("connect.php");
if ($_SESSION['name'] == '') {
    header("location:signin.php");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>

    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'demo');



    ?>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="analytics.php">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Analytics</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-heart"></i>
                        <span class="link-name">Donates</span>
                    </a></li>
                <li><a href="feedback.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Feedbacks</span>
                    </a></li>
                <li><a href="adminprofile.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Profile</span>
                    </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>

            <ul class="logout-mode">
                <li><a href="../logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">

        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <p class="logo">Food <b style="color: #06C167; ">Donate</b></p>
            <p class="user"></p>

        </div>
        <br>
        <br>
        <br>



        <div class="activity">

            <div class="location">
                <!-- <p class="logo">Filter by Location</p> -->
                <form method="post">
                    <label for="location" class="logo">Select Location:</label>
                    <!-- <br> -->
                    <select id="location" name="location">
                        <option value="Dhaka">Dhaka</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Rajbari">Rajbari</option>

                    </select>
                    <input type="submit" value="Get Details">
                </form>
                <br>
                <p style="text-align:center; font-size:30px;"><b>Food donation</b></p>

                <?php
                // Get the selected location from the form
                if (isset($_POST['location'])) {
                    $location = $_POST['location'];

                    // Query the database for people in the selected location
                    $sql = "SELECT * FROM food_donations WHERE location='$location'";
                    $result = mysqli_query($connection, $sql);
                    //   $result = $conn->query($sql);

                    // If there are results, display them in a table
                    if ($result->num_rows > 0) {
                        // echo "<h2>Food Donate in $location:</h2>";

                        echo " <div class=\"table-container\">";
                        echo "    <div class=\"table-wrapper\">";
                        echo "  <table class=\"table\">";
                        echo "<table><thead>";
                        echo " <tr class= theader>
        <th >Name</th>
        <th>Food</th>
        <th>Category</th>
        <th>Phone Number</th>
        <th>Date & Time</th>
        <th>Address</th>
        <th>DonationQuantity</th>
        
    </tr>
    </thead><tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td data-label=\"name\">" . $row['name'] . "</td><td data-label=\"food\">" . $row['food'] . "</td><td data-label=\"category\">" . $row['category'] . "</td><td data-label=\"phoneno\">" . $row['phoneno'] . "</td><td data-label=\"date\">" . $row['date'] . "</td><td data-label=\"Address\">" . $row['address'] . "</td><td data-label=\"quantity\">" . $row['quantity'] . "</td></tr>";
                        }
                        echo "</tbody></table></div>";
                    } else {
                        echo "<p style=\"text-align: center; font-size:20px\">No results found.</p>";
                    }
                }
                ?>
                <br>
                <p style="text-align:center; font-size:30px;"><b>Money donation</b></p>

                <?php
                // Get the selected location from the form
                if (isset($_POST['location'])) {
                    $location = $_POST['location'];

                    // Query the database for people in the selected location
                    $sql = "SELECT * FROM donate_money WHERE location='$location'";
                    $result = mysqli_query($connection, $sql);
                    //   $result = $conn->query($sql);

                    // If there are results, display them in a table
                    if ($result->num_rows > 0) {
                        // echo "<h2>Food Donate in $location:</h2>";

                        echo " <div class=\"table-container\">";
                        echo "    <div class=\"table-wrapper\">";
                        echo "  <table class=\"table\">";
                        echo "<table><thead>";
                        echo " <tr class= theader>
        <th >Name</th>
        <th>Amount</th>
        <th>Phone Number</th>
        <th>Date & Time</th>
        <th>Address</th>
        
    </tr>
    </thead><tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td data-label=\"name\">" . $row['name'] . "</td><td data-label=\"amount\">" . $row['amount'] . "</td><td data-label=\"phoneno\">" . $row['phoneno'] . "</td><td data-label=\"date\">" . $row['date'] . "</td><td data-label=\"Address\">" . $row['location'] . "</td></tr>";
                        }
                        echo "</tbody></table></div>";
                    } else {
                        echo "<p style=\"text-align: center; font-size:20px\">No results found.</p>";
                    }
                }
                ?>
            </div>




        </div>
    </section>

    <script src="admin.js"></script>
    <style>
        .theader {
            background-color: green;
            color: white;
            padding: 10px;
            text-align: left;
            border: 5px solid white;
        }
    </style>
</body>

</html>