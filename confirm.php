<?php
require "includes\config.php";
require "includes\\functions.php";
//include "connection.php";
if(!logged_in())
{
    redirect("login");
}


$fname = $_SESSION['USER_DATA']['name'];
$email = $_SESSION['USER_DATA']['email'];
$theaterid = $_GET['catID'] ;//$_POST['theater'];
// $type = $_POST['type'];
// $date = $_POST['date'];
// $time = date("Y-m-d H:i:s");
$movieid = $_GET['movieID'];
// $order = "ARVR" . rand(10000, 99999999);
// $cust  = "CUST" . rand(1000, 999999);
$user_id = $_SESSION['USER_DATA']['user_id'];

//$tqry = "SELECT name, amount FROM theater WHERE theaterID = $theaterid";

// $sql = "SELECT bookingtable.*, bookingtable.theaterID, bookingtable.bookingType,  movietable.movieDirector, theater.name
// FROM bookingtable
// INNER JOIN theater ON bookingtable.theaterID = theater.theaterID
// JOIN movietable ON movietable.movieID =  bookingtable.movieID 
// WHERE bookingtable.bookingID= $movieid";
$sql = "SELECT bookingtable.*, bookingtable.theaterID, bookingtable.bookingType,  movietable.movieDirector
FROM bookingtable
JOIN movietable ON movietable.movieID =  bookingtable.movieID 
WHERE bookingtable.bookingID= $movieid";


$priceData = mysqli_query($con, $sql);
$data = mysqli_fetch_array($priceData);

//$theaterNameResult = mysqli_query($con, $tqry);
//$theaterNameData = mysqli_fetch_array($theaterNameResult);
$theaterName ="";// $theaterNameData['name'];

$amount = $data['amount'];
$order = $data['ORDERID'];

$checkInDate = $data['bookingType'];



$current =  date('m-d-Y');
$currentDate = explode('-',$current);
$InDay = explode('-', $checkInDate);

$amnt = str_replace(',','',$amount);
$amount = intval($amnt);




if($InDay[1] - $currentDate[1] == 6)
{
    
    $amount = 0.1 * $amount;
   
}
else if($InDay[1] - $currentDate[1] == 5)
{
    $amount = 0.2 * $amount;
}
else if($InDay[1] - $currentDate[1] == 4)
{
    $amount = 0.3 * $amount;
}
else if($InDay[1] - $currentDate[1] == 3)
{
    $amount = 0.4 * $amount;
}
else if($InDay[1] - $currentDate[1] == 2)
{
    $amount = 0.5 * $amount;
}
else if($InDay[1] - $currentDate[1] == 1)
{
    $amount = 0.6 * $amount;
}
else if($InDay[1] - $currentDate[1] < 1)
{
    $amount = 0.8 * $amount;
}

 

// if ((!$_POST['submit'])) {
//     echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
// }

// if (isset($_POST['submit'])) {



// $qry = "INSERT INTO bookingtable
//     (movieID, theaterID,bookingType, bookingDate, 
//      bookingTime , amount ,  ORDERID,user_id, no_seats)
//     VALUES 
//     ('$movieid','$theaterid','$type','$date','$time','Paid','$order','$user_id', 0)";



//     $result = mysqli_query($con, $qry);
    
// }

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
    <!-- <script src="_.js "></script> -->
</head>

<body>
    <center>
        <br><br>
        <h1>CONFIRM THAT YOU WANT TO CANCEL </h1>
        <br><br>

        <table border="1" style="margin-bottom:2rem; text-align: center; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
            <thead>
                <!-- <tr>
                <th colspan="">THE FOLLOWING CHARGES WILL APPLY FOR LATE CANCELATION</th>
                </tr> -->
                <tr>
                    <th colspan="6">THE FOLLOWING CHARGES WILL APPLY FOR LATE CANCELATION</th>
                </tr>
                <tr>
                <th>6 DAYS</th>
                <th>5 DAYS</th>
                <th>4 DAYS</th>
                <th>3 DAYS</th>
                <th>2 DAYS</th>
                <th>1 DAYS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                
                    <td>10%</td>
                    <td>20%</td>
                    <td>30%</td>
                    <td>40%</td>
                    <td>50%</td>
                    <td>60%</td>
                </tr>
            </tbody>
        </table>
    

        <form method="post" action="cancel.php?id=<?php echo $movieid?>" >
        <!-- pgResponse.php -->

        <div style="margin-bottom:1rem;">
        <div style="color:red;">ENTER REASON FOR CANCELATION</div>
            <input oninput="check()" id="reason" name="reason" type="text" style="width:40%;" placeholder="Reason for cancel" required>
        </div>


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
                        <td style="font-weight:bold;"><label>AMOUT TO BE DEDUCTED</label></td>
                        <td style="color:red;">

                            <?php
                            //echo $theaterName;
                            //if ($theaterName == "Main Hall") {
                                echo "KSH ".$amount;
                            //}
                            //if ($theaterName == "Private Hall") {
                               // $ta = $amount;
                           //}
                           // if ($theaterName == "VIP Hall") {
                               // $ta = $amount;
                           // }

                            ?>

                            <!-- <input type="text" name="TXN_AMOUNT" value="<?php //echo $ta ?? ""; ?>" readonly>
                            <input type="hidden" name="CUST_ID" value="<?php //echo $cust; ?>">
                            <input type="hidden" name="INDUSTRY_TYPE_ID" value="retail">
                            <input type="hidden" name="CHANNEL_ID" value="WEB"> -->

                        </td>
                    </tr>


                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <!-- <?php//  echo '<a href="cancel.php?id=' . $movieid . '"  class="cancel-link btn btn-danger" disabled>Cancel</a>'?> -->
                            <button class="btn btn-danger" id="cancelButton" disabled type="submit" >Cancel</button>
                            <!-- <button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-danger">Pay Now!</button> -->
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


<script>


    function check()
    {
        document.getElementById('cancelButton').removeAttribute('disabled');
    }

</script>

</html>