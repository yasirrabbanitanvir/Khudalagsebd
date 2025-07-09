<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Khudalagsebd.com</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>

<div class="site-wrapper">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.html"> <img class="img-rounded" src="images/Khudalagse-logom2.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>

        <br>
        <br>
        <br>
        <br>

      

    <div class="container mt-4">
    <h2>Search Result</h2>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "online_rest"; 

    $conn = mysqli_connect($servername, $username, $password, $database);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

 
    if (isset($_GET['search'])) {
        $search_query = $_GET['search'];

    
        $query = "SELECT * FROM dishes WHERE title LIKE '%$search_query%'";
        $result = mysqli_query($conn, $query);

     
        if (mysqli_num_rows($result) > 0) {
            // Output the dishes
            echo "<div class='row'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-xs-12 col-sm-6 col-md-4 food-item'>";
                echo "<div class='food-item-wrap'>";
                echo "<img class='figure-wrap bg-image' src='admin/Res_img/dishes/{$row['img']}' alt='{$row['title']}'>";
                echo "<div class='distance'><i class='fa fa-pin'></i>1240m</div>";
                echo "<div class='rating pull-left'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i> </div>";
                echo "<div class='review pull-right'><a href='#'>198 reviews</a> </div>";
                echo "<div class='card-body'>";
                echo "<div class='content'>";
                echo "<h5 class='card-title'>{$row['title']}</h5>";
                echo "<p class='card-text'>Price: {$row['price']}</p>";
                echo "<form action='checkout.php' method='post'>";
                echo "<input type='hidden' name='title' value='{$row['title']}'>";
                echo "<input type='hidden' name='price' value='{$row['price']}'>";
                echo "</form>";
                echo "<form action='dishes.php' method='get'>";
                echo "<input type='hidden' name='res_id' value='{$row['rs_id']}'>";
                echo "<button type='submit' class='btn btn-danger'>Order Now</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
           
            echo "<p class='text-center'>No dishes found.</p>";
        }
    } else {
  
        echo "<p class='text-center'>No search query provided.</p>";
    }


    mysqli_close($conn);
    ?>
</div>




 <!-- start: FOOTER -->
 <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="images/Khudalagse-logom.png" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span> </div>
                    <div class="col-xs-12 col-sm-2 about color-gray">
                        <h5>About Us</h5>
                        <ul>
                            <li><a href="#">About us</a> </li>
                            <li><a href="#">History</a> </li>
                            <li><a href="#">Our Team</a> </li>
                            <li><a href="#">We are hiring</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                        <h5>How it Works</h5>
                        <ul>
                            <li><a href="#">Enter your location</a> </li>
                            <li><a href="#">Choose restaurant</a> </li>
                            <li><a href="#">Choose meal</a> </li>
                            <li><a href="#">Pay via credit card</a> </li>
                            <li><a href="#">Wait for delivery</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>Pages</h5>
                        <ul>
                            <li><a href="#">Search results page</a> </li>
                            <li><a href="#">User Sing Up Page</a> </li>
                            <li><a href="#">Pricing page</a> </li>
                            <li><a href="#">Make order</a> </li>
                            <li><a href="#">Add to cart</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                        <h5>Popular locations</h5>
                        <ul>
                            <li><a href="#">Mirpur-2, Dhaka</a> </li>
                            <li><a href="#">Mirpur-10, Dhaka</a> </li>
                            <li><a href="#">Mirpur-11, Dhaka</a> </li>
                            <li><a href="#">Mirpur-12, Dhaka</a> </li>
                            <li><a href="#">Mirpur-1, Dhaka</a> </li>
                            <li><a href="#">Rupnagar Rd</a> </li>
                            <li><a href="#">Commerce College Road</a> </li>
                            <li><a href="#">Sony Square | Mirpur-1</a> </li>
                            <li><a href="#">Bangla College Road</a> </li>
                            <li><a href="#">Mazar Rd</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- top footer ends -->
                <!-- bottom footer statrs -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>

                                <li>
                                    <a href="#"> <img src="images/Cod.png" alt="Cash on Delivery"> </a>
                                </li>
                                
                                <li>
                                    <a href="#"> <img src="images/bkash-logo.png" alt="Bkash"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/nagad-logo.png" alt="Nagad"> </a>
                                </li>
                                
                               <!--  <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Address</h5>
                            <p>Plot # 77-78, Road # 9, Rupnagar, Dhaka, Bangladesh</p>
                            <h5>Phone: <a href="tel:+01752-822254">01752-822254</a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Addition informations</h5>
                            <p>Yasir Rabbani Tanvir © Copyrights | 2024</p>
                        </div>
                    </div>
                </div>
                <!-- bottom footer ends -->
            </div>
        </footer>
        <!-- end:Footer -->
        </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>











<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>