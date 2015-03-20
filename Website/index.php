<?php
require_once('includes/functions.php');


require_once('includes/header.php');
?>

		
		
		<div class="jumbotron">
			<h1>Welcome to LivePortal.gq 
				<?php
					if (isLoggedIn())
					{
						echo ($_SESSION['username']);
					}
				?>
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
				<h1>Cool</h1>
				<p>My south mouth was trembling like jelly. With my spam castanets now much like a gutted trout, he thought it was time to start plunging my marmite motorway. Is now the time to tell him I really need to ease a colon cobra, I wondered? Inserting my fist into my chamber of squelch got me spouting vertical moisture faster than greased shit off a shiny shovel. The unrelenting orgasms from his skin flute hammering my hatchet wound made me come so hard, I began sweating like a gypsy near an unlocked shipping container. The mixture of sewer trout and creamy load in my rusty bullet hole created the delicious sphincter sauce that he was so fond of.</p>
			</div>	
			<div class="col-sm-4">
				<h1>The Republic</h1>
				<p>Look, I ain't in this for your revolution, and I'm not in it for you, Princess. I expect to be well paid. I'm in it for the money. Look, I ain't in this for your revolution, and I'm not in it for you, Princess. I expect to be well paid. I'm in it for the money. Hokey religions and ancient weapons are no match for a good blaster at your side, kid. What?!</p>
				<h2>Return of the Jedi</h2>
				<p>Kid, I've flown from one side of this galaxy to the other. I've seen a lot of strange stuff, but I've never seen anything to make me believe there's one all-powerful Force controlling everything. There's no mystical energy field that controls my destiny. It's all a lot of simple tricks and nonsense. Kid, I've flown from one side of this galaxy to the other. I've seen a lot of strange stuff, but I've never seen anything to make me believe there's one all-powerful Force controlling everything. There's no mystical energy field that controls my destiny. It's all a lot of simple tricks and nonsense. What!? You're all clear, kid. Let's blow this thing and go home! The plans you refer to will soon be back in our hands. A tremor in the Force. The last time I felt it was in the presence of my old master.</p>
			</div>
		</div>

	



<?php
require_once('includes/footer.php')

?>