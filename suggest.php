<?php

include("connection/connect.php");

error_reporting(0);

session_start();

//main connection file for both admin & front end
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "online_rest";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // Connecting

// Check connection
if (!$db) { // Checking connection to DB
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];

    $query = "SELECT title FROM dishes WHERE title LIKE '%$search_query%' LIMIT 5"; // Limit the number of suggestions to 5
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='suggested-item'>" . $row['title'] . "</div>";
        }
    } else {
        echo "<p>No suggestions found.</p>";
    }
} else {
    echo "<p>No search query provided.</p>";
}

mysqli_close($db);
?>
