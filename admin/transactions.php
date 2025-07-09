<?php
include("../connection/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Transaction Table</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <div class="header">
        </div>
        <div class="left-sidebar">
        </div>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Transactions</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Selected Items</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Bank Type</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM transactions";
                                            $query = mysqli_query($db, $sql);
                                            if (mysqli_num_rows($query) > 0) {
                                                while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['transactionId']; ?></td>
                                                <td><?php echo $row['transactionDate']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['selectedItems']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['bankType']; ?></td>
                                                <td><?php echo $row['contact']; ?></td>
                                                <td>
                                                    <button class="delete-btn" data-id="<?php echo $row['transactionId']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            } else {
                                                echo '<tr><td colspan="9"><center>No Transactions Found!</center></td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.delete-btn').click(function(){
            var transactionId = $(this).data('id');
            if(confirm("Are you sure you want to delete this transaction?")){
                $.ajax({
                    url: 'delete_transactions.php', 
                    method: 'post',
                    data: {id: transactionId},
                    success: function(response){
                        console.log(response); 
                        if(response.trim() === 'success'){
                           
                            location.reload();
                        } else {
                            alert('Error deleting transaction!');
                        }
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
