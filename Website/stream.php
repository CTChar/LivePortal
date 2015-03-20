<?php

require_once('includes/header.php');

//$key = isset($_REQUEST["key"]) ? $_REQUEST["key"] : "";	
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

//$key = $userId;


	$query = "SELECT * FROM Accounts WHERE accountId = '".clean($userId)."'";
	
	$result = mysqli_query($db, $query);
	//echo (mysqli_fetch_assoc($result));
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			$key = $row['streamKey'];
		}
		else
		{
			$key = "";
			echo ('user not found');
		}
	}
	
	
?>


		<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>


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