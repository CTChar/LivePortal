<?php
require_once('includes/functions.php');

require_once('includes/header.php');
?>

       <script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>

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
   <!-- Carousel indicators -->
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>   
   <!-- Carousel items -->
   <div class="carousel-inner">
      <div class="item active">

		<div id="player1">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player1").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/",
		  image: "http://example.com/uploads/myPoster.jpg",
		  width: 900,
		  height: 500
		  });
		</script>
	   <div class="carousel-caption">
				<h3>Shrekception</h3>
			</div>
      </div>
      <div class="item">
	  <div id="player2">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player2").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/",
		  image: "http://example.com/uploads/myPoster.jpg",
		  width: 900,
		  height: 500
		  });
		</script>
			<div class="carousel-caption">
				<h3>Shrek Cosby</h3>
			</div>
      </div>
      <div class="item">
	  <div id="player3">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player3").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/",
		  image: "http://example.com/uploads/myPoster.jpg",
		  width: 900,
		  height: 500
		  });
		</script>
			<div class="carousel-caption">
				<h3>Demon Shrek</h3>
			</div>
      </div>
   </div>
   <!-- Carousel nav -->
   <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
   <!-- Controls buttons -->
   <div style="text-align:center;">
      <input type="button" class="btn start-slide" value="Start">
      <input type="button" class="btn pause-slide" value="Pause">
   </div>
</div> 
<script>
   $(function(){
      // Initializes the carousel
      $(".start-slide").click(function(){
         $("#myCarousel").carousel('cycle');
      });
      // Stops the carousel
      $(".pause-slide").click(function(){
         $("#myCarousel").carousel('pause');
      });
      // Cycles to the previous item
      $(".prev-slide").click(function(){
         $("#myCarousel").carousel('prev');
      });
      // Cycles to the next item
      $(".next-slide").click(function(){
         $("#myCarousel").carousel('next');
      });
      // Cycles the carousel to a particular frame 
      $(".slide-one").click(function(){
         $("#myCarousel").carousel(0);
      });
      $(".slide-two").click(function(){
         $("#myCarousel").carousel(1);
      });
      $(".slide-three").click(function(){
         $("#myCarousel").carousel(2);
      });
   });
</script>
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