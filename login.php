<?php 

include 'tcpConnection.php';

session_start();


if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];


	$userInfo = new user();

	$userInfo->overallID = "logIn";
	$userInfo->email = $username;
	$userInfo->password = $password;
	$userInfo->isAdmin = "false";

	$userAction = tcpConnect($userInfo);
	
	switch ($userAction) {
		case 0:
			$_SESSION['userLoggedIn'] = 1;
			header("Location: month.php");

			break;

		case 3:
			$serverError = "Your password does not match the given username";
			break;

		case 2:
			$serverError = "Your user is not active";
			break;

		case 1:
			$serverError = "We did not recognize the given username. Please try again.";
			break;						
		
		
		default:
			break;
	}
}


?>

<html>
<link href="style.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700,800&subset=latin,greek-ext' rel='stylesheet' type='text/css'>
	<body style="background: url(gfx/bg.jpg) center center repeat-x;">

	<div class="header">
	  	CBS Calendar
	</div>

	<?php if(isset($serverError)){ ?>


		<div class="login">
			<form action="" method="POST">
				<input class="user" name="username" type="text" value="" placeholder="username" />
				<input class="submit" type="submit" value="Login" />
				<input class="pass" name="password" type="password" value="" placeholder="password" />
			</form>
			<br><br><br>
			<center>
				<div id="serverError" class="error"><?php echo $serverError; ?></div>
			</center>
		</div>		
	<?php } ?>

	<?php if(!isset($userAction)){ ?>

	<div class="login">
		<form action="" method="POST">
			<input class="user" name="username" type="text" value="" placeholder="username" />
			<input class="submit" type="submit" value="Login" />
			<input class="pass" name="password" type="password" value="" placeholder="password" />
		</form>
	</div>

	<?php } ?>

<div class="footer">
	Copenhagen Business School &copy;  <?php echo date("Y") ?> 
</div>	
	</body>
</html>