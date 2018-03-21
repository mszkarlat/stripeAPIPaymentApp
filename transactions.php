<?php 
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Transaction.php');

    // Instantiate Customer 
    $transaction = new Transaction();

    // Get Customer 
    $transactions = $transaction->getTransactions();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Transactions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-secondary">Customers</a>
            <a href="transactions.php" class="btn btn-primary">Transactions</a>
        </div>
        <hr>
        <h2>Transactions</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $t): ?>
                    <tr>
                        <td><?php echo $t->id ?></td>
                        <td><?php echo $t->customer_id ?>
                        <td><?php echo $t->product ?>                       
                        <td><?php echo sprintf('%.2f',$t->amount/100) ?><?php echo strtoupper($t->currency )?></td>
                        <td><?php echo $t->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">Pay Page</a>
    </div>
</body>
</html>