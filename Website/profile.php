<?php
require_once('includes/functions.php');







$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	


//if (isset($_REQUEST['sent']) && $_REQUEST['sent'] == "sent")
				//{
				//	echo ('Message Sent');
				//}
				
				if (isset($_REQUEST['sendMessage']))
				{
					$subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : "";	
					$message = isset($_REQUEST["message"]) ? $_REQUEST["message"] : "";	
					sendMessage($userId,$subject,$message);
					//header('Location: profile.php?userId='.$userId.'&sent=sent');
				}
				
require_once('includes/header.php');


$username =  getFromTable ('Accounts','accountId',$userId,'username');
$profileId = getFromTable ('Profiles','Accounts_accountId',$userId,'profileId');
$keyValue = getFromTable ('Accounts', 'accountId', $userId, 'streamKey');
$language = getFromTable ('Profiles','Accounts_accountId',$userId,'language');
$bio = getFromTable ('Profiles','Accounts_accountId',$userId,'bio');
$country = getFromTable ('Profiles','Accounts_accountId',$userId,'country');
$url = getFromTable ('Profiles','Accounts_accountId',$userId,'url');



if (isLoggedIn())
{
?>

	<!-- Modal -->
	<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Send <?php echo ($username); ?> a message</h4>
		  </div>
		  <div class="modal-body">
			<form action="profile.php">
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
					
						$favorited = $userId;
						require('includes/favoriteButtons.php');
						
						
						
					if (isLoggedIn())
					{
					?>
					
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#sendMessage">
					  Message
					</button>
					<br/>
					
					<?php } ?>
					
					
					Language: <?php echo ($language);?>
					<br/>
					Website: <a href="<?php echo ($url);?>"><?php echo ($url);?></a>
					<br/>
					Bio: <?php echo ($bio);?>
					<br/>
					Country: <?php echo ($country);?>
					<br/>
					<?php
					if (isLoggedIn() && $_SESSION['userId'] == $userId)	
					{
					echo ("Your Key: ".$keyValue);
			
					}
			
					?>
			
				</div>
			</div>
			
				
			<?php



require_once('includes/footer.php')

?>