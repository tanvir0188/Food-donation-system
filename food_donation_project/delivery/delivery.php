<?php
ob_start();
include("connect.php");
include '../connection.php';
if ($_SESSION['name'] == '') {
  header("location:deliverylogin.php");
}
$name = $_SESSION['name'];
$city = $_SESSION['city'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$result = json_decode($result);


$id = $_SESSION['Did'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
  <link rel="stylesheet" href="../home.css">

  <link rel="stylesheet" href="delivery.css">
  <link rel="stylesheet" href="deliveryVid.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
  <header>
    <div class="logo">Food <b style="color: #06C167;">Donate</b></div>
    <div class="hamburger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
    <nav class="nav-bar">
      <ul>
        <li><a href="#home" class="active" style="text-decoration: none;">Home</a></li>
        <li><a href="deliverymyord.php" style="text-decoration: none;">myorders</a></li>
        <li><a href="../logout.php" style="text-decoration: none;">Logout</a></li>
      </ul>
    </nav>
  </header>
  <br>
  <script>
    hamburger = document.querySelector(".hamburger");
    hamburger.onclick = function() {
      navBar = document.querySelector(".nav-bar");
      navBar.classList.toggle("active");
    }
  </script>
  <?php


  ?>


  <div class="video-container">
    <video autoplay loop muted playsinline>
      <source src="../img/pexel.mp4" type="video/mp4">
    </video>
    <div class="video-overlay"></div>


    <div class="get">
      <?php



      $sql = "SELECT fd.Fid AS Fid,fd.location as cure, fd.name,fd.phoneno,fd.date,fd.delivery_by, fd.address as From_address, 
ad.name AS delivery_person_name, ad.address AS To_address
FROM food_donations fd
LEFT JOIN admin ad ON fd.assigned_to = ad.Aid where assigned_to IS NOT NULL and   delivery_by IS NULL and fd.location='$city';
";


      $result = mysqli_query($connection, $sql);




      if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
      }


      $data = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }


      if (isset($_POST['food']) && isset($_POST['delivery_person_id'])) {
        $order_id = $_POST['order_id'];
        $delivery_person_id = $_POST['delivery_person_id'];
        $sql = "SELECT * FROM food_donations WHERE Fid = $order_id AND delivery_by IS NOT NULL";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {

          die("Sorry, this order has already been assigned to someone else.");
        }


        $sql = "UPDATE food_donations SET delivery_by = $delivery_person_id WHERE Fid = $order_id";

        $result = mysqli_query($connection, $sql);


        if (!$result) {
          die("Error assigning order: " . mysqli_error($conn));
        }


        header('Location: ' . $_SERVER['REQUEST_URI']);

        ob_end_flush();
      }



      ?>
      <div class="log">
        <a href="deliverymyord.php" class="btn btn-primary btn-lg btn-block mb-3">My orders</a>

      </div>


      <div class="table-container">
        <div class="table-wrapper">
          <?php if (!empty($data)) { ?>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>phoneno</th>
                  <th>date/time</th>
                  <th>Pickup address</th>
                  <th>Delivery Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($data as $row) { ?>
                  <?php echo "<tr><td data-label=\"name\">" . $row['name'] . "</td><td data-label=\"phoneno\">" . $row['phoneno'] . "</td><td data-label=\"date\">" . $row['date'] . "</td><td data-label=\"Pickup Address\">" . $row['From_address'] . "</td><td data-label=\"Delivery Address\">" . $row['To_address'] . "</td>";
                  ?>


                  <td data-label="Action" style="margin:auto">
                    <?php if ($row['delivery_by'] == null) { ?>
                      <form method="post" action=" ">
                        <input type="hidden" name="order_id" value="<?= $row['Fid'] ?>">
                        <input type="hidden" name="delivery_person_id" value="<?= $id ?>">
                        <button type="submit" name="food">Take order</button>
                      </form>
                    <?php } else if ($row['delivery_by'] == $id) { ?>
                      Order assigned to you
                    <?php } else { ?>
                      Order assigned to another delivery person
                    <?php } ?>
                  </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          <?php } else { ?>
            <p style="font-size: 25px; text-align:center">No deliveries pending</p>
          <?php } ?>

          <br>
          <br>
          <br>
          <footer class="bg-dark text-white">
            <div class="container py-5">
              <div class="row justify-content-center">
                <div class="col-md-3">
                  <h5 class="mb-4">Social Media</h5>
                  <a class="btn btn-outline-light btn-floating me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-light btn-floating me-2" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-light btn-floating me-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>


                <div class="col-md-3">
                  <h5 class="mb-4">About Us</h5>
                  <p>
                    We are passionate individuals committed to addressing the issue of food waste in Bangladesh. Our goal is to create a system that connects food and money donors with charities and NGOs
                  </p>
                </div>

                <div class="col-md-3" style="padding-left: 150px;">
                  <h5 class="mb-3">Contact Us</h5>
                  <p class="mb-0">
                    Email: contact@example.com
                  </p>
                  <p>
                    Phone: +8801917322572
                  </p>
                </div>
              </div>
              <hr class="my-4">
            </div>


            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2023 Your Company. All rights reserved.
            </div>
          </footer>

</body>

</html>