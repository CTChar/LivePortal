<?php
require_once('includes/functions.php');

$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

if (!isId($userId))
{
	header('Location: index.php');
}

require_once('includes/header.php');

$key = getFromTable ('Accounts', 'accountId', clean($userId), 'streamKey');
	
?>
	<div class="jumbotron">
		<h1>
			<?php
				echo (getUsername($userId)."'s Stream");
			?>
		</h1> 
	</div>

	<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>

	<div id="player">Loading the player...</div>
	<script type="text/javascript">
	  jwplayer("player").setup({
	  file: "rtmp://server.liveportal.gq/liveportal/<?php echo("$key");?>",
	  image: "http://example.com/uploads/myPoster.jpg",
	  width: 900,
	  height: 500
	  });
	</script>

<?php
require_once('includes/footer.php')

?>