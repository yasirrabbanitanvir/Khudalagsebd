<?php
include("../connection/connect.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM transactions WHERE transactionId = '$id'";
    if(mysqli_query($db, $sql)){
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($db);
    }
} else {
    echo 'No transaction ID provided.';
}
?>
