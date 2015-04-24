<?php
require_once('includes/functions.php');

$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	


if (!isId($userId))
{
	header('Location: index.php');
}

require_once('includes/header.php');

$key = getFromTable ('Accounts', 'accountId', clean($userId), 'streamKey');
	$username = getUsername($userId);
?>
	<div class="jumbotron">
		<h1>
			<?php
				echo ($username."'s Stream");
			?>
		</h1> 
	</div>
<div class="row">

	<div class="col-md-6">
		<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>
		<div id="player">Loading the player...</div>
		<script type="text/javascript">
		  jwplayer("player").setup({
		  file: "rtmp://server.liveportal.gq/liveportal/<?php echo("$key");?>",
		  image: "<?php echo getAvatar($username,500) ?>",
		  //width: 450,
		  height: 500
		  });
		</script>
	</div>
	
	<div class="col-md-6">
		<div class="irc">
			<iframe src="https://kiwiirc.com/client/server.liveportal.gq/?nick=Test|?&theme=cli#<?php echo $username; ?>" style="border:none; width:470px; height:500px; margin: 0px"></iframe>
		</div>
	</div>
</div>

<?php
require_once('includes/footer.php')

?>