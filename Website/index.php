<?php
require_once('includes/functions.php');

require_once('includes/header.php');

if (isset($_REQUEST["register"]) && $_REQUEST["register"] == "success")
{
	echo ("<script>$('#signIn').modal('show')</script>");
}

$user = 3;

?>
<div class="jumbotron">
	<h1>Featured Streamers</h1> 
</div>
<div class="row">
	<div class="col-md-1">
	</div>
	<div style="padding-right:0px;" class="col-md-8">
		<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>

		<div id='container'></div>
		<script type="text/javascript">
		  jwplayer("container").setup({
			file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user)); ?>",
			image: "<?php echo getAvatar(getUsername($user),50); ?>",
			  title: "<?php echo getUsername($user); ?>",
			width: "100%",
			  aspectratio: "16:9",
			
		  });
		  
		  function playTrailer(video, thumb, title) { 
		  jwplayer().load([{
			file: video,
			image: thumb,
			title: title,
		  }]);
		  //jwplayer().play();
		}
		</script>
	</div>
	<div style="padding-left:0px;" class="col-md-2">
<?php $user = 3; ?>
		<div style="margin-top: 0px;" class="playerLink" onclick="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user)); ?>', '<?php echo getAvatar(getUsername($user),100); ?>', '<?php echo getUsername($user); ?>')">
			<img alt="" border="0" src="<?php echo getAvatar(getUsername($user),75); ?>" />
			<a href="profile.php?userId=<?php echo $user; ?>"><?php echo shorten(getUsername($user),12); ?></a>
		</div>
<?php $user = 42; ?>
		<div class="playerLink" onclick="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user)); ?>', '<?php echo getAvatar(getUsername($user),100); ?>', '<?php echo getUsername($user); ?>')">
			<img alt="" border="0" src="<?php echo getAvatar(getUsername($user),75); ?>" />
			<a href="profile.php?userId=<?php echo $user; ?>"><?php echo shorten(getUsername($user),12); ?></a>
		</div>
<?php $user = 43; ?>
		<div class="playerLink" onclick="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user)); ?>', '<?php echo getAvatar(getUsername($user),100); ?>', '<?php echo getUsername($user); ?>')">
			<img alt="" border="0" src="<?php echo getAvatar(getUsername($user),75); ?>" />
			<a href="profile.php?userId=<?php echo $user; ?>"><?php echo shorten(getUsername($user),12); ?></a>
		</div>
<?php $user = 24; ?>
		<div class="playerLink" onclick="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user)); ?>', '<?php echo getAvatar(getUsername($user),100); ?>', '<?php echo getUsername($user); ?>')">
			<img alt="" border="0" src="<?php echo getAvatar(getUsername($user),75); ?>" />
			<a href="profile.php?userId=<?php echo $user; ?>"><?php echo shorten(getUsername($user),12); ?></a>
		</div>
<?php $user = 41; ?>
		<div class="playerLink" onclick="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user)); ?>', '<?php echo getAvatar(getUsername($user),100); ?>', '<?php echo getUsername($user); ?>')">
			<img alt="" border="0" src="<?php echo getAvatar(getUsername($user),75); ?>" />
			<a href="profile.php?userId=<?php echo $user; ?>"><?php echo shorten(getUsername($user),12); ?></a>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>

<?php
require_once('includes/footer.php')
?>