<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .payment-container {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
    <meta http-equiv="refresh" content="1;url=http://localhost/booking/">
</head>
<body>
    <div class="payment-container">
        <?php
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        // Check if the payment is successful (in a real scenario, you would perform additional checks and database operations)
        $paymentSuccessful = true;

        if ($paymentSuccessful) {
            $orderId = isset($_POST['ORDER_ID']) ? $_POST['ORDER_ID'] : '';
            $amount = isset($_POST['TXN_AMOUNT']) ? $_POST['TXN_AMOUNT'] : '';

            echo "<h1>Payment Successful!</h1>";
            echo "<p>Order ID: " . $orderId . "</p>";
            echo "<p>Transaction amount: " . $amount . "</p>";
        } else {
            echo "<h1>Payment Failed</h1>";
            // You can display additional error messages or provide instructions for the user to try again
        }
        ?>
    </div>
</body>
</html>
