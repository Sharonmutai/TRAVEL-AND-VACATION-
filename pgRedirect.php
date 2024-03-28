<html>
<head>
    <title>Merchant Check Out Page</title>
    <script src="_.js"></script>
</head>
<body>
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <form method="post" action="pgResponse.php" name="f1">
        <table border="1">
            <tbody>
                <tr>
                    <td>Order ID:</td>
                    <td><input type="text" name="ORDER_ID"></td>
                </tr>
                <tr>
                    <td>Customer ID:</td>
                    <td><input type="text" name="CUST_ID"></td>
                </tr>
                <tr>
                    <td>Industry Type ID:</td>
                    <td><input type="text" name="INDUSTRY_TYPE_ID"></td>
                </tr>
                <tr>
                    <td>Channel ID:</td>
                    <td><input type="text" name="CHANNEL_ID"></td>
                </tr>
                <tr>
                    <td>Transaction Amount:</td>
                    <td><input type="text" name="TXN_AMOUNT"></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Proceed to Payment">
    </form>
</body>
</html>
