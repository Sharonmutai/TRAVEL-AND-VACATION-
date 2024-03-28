<?php
include('includes/config.php');

$email = $_POST["Email"];
$pass = $_POST["Password"];

$qry=mysqli_query($con,"select * from user where email='$email'");

if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	
	if($usr['password']== $pass)
	{
		$_SESSION['USER_DATA']= $usr;

		if(isset( $_SESSION['message']))
		{
			unset( $_SESSION['message']);
		}

			header('location:index.php');
		
	}
	else
	{	
		header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:login.php");
}


?>