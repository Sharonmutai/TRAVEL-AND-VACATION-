<?php 

// you can use reffered to your db settings. 
// $con = mysqli_connect("localhost", 'root', '', 'resetPassword'); 
// if (mysqli_connect_errno($con)) {
// 	echo "connection failed :(" . mysqli_connect_errno($con);
// }
 $host = "localhost";
 $username = "root";
 $password = "";
 $database = "booking";
 $con;


$con = new mysqli($host, $username, $password, $database);

if ($con->connect_errno) {
	echo "Connection failed: " . $conn->connect_error;
	exit();
}