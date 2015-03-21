<?php
require_once('functions.php');
	//echo ("Session userId:".$_SESSION['userId']);
	
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>LivePortal.gq</title>
	<meta charset="utf-8">
	<!--include jquery-->
	<link rel="stylesheet" href="external\jquery-ui-1.11.4.custom\jquery-ui.min.css">
	<script src="external\jquery-ui-1.11.4.custom\external/jquery/jquery.js"></script>
	<script src="external\jquery-ui-1.11.4.custom\jquery-ui.min.js"></script>
	<!--include bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	<!-- our stylesheet -->
	<link rel="stylesheet" href="styles/style.css">
  
</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="index.php"><img src="images/livePortal.png"></a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo ('class="active"'); ?>><a href="index.php">Home</a></li>
					<!-- <li><a href="testStreamPage.php">Stream Page php</a></li> -->
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'browse.php') echo ('class="active"'); ?>><a href="browse.php">Browse</a></li>
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'irc.php') echo ('class="active"'); ?>><a href="irc.php">IRC</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(isLoggedIn()){ ?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							
							<img width='20px' height='20px' src="<?php echo getAvatar($_SESSION['username'],20); ?> "> 
							<?php echo $_SESSION['username']; ?>
									
							
							<?php
								$messageCount = getMessageCount();
								if ($messageCount > 0)
								{
									echo ('<span class="badge">'.$messageCount.'</span>');
								}
							?>
							
							<span class="caret"></span>
							
							
						</a>
						<ul class="dropdown-menu">
							<li><a href="profile.php?userId=<?php echo ($_SESSION['userId']); ?>">Profile</a></li>
							<li><a href="messages.php">Messages <span class="badge"><?php
								if ($messageCount > 0)
								{
									echo ('<span class="badge">'.$messageCount.'</span>');
								}
							?></span></a></li>
							<li><a href="stream.php?userId=<?php echo($_SESSION['userId']);?>">Stream</a></li>
							<li><a href="favorites.php?userId=<?php echo($_SESSION['userId']);?>">Favorites</a></li>
							<li><a href="includes/functions.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
						</ul>
					</li> <?php } ?>
				
					
					<?php
					//if logged in show logout button
					if (!isLoggedIn())
					{
						if(basename($_SERVER['PHP_SELF']) != 'login.php')
						{
					?>
							<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php
						}
						if(basename($_SERVER['PHP_SELF']) != 'register.php')
						{
					?>
							<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<?php
						}
					}
					?>

				
				</ul>
			</div>
		  </div>
		</nav>
		
		
		
		
		<div id="wrapper">