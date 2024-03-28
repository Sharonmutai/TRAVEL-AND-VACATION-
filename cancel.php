<?php

include('includes/config.php');

// echo $_GET['id'];

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$user_id = $_SESSION['USER_DATA']['user_id'];
$date = date("Y:m:d h:i:s");
$reason = $_POST['reason'];



$stmt = $con->prepare("INSERT INTO reasonsForCancelation (reason, user_id, date) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $reason, $user_id, $date);

if ($stmt->execute()) {

    mysqli_query($con,"delete from bookingtable where bookingID='".$_GET['id']."'");
    $_SESSION['success']="Booking Cancelled Successfully";
    
    
    echo "<script>
    alert('Booking Cancelled Successfully');
    </script>";
    header('location:profile.php');

} else {
    echo "Error: " . $stmt->error;
    echo "<script>
    alert('Error');
    </script>";
}

$stmt->close();
//die;
// mysqli_query($con,"delete from bookingtable where bookingID='".$_GET['id']."'");
// $_SESSION['success']="Booking Cancelled Successfully";


// echo "<script>
// alert('Booking Cancelled Successfully');
// </script>";
// header('location:profile.php');
?>