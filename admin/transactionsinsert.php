<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Transaction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .message, .error-message {
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            font-size: 18px; 
        }
        .message {
            background-color: #e6ffe6;
        }
        .error-message {
            background-color: #ffe6e6;
        }
        .chat-button {
            background: rgb(37, 211, 102);
            display: inline-flex;
            padding: 10px 14px;
            align-items: center;
            color: rgb(255, 255, 255);
            cursor: pointer;
            border-radius: 20px;
            box-shadow: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }
        .chat-button a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-left: 8px;
            font-size: 18px; 
        }

        /* Media query for smaller screens */
        @media only screen and (max-width: 600px) {
            .container {
                max-width: 100%;
                padding: 10px;
            }
            .chat-button {
                font-size: 16px; 
                bottom: 10px;
                right: 10px;
            }
        }
    </style>
</head>
<body>

<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "online_rest";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO transactions (transactionId, transactionDate, description, selectedItems, quantity, price, bankType, contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $transactionId, $transactionDate, $description, $selectedItems, $quantity, $price, $bankType, $contact);

   
    $transactionId = $_POST['transactionId'];
    $transactionDate = $_POST['transactionDate'];
    $description = $_POST['description'];
    $selectedItems = $_POST['selectedItems'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $bankType = $_POST['bankType'];
    $contact = $_POST['contact'];

    if ($stmt->execute()) {
        ?>
        <div class="message">
            <p style="color: #008000; font-weight: bold;">Your record has been inserted successfully. Please wait for 5 minutes. A phone call will be sent by the Tracking Manager. Otherwise, call 01752822254.</p>
        </div>
        <?php
    } else {
        ?>
        <div class="error-message">
            <p style="color: #ff0000; font-weight: bold;">Error: <?php echo $stmt->error; ?></p>
        </div>
        <?php
    }

    $stmt->close();
}


$conn->close();
?>

<div class="chat-button">
    <span style="font-style: normal; font-size: 18px; font-weight: 600; line-height: 20px;">Need assistance? </span>
    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
       
    </svg>
    <a href="https://whatsapp.com/channel/0029VacKI84JJhzYfoGGzP1S">Chat</a>
</div>

</body>
</html>