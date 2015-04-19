<?php
require_once('includes/functions.php');

$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

if (isset($_REQUEST['sendMessage']))
{
	$subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : "";	
	$message = isset($_REQUEST["message"]) ? $_REQUEST["message"] : "";	
	sendMessage($userId,$subject,$message);
}
if (isset($_REQUEST['editProfile']))
{
	$language = isset($_REQUEST["language"]) ? $_REQUEST["language"] : "";	
	$bio = isset($_REQUEST["bio"]) ? $_REQUEST["bio"] : "";	
	$country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : "";	
	$url = isset($_REQUEST["url"]) ? $_REQUEST["url"] : "";	
	editProfile($language,$bio,$country,$url);
	header('Location: profile.php?userId='.$userId);
}
	$userName =  getFromTable ('Accounts','accountId',$userId,'username');			
require_once('includes/header.php');

$username =  $userName;
$profileId = getFromTable ('Profiles','Accounts_accountId',$userId,'profileId');
$language = getFromTable ('Profiles','Accounts_accountId',$userId,'language');
$bio = getFromTable ('Profiles','Accounts_accountId',$userId,'bio');
$country = getFromTable ('Profiles','Accounts_accountId',$userId,'country');
$url = getFromTable ('Profiles','Accounts_accountId',$userId,'url');

if (isLoggedIn())
{
	if ($_SESSION['userId'] == $userId)
	{
		?>
			<!-- Profile Modal -->
			<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="profileLabel">Edit Your Profile</h4>
						</div>
						<div class="modal-body">

							<?php
							if (isset($_REQUEST['sendMessage']) && count($errors) > 0)
							{
								printErrors($errors);
							}
							?>

							<form action="profile.php" method="get">
								<div class="form-group">
									<label for="language">Language</label>
									<input type="text" class="form-control" id="language" name="language" placeholder="Subject" value="<?php echo $language; ?>" >
								</div>
								<div class="form-group">
									<label for="bio">Bio</label>
									<input type="text" class="form-control" id="bio" name="bio" placeholder="Subject" value="<?php echo $bio; ?>" >
								</div>
								<div class="form-group">
									<label for="country">Country</label>
									<input type="text" class="form-control" id="country" name="country" placeholder="Subject" value="<?php echo $country; ?>" >
								</div>
								<div class="form-group">
									<label for="url">URL</label>
									<input type="text" class="form-control" id="url" name="url" placeholder="Subject" value="<?php echo $url; ?>" >
								</div>
								
							<input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['userId']; ?>">
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" name="editProfile" id="editProfile">Confirm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Profile Modal -->
		<?php
	}
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

			<a class="btn btn-primary btn-xs" href="stream.php?userId=<?php echo($userId); ?>">Stream</a>
			
			<a class="btn btn-primary btn-xs" href="favorites.php?userId=<?php echo($userId); ?>&type=followers">Followers</a>
			<a class="btn btn-primary btn-xs" href="favorites.php?userId=<?php echo($userId); ?>&type=following">Following</a>
			
			
			<?php
			
			$favorited = $userId; //required for favorite buttons
			require('includes/favoriteButtons.php');
				
			if (isLoggedIn())
			{
				if ($_SESSION['userId'] == $userId)
				{
					?>
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#profileModal">
					  Edit Profile
					</button>
					<?php
				}
			?>
			
				<!-- Button trigger messages modal -->
				
				<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#sendMessage">
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