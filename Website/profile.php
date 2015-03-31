<?php
require_once('includes/functions.php');

$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

if (isset($_REQUEST['sendMessage']))
{
	$subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : "";	
	$message = isset($_REQUEST["message"]) ? $_REQUEST["message"] : "";	
	sendMessage($userId,$subject,$message);
}
				
require_once('includes/header.php');

$username =  getFromTable ('Accounts','accountId',$userId,'username');
$profileId = getFromTable ('Profiles','Accounts_accountId',$userId,'profileId');
$language = getFromTable ('Profiles','Accounts_accountId',$userId,'language');
$bio = getFromTable ('Profiles','Accounts_accountId',$userId,'bio');
$country = getFromTable ('Profiles','Accounts_accountId',$userId,'country');
$url = getFromTable ('Profiles','Accounts_accountId',$userId,'url');

if (isLoggedIn())
{
?>

	<!-- Message Modal -->
	<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Send <?php echo ($username); ?> a message</h4>
				</div>
				<div class="modal-body">

					<?php

					if (isset($_REQUEST['sendMessage']) && count($errors) > 0)
					{
						printErrors($errors);
					}

					?>

					<form action="profile.php" method="post">
						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="<?php if (isset($_REQUEST['sendMessage'])){ echo $subject;} ?>" >
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" name="message" id="message"><?php if (isset($_REQUEST['sendMessage'])){ echo $message;} ?></textarea>
						</div>
						<input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" name="sendMessage" id="sendMessage">Send</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>
	<div class="jumbotron">
		<h1>
			<?php echo ($username."'s Profile"); ?>
		</h1> 
	</div>

	<div class="row">
		<div class="col-xs-6">
			<img src='<?php echo (getAvatar($username,400)); ?>'>
		</div>
		<div class="col-xs-6">

			Stream: <a href="stream.php?userId=<?php echo($userId); ?>">Go to Stream</a>
			<br/>
			Favorites: <a href="favorites.php?userId=<?php echo($userId); ?>">View Favorites</a>
			<br/>
			
			<?php
			
			$favorited = $userId; //required for favorite buttons
			require('includes/favoriteButtons.php');
				
			if (isLoggedIn())
			{
			?>
			
				<!-- Button trigger messages modal -->
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#sendMessage">
				  Message
				</button>
				<br/>
			
			<?php 
			} 
			?>
			
			Website: <a href="<?php echo ($url);?>"><?php echo ($url);?></a>
			<br/>
			Bio: <?php echo ($bio);?>
			<br/>
			Language: <?php echo ($language);?>
			<br/>
			Country: <?php echo ($country);?>
		</div>
	</div>

<?php
require_once('includes/footer.php')
?>