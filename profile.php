<?php

require "includes\config.php";

include('header.php');

if(!logged_in())
{
    
   
    redirect("login");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the booking information from the POST data
    $movieId = $_POST['movie_id'];
    $theatre = $_POST['theatre'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $pNumber = $_POST['pNumber'];
    $email = $_POST['email'];

    // Perform necessary database queries to store the booking information
    $insertQuery = "INSERT INTO bookingTable (movieID, bookingTheatre, bookingType, bookingDate, bookingTime, bookingFName, bookingLName, user_id) VALUES ('$movieId', '$theatre', '$type', '$date', '$hour', '$fName', '$lName', '{$_SESSION['user']}')";
    mysqli_query($con, $insertQuery);
}

// Define the getMovieTitle() function
function getMovieTitle($movieID) {
    global $con; // Assuming $con is your database connection variable
    $titleQuery = "SELECT movieTitle FROM movieTable WHERE movieID = '$movieID'";
    $titleResult = mysqli_query($con, $titleQuery);
    if ($titleResult && mysqli_num_rows($titleResult) > 0) {
        $titleRow = mysqli_fetch_array($titleResult);
        return $titleRow['movieTitle'];
    } else {
        return 'Unknown';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .content {
            flex: 1;
            text-align: center;
        }

        .footer {
            background-color: #000;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #343a40;
            color: white;
        }

        a.cancel-link {
            text-decoration: none;
            color: red;
        }
    </style>
</head>

<body>
    <div class="content">
        <h3>Booking History</h3>
    

        <?php
        // Perform necessary database queries to retrieve the booking history
       // echo '<pre>';
        //var_dump($_SESSION['USER_DATA']);die;

        // $bookingQuery = "SELECT bookingtable.*, bookingtable.theaterID, theater.name, movietable.movieDirector
        // FROM bookingtable
        // JOIN movietable ON movietable.movieID =  bookingtable.movieID
        // INNER JOIN theater ON bookingtable.theaterID = theater.theaterID
        // WHERE user_id = '{$_SESSION['USER_DATA']['user_id']}'";

        $bookingQuery = "SELECT bookingtable.*, movietable.movieDirector
        FROM bookingtable
        JOIN movietable ON movietable.movieID =  bookingtable.movieID

        WHERE user_id = '{$_SESSION['USER_DATA']['user_id']}'";

        $bookingResult = mysqli_query($con, $bookingQuery);
        

        if (mysqli_num_rows($bookingResult) > 0) {
            echo '<table>';
            echo '<thead><tr><th>Booking ID</th><th>Place</th><th>Check In Date</th><th>Check Out Date</th><th>Price</th><th>Confirm</th></tr></thead>';
            echo '<tbody>';
            while ($bookingRow = mysqli_fetch_array($bookingResult)) {
                echo '<tr>';
                echo '<td>' . $bookingRow['bookingID'] . '</td>';
                echo '<td>' . getMovieTitle($bookingRow['movieID']) . '</td>';
                echo '<td>' . $bookingRow['bookingType'] . '</td>';
                echo '<td>' . $bookingRow['bookingDate'] . '</td>';
                echo '<td>ksh ' . $bookingRow['amount']. '</td>';
               
              
                //echo '<td><a href="cancel.php?id=' . $bookingRow['bookingID'] . '" class="cancel-link">Cancel</a></td>';
                echo '<td><a href="confirm.php?movieID=' . $bookingRow['bookingID'] . '&catID='.$bookingRow['theaterID'].'" class="cancel-link">Cancel</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            

        } else {
            echo '<p>No Previous Bookings Found!</p>';
        }
        ?>
    </div>

    <footer class="footer">
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>