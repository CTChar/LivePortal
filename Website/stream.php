<?php

require_once('includes/header.php');

$key = isset($_REQUEST["key"]) ? $_REQUEST["key"] : "";	
?>


		<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>


		<p>Key: <?php echo("$key");?></p>
	        <div id="player">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo("$key");?>",
		  image: "http://example.com/uploads/myPoster.jpg",
		  width: 640,
		  height: 360
		  });
		</script>



<?php
require_once('includes/footer.php')

?>