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

<!-- Start Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
		<li data-target="#myCarousel" data-slide-to="5"></li>
		<li data-target="#myCarousel" data-slide-to="6"></li>
		<li data-target="#myCarousel" data-slide-to="7"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">

		<div class="item active">
			<img src="http://2.media.collegehumor.cvcdn.com/11/66/5eebed43877e707b0c8354343fed4266.gif" alt="Flower">
			<div class="carousel-caption">
				<h3>Shrekception</h3>
			</div>
		</div>
		
		<div class="item">
			<img src="images/1.jpg" alt="Flower">
			<div class="carousel-caption">
				<h3>Shrek Cosby</h3>
			</div>
		</div>

		<div class="item">
			<img src="images/2.jpg" alt="Chania">
			<div class="carousel-caption">
				<h3>Demon Shrek</h3>
			</div>
		</div>

		<div class="item">
			<img src="images/3.jpg" alt="Chania">
			<div class="carousel-caption">
				<h3>Happy Shrek</h3>
			</div>
		</div>

		<div class="item">
			<img src="images/4.jpg" alt="Flower">
			<div class="carousel-caption">
				<h3>Shrek Mike</h3>
			</div>
		</div>

		<div class="item">
			<img src="images/5.jpg" alt="Flower">
			<div class="carousel-caption">
				<h3>Shrek Cage</h3>
			</div>
		</div>

		<div class="item">
			<img src="images/6.jpg" alt="Flower">
			<div class="carousel-caption">
				<h3>She Shrek 1</h3>
			</div>
		</div>

		<div class="item">
			<img src="images/7.jpg" alt="Flower">
			<div class="carousel-caption">
				<h3>She Shrek 2</h3>
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
<!-- End Carousel -->

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