<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bkash Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2><strong>Payment Information (Bkash)</strong></h2>
    <p>Please make payment to this Bkash account: <strong>01752822254</strong></p>
    <form id="transactionForm" method="post" action="admin/transactionsinsert.php">
        <div class="form-group">
            <label for="transactionId">Transaction ID:</label>
            <input type="text" class="form-control" id="transactionId" name="transactionId" required>
        </div>
        <div class="form-group">
            <label for="transactionDate">Transaction Date:</label>
            <input type="date" class="form-control" id="transactionDate" name="transactionDate" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <!-- Input field for selected items -->
        <div class="form-group">
            <label for="selectedItems">Selected Items:</label>
            <input type="text" class="form-control" id="selectedItems" name="selectedItems" required>
        </div>

        <!-- Quantity selection using checkmarks -->
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <div class="btn-group-toggle" data-toggle="buttons">
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <label class="btn btn-outline-secondary">
                        <input type="radio" name="quantity" id="quantity<?php echo $i; ?>" autocomplete="off" value="1:<?php echo $i; ?>">1:<?php echo $i; ?>
                    </label>
                <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="bankType">Bank Type:</label>
            <select class="form-control" id="bankType" name="bankType" required>
                <option value="">Select Bank Type</option>
                <option value="bkash">Bkash</option>
                <option value="nagad">Nagad</option>
            </select>
        </div>

        <div class="form-group">
    <label for="contact">Contact:</label>
    <input type="number" class="form-control" id="contact" name="contact" required>
</div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
