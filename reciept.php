<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Receipt</title>
    <style>
        /* Styles for invoice layout */

        /* ... Paste the previous invoice styles here ... */

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <!-- Replace with your logo or company name -->
                                <img src="logo.png" alt="Logo" style="width: 100%; max-width: 200px;">
                            </td>

                            <td>
                                Invoice #: <?php echo $_GET['order_id']; ?><br>
                                Created: <?php echo date('F j, Y, g:i a'); ?><br>
                                Customer ID: <?php echo $_GET['customer_id']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <!-- Replace with your company information -->
                                Company Name<br>
                                123 Main Street, City<br>
                                Country, ZIP Code<br>
                                Email: info@example.com
                            </td>

                            <td>
                                <!-- Replace with customer information -->
                                Customer Name<br>
                                Address<br>
                                City, Country, ZIP Code<br>
                                Email: customer@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td>Price</td>
            </tr>

            <!-- Replace with your dynamic item list -->
            <tr class="item">
                <td>Movie Ticket</td>
                <td>$<?php echo $_GET['ticket_price']; ?></td>
            </tr>

            <tr class="total">
                <td></td>
                <td>Total: $<?php echo $_GET['ticket_price']; ?></td>
            </tr>
        </table>
    </div>

    <!-- Optional: Include the Bootstrap JS library for enhanced functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
