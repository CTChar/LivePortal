<?php
require_once('includes/functions.php');
?>
		</div><!-- end the content tag started in header.php -->
		</div><!-- end the clear tag started in header.php -->
		<footer id="footer">
			<div class="row">
				<div class="col-xs-1">
				</div>
				<div class="col-xs-1">
				</div>
				<div class="col-xs-2">
				<p>User</p>
				<?php 
				
				if(isLoggedIn())
				{ 
				?>
						<ul>
						<li><a class="userMenu" href="profile.php?userId=<?php echo ($_SESSION['userId']); ?>">
							<img width='20px' height='20px' src="<?php echo getAvatar($_SESSION['username'],20); ?> ">&nbsp;<?php echo $_SESSION['username']; ?>
						</a></li>
							<li><a href="settings.php"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
							<li><a href="messages.php"><?php echo('<span class="badge badge-light">'.$messageCount.'</span>'); ?> Messages</a></li>
							<li><a href="stream.php?userId=<?php echo($_SESSION['userId']);?>"><span class="glyphicon glyphicon-facetime-video"></span> Stream</a></li>
							<li><a href="favorites.php?userId=<?php echo($_SESSION['userId']);?>&type=followers"><span class="glyphicon glyphicon-list-alt"></span> Followers</a></li>
							<li><a href="favorites.php?userId=<?php echo($_SESSION['userId']);?>"><span class="glyphicon glyphicon glyphicon-star"></span> Favorites</a></li>
							<li><a href="includes/functions.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
						</ul>
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
				
				</div>
				<div class="col-xs-2">
					<p>Site Map</p>
					<ul>
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="browse.php"><span class="glyphicon glyphicon-th-list"></span> Browse</a></li>
						<li><a href="irc.php"><span class="glyphicon glyphicon-list-alt"></span> IRC</a></li>
					</ul>
				</div>
				<div class="col-xs-2">
					<p>Info</p>
					<ul>
						<li><a href="about.php" alt="about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
						<li><a href="help.php" alt="help"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
					</ul>
				</div>
				<div class="col-xs-2 footerIcons">
					<a href="#" target="_blank"><img width="35" height="35" src="images/socialIcons/Facebook-Icon.png"></a>
					<a href="#" target="_blank"><img width="35" height="35" src="images/socialIcons/Google-Plus-Icon.png"></a>
					<br/>
					<a href="#" target="_blank"><img width="35" height="35" src="images/socialIcons/Twitter-Icon.png"></a>
					<a href="#" target="_blank"><img width="35" height="35" src="images/socialIcons/Youtube-Icon.png"></a>
					<br/>
					<a href="https://github.com/CTChar/LivePortal" target="_blank"> <img width="35" height="35" src="images/socialIcons/Github-Icon.png"></a>
					<a href="#" target="_blank"><img width="35" height="35" src="images/socialIcons/Linkedin-Icon.png"></a>
					<br/>
				</div>
				<div class="col-xs-1">
				</div>
				<div class="col-xs-1">
				</div>
			</div>
					<br/>
			<div class="row">
				<div class="col-xs-12 center">
					© 2015 <a href="http://www.liveportal.gq">Liveportal.gq</a>
				</div>
			</div>
		</footer>
		
		</div> <!-- close wrapper -->
		
	</body>
</html>

<?php
mysqli_close($db);
?>