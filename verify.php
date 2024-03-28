<?php
require "includes\config.php";
require "includes\\functions.php";
//include "connection.php";
if(!logged_in())
{
    redirect("login");
}

//echo "<pre>";

//print_r($_SESSION['USER_DATA']);//die;
// variables
$fname = $_SESSION['USER_DATA']['name'];
$email = $_SESSION['USER_DATA']['email'];
//$theaterid = $_POST['theater'];
$type = $_POST['type'];
$date = $_POST['date'];
$time = date("Y-m-d H:i:s");
$movieid = $_POST['movie_id'];
$order = "ARVR" . rand(10000, 99999999);
$cust  = "CUST" . rand(1000, 999999);
$user_id = $_SESSION['USER_DATA']['user_id'];


//sessions
// $_SESSION['ORDERID'] = $order;
// echo "<pre>";
// print_r($_POST);die;
// echo "</pre>";

//$tqry = "SELECT name, amount FROM theater WHERE theaterID = $theaterid";
$sql = "SELECT movieDirector FROM movietable WHERE movieID = $movieid";
$priceData = mysqli_query($con, $sql);
$price = mysqli_fetch_array($priceData);
$amount = $price['movieDirector'];

//$theaterNameResult = mysqli_query($con, $tqry);
//$theaterNameData = mysqli_fetch_array($theaterNameResult);
$theaterName = "";//$theaterNameData['name'];
//$amount = $theaterNameData['amount'] ?? '';

 
//conditions
if ((!$_POST['submit'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}

if (isset($_POST['submit'])) {

   /* $qry = "INSERT INTO bookingtable
    (`movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, 
    `bookingTime`, `bookingFName`,  `bookingEmail`,`amount`, `ORDERID`,`user_id`)
    VALUES 
    ('$movieid','$theatre','$type','$date','$time','$fname','$email','Paid','$order','$user_id')";
*/

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die;
$cash = $_POST['amount'];
$noOfRooms = $_POST['noOfRooms'];
$qry = "INSERT INTO bookingtable
    (movieID, bookingType, bookingDate, 
     bookingTime , amount ,  ORDERID,user_id, no_seats, noOfRooms)
    VALUES 
    ('$movieid','$type','$date','$time','$cash','$order','$user_id', 0, '$noOfRooms')";

   /* $qry = "INSERT INTO bookingtable (movieID, theaterID, bookingType, bookingDate, bookingTime, amount, ORDERID, user_id, no_seats)
VALUES (1, 2, 'Standard', '2023-08-09', '15:00', '25.00', 'ABC123', 123, 2);
";*/

    $result = mysqli_query($con, $qry);
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Booking.com</title>
    <script src="_.js "></script>
</head>

<body>
    <center>
        <br><br>
        <h1>Pay Now </h1>
        <br><br>

        <form method="post" action="pgResponse.php" >
            <table border="1" style="text-align: center; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <tbody>
                    
                    <tr>
                        <td style="font-weight:bold;"><label>ORDER_ID</label></td>
                        <td><?php echo $order; ?>
                            <input type="hidden" name="ORDER_ID" value="<?php echo $order; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold;"><label>YOUR Email</label></td>
                        <td><?php echo $_SESSION['USER_DATA']['email'] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;"><label>WEBSITE</label></td>
                        <td>
                            <?php echo "Bookin.com"; ?>
                        </td>
                    </tr>
                   
                    <tr>
                        <td style="font-weight:bold;"><label>CHECK IN DATE</label></td>
                        <td>
                            <?php echo $_POST['type']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;"><label>AMOUNT(KSH)</label></td>
                        <td>

                            <?php
                            //echo $theaterName;
                            //if ($theaterName == "Main Hall") {
                                $ta =$amount;
                            //}
                            //if ($theaterName == "Private Hall") {
                               // $ta = $amount;
                           //}
                           // if ($theaterName == "VIP Hall") {
                               // $ta = $amount;
                           // }

                            ?>

                            <input type="text" name="TXN_AMOUNT" value="<?php echo $cash ?? ""; ?>" readonly>
                            <input type="hidden" name="CUST_ID" value="<?php echo $cust; ?>">
                            <input type="hidden" name="INDUSTRY_TYPE_ID" value="retail">
                            <input type="hidden" name="CHANNEL_ID" value="WEB">

                        </td>
                    </tr>


                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-danger">Pay Now!</button>
                            <!-- <input value="CheckOut" type="submit"	onclick=""></td> -->
                    </tr>
                </tbody>
            </table>
        </form>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>