<?php include('includes/functions.php');?>
<!DOCTYPE HTML>
<html>
<head>
<title>BOOKING</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='js/jquery.color-RGBa-patch.js'></script>
<script src='js/example.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/chat/style.css" type="text/css" media="all" />
<style>
.header {
    background-color: black;
}
</style>
</head>
<body>
<div class="header">
	<div class="header-top">
		<div class="wrap">
			  <div class="nav-wrap">
					<ul class="group" id="example-one" >
			           <li><a href="index.php" >Home</a></li>

			  		   <li>
						<?php if(logged_in()):?>
							<a href="profile.php" ><?php echo "Hi, ". $_SESSION['USER_DATA']['name'] ?? ""?></a>
					   		<a href="logout.php" class="ms-2">Logout</a>
							<?php else:?>
							<a href="login.php" class="ms-2">Login</a> 
							<a href="registration.php">Register</a>
							<?php endif;?>
						</li>
			         
					  
				</ul>
			  </div>
 			<div class="clear"></div>
			
   		</div>
		
    </div>
     			<div class="clear"></div>
</div>
</body>
</html>
