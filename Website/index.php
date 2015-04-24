<?php
require_once('includes/functions.php');

require_once('includes/header.php');

if (isset($_REQUEST["register"]) && $_REQUEST["register"] == "success")
{
	echo ("<script>$('#signIn').modal('show')</script>");
}
?>



       <script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>

<div class="jumbotron">
	<h1>Welcome to LivePortal
		<?php
			if (isLoggedIn())
			{
				echo ($_SESSION['username']);
			}
			
			$user0 = 3;
			$user1 = 42;
			$user2 = 43;
			$user3 = 24;
			$user4 = 41;
			
		?>
	</h1> 
	<!-- <p>LivePortal is a new place to stream whatever you think people want to see.</p> -->
</div>

<!-- Start Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
   <!-- Carousel indicators -->
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
   </ol>   
   <!-- Carousel items -->
   <div class="carousel-inner">
      <div class="item active">

		<div class="player" id="player1">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player1").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user0)); ?>",
		  image: "<?php echo getAvatar(getUsername($user0),500); ?>",
		  width: 980,
		  height: 500
		  });
		</script>
	   <div class="carousel-caption">
				<a href="profile.php?userId=<?php echo $user0; ?>"><h3><?php echo getUsername($user0); ?></h3></a>
			</div>
      </div>
      <div class="item">
	  <div class="player" id="player2">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player2").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user1)); ?>",
		  image: "<?php echo getAvatar(getUsername($user1),500); ?>",
		  width: 980,
		  height: 500
		  });
		</script>
			<div class="carousel-caption">
				<a href="profile.php?userId=<?php echo $user1; ?>"><h3><?php echo getUsername($user1); ?></h3></a>
			</div>
      </div>
      <div class="item">
	  <div class="player" id="player3">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player3").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user2)); ?>",
		  image: "<?php echo getAvatar(getUsername($user2),500); ?>",
		  width: 980,
		  height: 500
		  });
		</script>
			<div class="carousel-caption">
				<a href="profile.php?userId=<?php echo $user2; ?>"><h3><?php echo getUsername($user2); ?></h3></a>
			</div>
      </div>
      <div class="item">
	  <div class="player" id="player4">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player4").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user3)); ?>",
		  image: "<?php echo getAvatar(getUsername($user3),500); ?>",
		  width: 980,
		  height: 500
		  });
		</script>
			<div class="carousel-caption">
				<a href="profile.php?userId=<?php echo $user3; ?>"><h3><?php echo getUsername($user3); ?></h3></a>
			</div>
      </div>
      <div class="item">
	  <div class="player" id="player5">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player5").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user4)); ?>",
		  image: "<?php echo getAvatar(getUsername($user4),500); ?>",
		  width: 980,
		  height: 500
		  });
		</script>
			<div class="carousel-caption">
				<a href="profile.php?userId=<?php echo $user4; ?>"><h3><?php echo getUsername($user4); ?></h3></a>
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
   <div style="background-color:#000;text-align:center;">
	  <span class="start-slide btn glyphicon glyphicon-play"></span>
	  <span class="pause-slide btn glyphicon glyphicon-pause"></span>
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
<!--
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
-->
<?php
require_once('includes/footer.php')
?>