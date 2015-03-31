<?php
require_once('functions.php');
	//echo ("Session userId:".$_SESSION['userId']);
	
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>LivePortal.gq</title>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--include jquery-->
	<link rel="stylesheet" href="external\jquery-ui-1.11.4.custom\jquery-ui.css">
	<script src="external\jquery-ui-1.11.4.custom\jquery.js"></script>
	<script src="external\jquery-ui-1.11.4.custom\jquery-ui.js"></script>
	
	<!--include bootstrap -->
	<script src="external\bootstrap-3.3.4\js\bootstrap.js"></script>
	<link rel="stylesheet" href="external\bootstrap-3.3.4\css\bootstrap.css">
	<link rel="stylesheet" href="external\bootstrap-3.3.4\css\bootstrap-yeti-theme.css">
	
	<!-- liveportal stylesheet -->
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
				<li <?php if(basename($_SERVER['PHP_SELF']) == 'browse.php') echo ('class="active"'); ?>><a href="browse.php"><span class="glyphicon glyphicon-th-list"></span> Browse</a></li>
				<li <?php if(basename($_SERVER['PHP_SELF']) == 'irc.php') echo ('class="active"'); ?>><a href="irc.php">IRC</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right" style="margin-right: 5px;">
				
				<?php 
				if(isLoggedIn())
				{ 
				?>
					<!-- Start User Menu -->
					<li class="userMenu">
						<a class="userMenu" href="profile.php?userId=<?php echo ($_SESSION['userId']); ?>">
							<img width='20px' height='20px' src="<?php echo getAvatar($_SESSION['username'],20); ?> "> 
							<?php echo $_SESSION['username']; ?>
						</a>
					</li>
					<li class="userMenu">
						<a href="messages.php" class="userMenu">
							<?php
								$messageCount = getMessageCount();
								if ($messageCount > 0)
								{
									echo ('<span class="badge">'.$messageCount.'</span>');
								}
							?>
						</a>
					</li>
					<li class="dropdown ">
						<a class="dropdown-toggle userMenu" data-toggle="dropdown" href="#">
							<span class="caret"></span>	
						</a>
						<ul class="dropdown-menu">
							<li><a href="profile.php?userId=<?php echo ($_SESSION['userId']); ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="settings.php"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
							<li><a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> Messages <?php echo('<span class="badge">'.$messageCount.'</span>'); ?></a></li>
							<li><a href="stream.php?userId=<?php echo($_SESSION['userId']);?>"><span class="glyphicon glyphicon-facetime-video"></span> Stream</a></li>
							<li><a href="favorites.php?userId=<?php echo($_SESSION['userId']);?>"><span class="glyphicon glyphicon-tags"></span> Favorites</a></li>
							<li class="divider"></li>
							<li><a href="includes/functions.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
						</ul>
					</li> 
					<!-- End User Menu -->
				<?php 
				} 
				else
				{
				?>
					<!-- Button trigger login modal -->
					<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#signIn">
					  Login
					</button>
				<?php
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

	<!-- Login Modal -->
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
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<input type="submit" name="loginButton"  class="btn btn-primary" value="Login">
					</form>
				</div>
			</div>
		</div>
	</div>
	
	
	<div id="wrapper">