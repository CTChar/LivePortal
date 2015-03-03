<?php
require_once('includes/functions.php');
require_once('includes/loginFunctions.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>LivePortal.gq</title>
	<meta charset="utf-8">
	<!--include jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--include bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!--include angular-->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
	
	
	<link rel="stylesheet" href="styles/style.css">
  
</head>
	<body>

		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#"><img src="images/livePortal.png"></a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Browse</a></li>
					<li><a href="#">Favorites</a></li>
					<li><a href="#">Messages <span class="badge">12</span></a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Username<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Settings</a></li>
							<li><a href="#">Logout</a></li> 
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					
					<?php
					//if logged in show logout button
					if (isLoggedIn())
					{
					?>
						<li><a href="includes/loginFunctions.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					<?php
					}
					//else show login burron
					else
					{
					?>
					
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php
					}
					?>
					
					
					
				
				
				
				
				</ul>
			</div>
		  </div>
		</nav>
		<div class="container">
		
			<div class="jumbotron">
				<h1>Welcome to LivePortal.gq "<?php
				if (isLoggedIn())
				{
					echo ($_SESSION['username']);
				}
				?>"
				</h1> 
				<p>LivePortal is a new place to stream whatever you think people want to see.</p> 
			</div>
		
		
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
				<div class="item active">
				  <img src="images/img_chania.jpg" alt="Chania">
				  <div class="carousel-caption">
					<h3>She Shrek</h3>
					<p>This is what Shrek looks like as a woman</p>
				  </div>
				</div>

				<div class="item">
				  <img src="images/img_chania2.jpg" alt="Chania">
				  <div class="carousel-caption">
					<h3>Shrek</h3>
					<p><a href="http://vimeo.com/97688364" target="_blank">Shrek is love Shrek is life</a></p>
				  </div>
				</div>

				<div class="item">
				  <img src="images/img_flower.jpg" alt="Flower">
				  <div class="carousel-caption">
					<h3>Donkey</h3>
					<p>Donkey!</p>
				  </div>
				</div>

				<div class="item">
				  <img src="images/img_flower2.jpg" alt="Flower">
				  <div class="carousel-caption">
					<h3>Puss in the Stars</h3>
					<p>You can see his soul</p>
				  </div>
				</div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
		
			<br/>
		
			<div class="row" style="text-align: center;color:#fff;">
				<div class="col-sm-4">
					<h1>The 30% Iron Chef</h1>
					<p>All I want is to be a monkey of moderate intelligence who wears a suit&hellip; that's why I'm transferring to business school! You mean while I'm sleeping in it? Son, as your lawyer, I declare y'all are in a 12-piece bucket o' trouble. But I done struck you a deal: Five hours of community service cleanin' up that ol' mess you caused. Bender, we're trying our best. When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film! Why would I want to know that?</p>
					<h2>Where the Buggalo Roam</h2>
					<p>For one beautiful night I knew what it was like to be a grandmother. Subjugated, yet honored. You can crush me but you can't crush my spirit! There's one way and only one way to determine if an animal is intelligent. Dissect its brain! We're rescuing ya. Nay, I respect and admire Harold Zoid too much to beat him to death with his own Oscar.</p>
				</div>
				<div class="col-sm-4">
					<h1>Radioactive Man</h1>
						<p>How could you?! Haven't you learned anything from that guy who gives those sermons at church? Captain Whatshisname? We live in a society of laws! Why do you think I took you to all those Police Academy movies? For fun? Well, I didn't hear anybody laughing, did you? Except at that guy who made sound effects. Makes sound effects and laughs. Where was I? Oh yeah! Stay out of my booze. Slow down, Bart! My legs don't know how to be as long as yours. How is education supposed to make me feel smarter? Besides, every time I learn something new, it pushes some old stuff out of my brain. Remember when I took that home winemaking course, and I forgot how to drive? Our differences are only skin deep, but our sames go down to the bone.</p>
						<h2>Last Exit to Springfield</h2>
						<p>Uh, no, they're saying "Boo-urns, Boo-urns." Here's to alcohol, the cause of &mdash; and solution to &mdash; all life's problems. Yes! I am a citizen! Now which way to the welfare office? I'm kidding, I'm kidding. I work, I work. I've done everything the Bible says &mdash; even the stuff that contradicts the other stuff! I hope this has taught you kids a lesson: kids never learn.</p>
				</div>	
				<div class="col-sm-4">
					<h1>The Republic</h1>
					<p>Look, I ain't in this for your revolution, and I'm not in it for you, Princess. I expect to be well paid. I'm in it for the money. Look, I ain't in this for your revolution, and I'm not in it for you, Princess. I expect to be well paid. I'm in it for the money. Hokey religions and ancient weapons are no match for a good blaster at your side, kid. What?!</p>
					<h2>Return of the Jedi</h2>
					<p>Kid, I've flown from one side of this galaxy to the other. I've seen a lot of strange stuff, but I've never seen anything to make me believe there's one all-powerful Force controlling everything. There's no mystical energy field that controls my destiny. It's all a lot of simple tricks and nonsense. Kid, I've flown from one side of this galaxy to the other. I've seen a lot of strange stuff, but I've never seen anything to make me believe there's one all-powerful Force controlling everything. There's no mystical energy field that controls my destiny. It's all a lot of simple tricks and nonsense. What!? You're all clear, kid. Let's blow this thing and go home! The plans you refer to will soon be back in our hands. A tremor in the Force. The last time I felt it was in the presence of my old master.</p>
				</div>
			</div>

	</body>
</html>