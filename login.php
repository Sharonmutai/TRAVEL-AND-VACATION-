<?php
include('includes/config.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{
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
    $_SESSION['error']="Login Failed!";
		//header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	//header("location:login.php");
}
}


?>



<?php include('header.php');?>


</div>
<div class="content">
	<div class="wrap">
		<div class="content-top" style="min-height:300px;padding:50px">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">Login</div>
				  <div class="panel-body">
				  	<?php include('msgbox.php');?>
          
				<p class="login-box-msg">Sign in to start your session</p>
<!--process_login.php--->
				<form action="" method="post">
      <div class="form-group has-feedback">
       
        <input name="Email" type="text" value="<?php echo old('Email')?>" size="25" placeholder="Email" class="form-control" placeholder="Email"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="Password" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">Login</button>
 
          <p class="login-box-msg" style="padding-top:20px">New Here? <a href="registration.php">Register</a></p>
      </div>
	  <a href="requestReset.php">Forgot password?</a>
      </div>
</div>
    </form>
			</div>
		</div>
		<div class="clear"></div>	
		
	</div>
<?php include('footer.php');?>
</div>