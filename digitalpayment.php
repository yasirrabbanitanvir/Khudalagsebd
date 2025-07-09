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
    <title>Khudalagsebd.com</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Animsition -->
    <link href="css/animsition.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="#">
</head>
<body>

<div class="site-wrapper">
    <!-- Header starts -->
    <header id="header" class="header-scroll top-header headrom">
        <!-- Navbar -->
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img class="img-rounded" src="images/Khudalagse-logom2.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse" aria-controls="mainNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse float-lg-right" id="mainNavbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="restaurants.php">Restaurants</a> </li>
                        <?php
                        if(empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                                  <li class="nav-item"><a href="registration.php" class="nav-link">Signup</a></li>';
                        } else {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link">Your Orders</a></li>
                                  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar ends -->
    </header>

    <br>
    <br>
    <br>
    <br>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Digital Payment</h1>

        <form>
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input name="mod" type="radio" id="bkash" value="bkash" class="custom-control-input">
                    <label class="custom-control-label" for="bkash"><img src="images/bkash-logo.png" alt="Bkash"></label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input name="mod" type="radio" id="nagad" value="nagad" class="custom-control-input">
                    <label class="custom-control-label" for="nagad"><img src="images/nagad-logo.png" alt="Nagad"></label>
                </div>
            </div>

            <div class="form-group">
                <button type="button" onclick="handlePaymentOption();" class="btn btn-success btn-block">Process</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function handlePaymentOption() {
            var selectedPaymentOption = document.querySelector('input[name="mod"]:checked');

            if (selectedPaymentOption) {
                if (selectedPaymentOption.value === 'bkash') {
                    window.location.href = "bkash-payment.php";
                } else if (selectedPaymentOption.value === 'nagad') {
                    window.location.href = "nagad-payment.php";
                }
            } else {
                alert('Please select a payment option.');
            }
        }
    </script>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Top Footer -->
        <div class="row top-footer">
            <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                <a href="#"> <img src="images/Khudalagse-logom.png" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span>
            </div>
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
        <!-- Top Footer Ends -->
        <!-- Bottom Footer Starts -->
        <div class="row bottom-footer">
            <div class="col-xs-12 col-sm-3 payment-options color-gray">
                <h5>Payment Options</h5>
                <ul>
                    <li><a href="#"> <img src="images/Cod.png" alt="Cash on Delivery"> </a></li>
                    <li><a href="#"> <img src="images/bkash-logo.png" alt="Bkash"> </a></li>
                    <li><a href="#"> <img src="images/nagad-logo.png" alt="Nagad"> </a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 address color-gray">
                <h5>Address</h5>
                <p>Plot # 77-78, Road # 9, Rupnagar, Dhaka, Bangladesh</p>
                <h5>Phone: <a href="tel:+01752-822254">01752-822254</a></h5>
            </div>
            <div class="col-xs-12 col-sm-5 additional-info color-gray">
                <h5>Additional Information</h5>
                <p>Yasir Rabbani Tanvir © Copyrights | 2024</p>
            </div>
        </div>
        <!-- Bottom Footer Ends -->
    </div>
</footer>
<!-- Footer Ends -->

</div>

</body>
</html>
