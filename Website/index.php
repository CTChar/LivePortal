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
				<h1>Col 1</h1>
			</div>
			<div class="col-sm-4">
				<h1>Col 2</h1>
			</div>	
			<div class="col-sm-4">
				<h1>Col 3</h1>
			</div>
		</div>

	



<?php
require_once('includes/footer.php')

?>