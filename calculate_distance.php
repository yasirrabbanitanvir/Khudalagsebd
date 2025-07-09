<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khudalagsebd.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background-color: #343a40;
            padding: 10px 0;
            border-bottom: 4px solid #dc3545;
        }

        .navbar-brand img {
            height: 35px;
            width: auto;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #dee2e6;
        }

        .card-title {
            font-size: 20px;
            margin-top: 15px;
            color: #dc3545;
        }

        .card-text {
            color: #666;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 15px;
        }

        .list-inline-item {
            margin-right: 20px;
        }

        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
            font-size: 16px;
            padding: 8px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        .footer p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="index.html"> <img src="images/Khudalagse-logom2.png" alt="Logo"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="restaurants.php">Restaurants</a> </li>
                        <?php
                        session_start();
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link">login</a></li>
                                  <li class="nav-item"><a href="registration.php" class="nav-link">signup</a></li>';
                        } else {
                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link">your orders</a></li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Main Content -->

  

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <form action="search.php" method="get" class="app-search">
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search your favorite food">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-danger rounded-right" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
                        <i class="ti-search"></i> Search
                    </button>
                </div>
            </div>
            <!-- Suggestions container -->
            <div id="suggestion-container"></div>
        </form>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            var query = $(this).val();
            if (query !== '') {
                $.ajax({
                    url: 'suggest.php',
                    method: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#suggestion-container').html(data);
                    }
                });
            } else {
                $('#suggestion-container').html('');
            }
        });

        // Add click event listener to suggested items
        $(document).on('click', '.suggested-item', function() {
            var suggestedText = $(this).text();
            $('#search').val(suggestedText);
            $('#suggestion-container').html('');
        });
    });
</script>



    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <?php
            include("connection/connect.php");
            error_reporting(0);

            // Retrieve latitude and longitude from the query parameters
            $user_latitude = $_GET['latitude'];
            $user_longitude = $_GET['longitude'];

            // Function to calculate distance using Haversine formula
            function calculateDistance($lat1, $lon1, $lat2, $lon2)
            {
                $earthRadius = 6371; 

  
                $latFrom = deg2rad($lat1);
                $lonFrom = deg2rad($lon1);
                $latTo = deg2rad($lat2);
                $lonTo = deg2rad($lon2);

                $latDelta = $latTo - $latFrom;
                $lonDelta = $lonTo - $lonFrom;

                // Haversine formula
                $distance = 2 * $earthRadius * asin(sqrt(
                    pow(sin($latDelta / 2), 2) +
                    cos($latFrom) * cos($latTo) *
                    pow(sin($lonDelta / 2), 2)
                ));

                return round($distance, 2); 
            }

            // Query to retrieve restaurants
            $ress = mysqli_query($db, "SELECT * FROM restaurant");
            while ($rows = mysqli_fetch_array($ress)) {
     
                $distance = calculateDistance($user_latitude, $user_longitude, $rows['latitude'], $rows['longitude']);

                echo '<div class="col">
                            <div class="card h-100">
                                <img src="admin/Res_img/' . $rows['image'] . '" class="card-img-top" alt="Food logo">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a></h5>
                                    <p class="card-text">' . $rows['address'] . '</p>
                                </div>
                                <div class="card-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fas fa-check"></i> Min ৳ 100.00</li>
                                        <li class="list-inline-item"><i class="fas fa-motorcycle"></i> ' . $distance . ' km away</li>
                                    </ul>
                                    <a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn btn-primary">View Menu</a>
                                </div>
                            </div>
                        </div>';
            }
            ?>
        </div>
    </div>
    <!-- End Main Content -->
    <br>

    <!-- Footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <p>Yasir Rabbani Tanvir © Copyrights | 2024</p>
                        </div>
        </div>
    </footer>
    <!-- End Footer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
