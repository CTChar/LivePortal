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
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo ('class="active"'); ?>><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<!-- <li><a href="testStreamPage.php">Stream Page php</a></li> -->
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'browse.php') echo ('class="active"'); ?>><a href="browse.php"><span class="glyphicon glyphicon-th-list"></span> Browse</a></li>
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
							<li><a href="profile.php?userId=<?php echo ($_SESSION['userId']); ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> Messages <?php if ($messageCount > 0){echo('<span class="badge">'.$messageCount.'</span>');} ?></a></li>
							<li><a href="stream.php?userId=<?php echo($_SESSION['userId']);?>"><span class="glyphicon glyphicon-facetime-video"></span> Stream</a></li>
							<li><a href="favorites.php?userId=<?php echo($_SESSION['userId']);?>"><span class="glyphicon glyphicon-tags"></span> Favorites</a></li>
							<li class="divider"></li>
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
							<!-- <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#signIn">
							  Login
							</button>
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
		
		
		
		

		<!-- Modal -->
		<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Sign In</h4>
			  </div>
			  <div class="modal-body">
			  <?php
				#################### start process user login ####################
				## php must be processed here to print errors in the proper place
				#username and password variables from login.php
				$username = isset($_REQUEST["username"]) ? clean($_REQUEST["username"]) : "";	
				$password = isset($_REQUEST["password"]) ? clean($_REQUEST["password"]) : "";	

				if (isset($_REQUEST["loginButton"]))
				{
					login($username,$password);
				}
				#################### end process user login ####################

				?>
				<form action="<?php echo(basename($_SERVER['PHP_SELF'])) ?>">
					<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo("$username"); ?>">
					Usernames must contain 
					<ul>
						<li>8 or more characters Ex. A B C 1 2 3 ! @ #</li>
					</ul>
					</div>
					<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo("$password"); ?>">
					Passwords must contain: 
						<ul>
							<li>2 or more uppercase letters Ex. A B C</li> 
							<li>2 or more lowercase letters Ex. a b c</li> 
							<li>2 or more special symbols [ ! @ # $ % ^ & * ( ) \ - _ = + { } ; : , < . > ]</li> 
							<li>2 or more numbers Ex. 1 2 3 </li> 
							<li>8 or more characters Ex. A B C 1 2 3 ! @ #</li> 
						</ul>
					</div>
					
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" name="loginButton"  class="btn btn-primary" value="Login">
				</form>
			  </div>
			</div>
		  </div>
		</div>
		
		
		<div id="wrapper">