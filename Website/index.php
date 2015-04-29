<?php
require_once('includes/functions.php');

require_once('includes/header.php');

if (isset($_REQUEST["register"]) && $_REQUEST["register"] == "success")
{
	echo ("<script>$('#signIn').modal('show')</script>");
}

$user0 = 3;
$user1 = 42;
$user2 = 43;
$user3 = 24;
$user4 = 41;
?>

<div class="jumbotron">
	<h1>Featured Streamers</h1> 
</div>
<div class="row">
	<div class="col-md-9">
		<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>

		<div id='container'></div>
		<script type="text/javascript">
		  jwplayer("container").setup({
			file: "rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user0)); ?>",
			image: "<?php echo getAvatar(getUsername($user0),50); ?>",
			  title: "<?php echo getUsername($user0); ?>",
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
	<div class="col-md-3">
		<a href="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user0)); ?>', '<?php echo getAvatar(getUsername($user0),100); ?>', '<?php echo getUsername($user0); ?>')"><img alt="" border="0" src="<?php echo getAvatar(getUsername($user0),75); ?>" /></a>
		<a href="profile.php?userId=<?php echo $user0; ?>"><?php echo getUsername($user0); ?></a>
		<br/>
		<a href="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user1)); ?>', '<?php echo getAvatar(getUsername($user1),100); ?>', '<?php echo getUsername($user1); ?>')"><img alt="" border="0" src="<?php echo getAvatar(getUsername($user1),75); ?>" /></a>
		<a href="profile.php?userId=<?php echo $user1; ?>"><?php echo getUsername($user1); ?></a>
		<br/>
		<a href="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user2)); ?>', '<?php echo getAvatar(getUsername($user2),100); ?>', '<?php echo getUsername($user2); ?>')"><img alt="" border="0" src="<?php echo getAvatar(getUsername($user2),75); ?>" /></a>
		<a href="profile.php?userId=<?php echo $user2; ?>"><?php echo getUsername($user2); ?></a>
		<br/>
		<a href="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user3)); ?>', '<?php echo getAvatar(getUsername($user3),100); ?>', '<?php echo getUsername($user3); ?>')"><img alt="" border="0" src="<?php echo getAvatar(getUsername($user3),75); ?>" /></a>
		<a href="profile.php?userId=<?php echo $user3; ?>"><?php echo getUsername($user3); ?></a>
		<br/>
		<a href="javascript:playTrailer('rtmp://server.liveportal.gq/liveportal/<?php echo(getStreamKey($user4)); ?>', '<?php echo getAvatar(getUsername($user4),100); ?>', '<?php echo getUsername($user4); ?>')"><img alt="" border="0" src="<?php echo getAvatar(getUsername($user4),75); ?>" /></a>
		<a href="profile.php?userId=<?php echo $user4; ?>"><?php echo getUsername($user4); ?></a>
	</div>
</div>

<?php
require_once('includes/footer.php')
?>