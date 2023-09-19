<?php
include("login.php");

if ($_SESSION['name'] == '') {
    header("location: signup.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="profile.css">



</head>

<body>
    <header class="h-32 bg-blue-800">
        <div class="logo text-6xl text-blue-500">
            Food <b style="color: #06c167">Donate</b>
        </div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="profile.php" class="active">Profile</a></li>
            </ul>
        </nav>
    </header>
    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function() {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>








    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
            <h1 class="text-3xl font-semibold mb-4">Profile</h1>


            <div class="mb-4">
                <p class="mb-2">Name: <?php echo "" . $_SESSION['name']; ?></p>
                <p class="mb-2">Email: <?php echo "" . $_SESSION['email']; ?></p>
                <p class="mb-2">Gender: <?php echo "" . $_SESSION['gender']; ?></p>
                <br>
                <a href="logout.php" class=" px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4">Logout</a>
            </div>



            <hr class="my-4">

            <h2 class="text-2xl font-semibold mb-4">Your Donations</h2>

            <div class="table-container">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Food</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM food_donations WHERE email='$email'";
                        $result = mysqli_query($connection, $query);
                        if ($result == true) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td class='text-center py-2'>" . $row['food'] . "</td><td class='text-center py-2'>" . $row['type'] . "</td><td class='text-center py-2'>" . $row['category'] . "</td><td class='text-center py-2'>" . $row['date'] . "</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="table-container">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th class="text-center py-2">Amount of Money(tk)</th>
                            <th class="text-center py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $email = $_SESSION['email'];
                        $query = "SELECT * FROM donate_money WHERE email='$email'";
                        $result = mysqli_query($connection, $query);
                        if ($result == true) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td class='text-center py-2'>" . $row['amount'] . "</td><td class='text-center py-2'>" . $row['date'] . "</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>


    <script src="https://cdn.tailwindcss.com"></script>


</body>

</html>